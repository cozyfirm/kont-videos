<?php

namespace App\Http\Controllers\Admin\Other\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Admin\Core\HashtagController;
use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Blog\BlogGallery;
use App\Traits\Blog\BlogTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller{
    use BlogTrait, ResponseTrait, FileTrait;
    protected string $_path = 'admin.app.other.blog.';

    public function index(): View{
        $posts = Blog::where('id', '>', 0);
        $posts = Filters::filter($posts);
        $filters = [ 'title' => __('Naziv'), 'categoryRel.name' => __('Kategorija') ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'posts' => $posts
        ]);
    }
    public function create(): View{
        return view($this->_path . 'create', [
            'create' => true,
            'categories' => Keyword::getIt('blog_category')
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $request['slug'] = $this->generateSlug($request->title);
            $request['created_by'] = Auth::user()->id;

            $post = Blog::create($request->except(['files', 'undefined']));

            /* HashTags */
            request()->merge(['id' => $post->id]);
            HashtagController::extract(request(), Blog::find($post->id));

            return $this->jsonSuccess(__('Uspješno spremljeno !'), route('system.admin.blog.preview', ['id' => $post->id]));
        }catch (\Exception $e){
            return $this->jsonError('2100', __('Desila se greška!'));
        }
    }
    public function preview($id): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'categories' => Keyword::getIt('blog_category'),
            'post' => Blog::where('id', '=', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'categories' => Keyword::getIt('blog_category'),
            'post' => Blog::where('id', '=', $id)->first()
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            $request['slug'] = $this->generateSlug($request->title);
            Blog::where('id', '=', $request->id)->update($request->except(['files', 'undefined', 'id']));

            /* HashTags */
            request()->merge(['id' => $request->id]);
            HashtagController::extract(request(), Blog::find($request->id));

            return $this->jsonSuccess(__('Uspješno spremljeno !'), route('system.admin.blog.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            dd($e);
            return $this->jsonError('2100', __('Desila se greška!'));
        }
    }
    public function delete($id): RedirectResponse{
        Blog::where('id', '=', $id)->delete();
        return redirect()->route('system.admin.blog');
    }
    public function editImage($id, $what){
        return view($this->_path . 'edit-image', [
            'post' => Blog::where('id', $id)->first(),
            'what' => $what
        ]);
    }
    public function updateImage(Request $request): RedirectResponse{
        try{
            $request['path'] = 'files/images/public-part/blog';
            $image = $this->saveFile($request, 'file', $request->what . '_img');

            Blog::where('id', '=', $request->id)->update([$request->what => $image->id]);
            return redirect()->route('system.admin.blog.preview', ['id' => $request->id]);
        }catch (\Exception $e){
            return back()->with('error', __('Greška!'));
        }
    }
    public function addToGallery(Request $request): RedirectResponse{
        try{
            $request['path'] = 'files/images/public-part/blog';
            $image = $this->saveFile($request, 'photo_uri', 'blog_gallery_img');

            BlogGallery::create(['blog_id' => $request->id, 'file_id' => $image->id]);
            return redirect()->route('system.admin.blog.preview', ['id' => $request->id]);
        }catch (\Exception $e){
            return back()->with('error', __('Greška!'));
        }
    }
    public function deleteFromGallery($id): RedirectResponse{
        $file = BlogGallery::where('id', '=', $id)->first();
        $postID = $file->blog_id;
        $file->delete();

        return redirect()->route('system.admin.blog.preview', ['id' => $postID]);
    }
}
