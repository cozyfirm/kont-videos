<?php

namespace App\Http\Controllers\PublicPart\Blog;

use App\Http\Controllers\Controller;
use App\Models\Core\Hashtags\Hashtag;
use App\Models\Core\Keyword;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Blog\BlogGallery;
use App\Traits\Common\HashtagTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller{
    use ResponseTrait, HashtagTrait;

    protected string $_path = 'public-part.app.blog.';
    protected int $_numberOfPopular = 4;
    protected int $_numberOfPosts = 6;

    public function getPosts($posts, $category = 0): View{
        return view($this->_path . 'index', [
            'categories' => Keyword::where('type', 'blog_category')->get(),
            'popular' => Blog::take($this->_numberOfPopular)->get(),
            'posts' => $posts,
            'category' => $category,
            'popularTags' => $this->popularTags('blog'),
            'blog' => true
        ]);
    }
    public function index(): View{
        $posts = Blog::where('published', '=', 1)->orderBy('id', 'DESC')->take($this->_numberOfPosts)->get();
        return $this->getPosts($posts);
    }
    public function indexWithCategories($id): View{
        $posts = Blog::where('published', '=', 1)->orderBy('id', 'DESC')->take($this->_numberOfPosts)->where('category', '=', $id)->get();
        return $this->getPosts($posts, $id);
    }
    public function tags($tag): View{
        $tag = Hashtag::where('tag', 'LIKE', '%' . $tag . '%')->first();
        $tag->update(['clicks' => ($tag->clicks + 1)]);

        $posts = Blog::where('published', '=', 1)->where('title', 'LIKE', '%'.$tag.'%')->orWhere('short_desc', 'LIKE', '%'.$tag.'%')->orWhere('description', 'LIKE', '%'.$tag.'%')->get();

        return $this->getPosts($posts);
    }
    public function preview($slug): View{
        $post = Blog::where('slug', '=', $slug)->first();
        /* Increment views of post */
        $post->update(['views' => ($post->views + 1)]);

        return view($this->_path . 'preview', [
            'post' => $post,
            'categories' => Keyword::where('type', 'blog_category')->get(),
            'popular' => Blog::take(4)->get(),
            'postTags' => $post->getAllTags(),
            'popularTags' => $this->popularTags('blog'),
            'blog' => true
        ]);
    }

    /**
     * Fetch images for gallery
     *
     * @param Request $request
     * @return JsonResponse|bool|string
     */
    public function fetchImages(Request $request): JsonResponse | bool | string{
        try{
            $current = BlogGallery::where('id', '=', $request->attrID)->first();

            $previous = BlogGallery::where('blog_id', '=',$request->blog_id)->where('id', '<', $request->attrID)->orderBy('id', 'desc')->first();
            $next     = BlogGallery::where('blog_id', '=',$request->blog_id)->where('id', '>', $request->attrID)->orderBy('id', 'ASC')->first();

            return $this->jsonResponse('0000', __(''), [
                'next' => $next->id ?? '',
                'previous' => $previous->id ?? '',
                'current' => $current->fileRel->getFile()
            ]);
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška'));
        }
    }

    /**
     * Load more posts 'onclick' triggered
     *
     * @param Request $request
     * @return bool|string
     */
    public function loadMore(Request $request): bool|string{
        try{
            if(isset($request->lastID)){
                if(isset($request->category) and $request->category != 0){
                    $posts = Blog::where('published', '=', 1)->where('id', '<', $request->lastID)->where('category', '=', $request->category)->orderBy('id', 'DESC')->take($this->_numberOfPosts)->get();
                }else{
                    $posts = Blog::where('published', '=', 1)->where('id', '<', $request->lastID)->orderBy('id', 'DESC')->take($this->_numberOfPosts)->get();
                }

                $lastID = $request->lastID;
                foreach ($posts as $post){
                    $post->img = $post->smallImgRel->getFile();
                    $post->categoryVal = $post->categoryRel->name ?? '';
                    $post->createdAt = $post->getDate();
                    $post->createdBy = $post->createdBy->name;
                    $post->tags = $post->getAllTags();

                    $lastID = $post->id;
                }

                if(isset($request->category) and $request->category != 0){
                    $leftPosts = Blog::where('id', '<', $lastID)->where('category', '=', $request->category)->count();
                }else{
                    $leftPosts = Blog::where('id', '<', $lastID)->count();
                }

                return $this->jsonResponse('0000', __(''), ['posts' => $posts->toArray(), 'leftPosts' => $leftPosts ]);
            }else throw new \ErrorException('Last ID not found');
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Desila se greška!'));
        }
    }
}
