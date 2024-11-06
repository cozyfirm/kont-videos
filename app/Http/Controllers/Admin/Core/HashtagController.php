<?php

namespace App\Http\Controllers\Admin\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Hashtags\Hashtag;
use App\Models\Core\Hashtags\HashtagRel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HashtagController extends Controller{
    protected static array $hashtags = [];

    /**
     *  Extract tag from strings
     * @param $string - for extracting hashtags
     * @return array - returns self::$hashtags array
     */

    public static function extractTags($string): array{
        self::$hashtags = []; // Set init value to empty array
        $string = strip_tags($string);

        $string = strval($string);

        for($i=0; $i<strlen($string); $i++){
            $tag = '';

            if($string[$i] == '#'){
                $tag .= $string[$i];
                for ($j=($i+1); $j<strlen($string); $j++, $i++){
                    if($string[$j] == ' ' or $string[$j] == ',' or $string[$j] == '.' or $string[$j] == '<' or $string[$j] == '>' or $string[$j] == '|'  or $string[$j] == '&'  or $string[$j] == '#'  or $string[$j] == '%' or $j == (strlen($string) - 1)){
                        if($j == (strlen($string) - 1)) $tag .= $string[$j];

                        self::$hashtags[] = $tag;
                        break;
                    }else $tag .= $string[$j];
                }
            }
        }

        return self::$hashtags;
    }

    /**
     * Insert tag relationship into database
     *
     * @param $tagID - reference to hashtags
     * @param Model $model
     * @param $postID - post ID from blog or products
     * @param $column - SQL table column name
     */

    protected static function insertTagRel($tagID, Model $model, $postID, $column): void{
        try{
            HashtagRel::create([
                'tag_id' => $tagID,
                'category' => $model->getTable(),
                'post_id' => $postID,
                'parent' => method_exists($model, 'getParent') ? ($model->getParent()->id ?? null) : null,
                't_column' => $column
            ]);
        }catch (\Exception $e){}
    }

    public static function cleanUpTags($category, $postID, $column): void{
        try{
            $dbTags = HashtagRel::where('category', '=', $category)->where("post_id", $postID)
                ->where('t_column', $column)->with('tagRel')->get();

            foreach ($dbTags as $dbTag){
                $found = false;

                foreach (self::$hashtags as $tag){
                    if(isset($dbTag->tagRel->tag)){
                        if($dbTag->tagRel->tag == $tag)  $found = true;
                    }
                }

                if(!$found){

                    /* Now, check if there is any other post connected to this tag */
                    if(HashtagRel::where('tag_id', '=', $dbTag->tag_id)->count() == 1){
                        try{
                            Hashtag::where('id', '=', $dbTag->tag_id)->delete();
                        }catch (\Exception $e){}
                    }else $dbTag->delete();
                }
            }
        }catch (\Exception $e){}
    }

    /**
     *  Extract data from request;
     *
     *  $type has values: "blog" and "product"
     * @param Request $request
     * @param Model $model
     */

    public static function extract(Request $request, Model $model): void{

        // https://stackoverflow.com/questions/55023271/how-to-use-triggers-in-laravel observers
        // User::created(function(User $user) use ($request) {
        // https://laracasts.com/discuss/channels/eloquent/repeatable-relationships-with-traits

        // dd($request->is('system/blog/*'));

        /**
         * @var  $columns - get taggable columns of model (attributes that contains hashtags
         */
        $columns = $model->getTaggable();

        /* First, check does request has ID property */
        if(isset($request->id)){

            /* Iterate through request and find hashtags inside it */
            foreach ($request->all() as $key => $value){
                if(in_array($key, $columns)){
                    $tags = self::extractTags($value);

                    if(count($tags)){
                        /*  Check does key has value _en (that means it is english version of text */
                        $lang = strpos($key, '_en') ? 'en' : 'bs';

                        foreach (self::$hashtags as $tag){
                            try{
                                $data = Hashtag::where('tag', '=',$tag)->where('lang', $lang)->firstOrFail();

                                // Now, search for tag in tag_rels
                                try{
                                    $dataRel = HashtagRel::where('tag_id', '=', $data->id)
                                        ->where('category', $model->getTable())
                                        ->where('post_id', $request->id)
                                        ->where('t_column', $key)
                                        ->firstOrFail();
                                }catch (\Exception $e){
                                    self::insertTagRel($data->id, $model, $request->id, $key);
                                }
                            }catch (\Exception $e){
                                $data = Hashtag::create([
                                    'tag' => $tag,
                                    'lang' => $lang
                                ]);
                                self::insertTagRel($data->id, $model, $request->id, $key);
                            }
                        }
                    }

                    /*
                     *  If there is a tag with no longer in use, then delete it
                     */

                    self::cleanUpTags($model->getTable(), $request->id, $key);
                }
            }
        }
    }

    /**
     * In this case, we would send model as param, itereate throuhg it and delete all hashtags for that particular data
     * @param Model $model
     */

    public static function deleteTags(Model $model): void{
        $columns    = $model->getFillable();
        $attributes = $model->getAttributes();

        foreach ($columns as $column) { if (!array_key_exists($column, $attributes)) {$attributes[$column] = null;} }

        if(isset($attributes['id'])){
            foreach ($attributes as $key => $val){
                self::cleanUpTags($model->getTable(), $attributes['id'], $key);
            }
        }
    }
}
