<?php

namespace App\Http\Controllers\PublicPart\Blog;

use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Blog\BlogGallery;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.blog.';

    public function index(): View{
        return view($this->_path . 'index', [
            'categories' => Keyword::where('type', 'blog_category')->get(),
            'popular' => Blog::take(4)->get()
        ]);
    }
    public function preview(): View{
        return view($this->_path . 'preview', [
            'post' => Blog::where('id', '=', 1)->first(),
            'categories' => Keyword::where('type', 'blog_category')->get(),
            'popular' => Blog::take(4)->get()
        ]);
    }
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
}
