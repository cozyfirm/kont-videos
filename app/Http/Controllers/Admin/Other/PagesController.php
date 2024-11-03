<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Other\Page;
use App\Traits\Common\FileTrait;
use App\Traits\Http\HttpTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    protected string $_path = 'admin.app.other.pages.';
    use HttpTrait, ResponseTrait, FileTrait;
    /**
     *  Single pages CRUD
     */
    public function index (): View{
        $pages = Page::where('id', '>', 0);
        $pages = Filters::filter($pages);
        $filters = [ 'title' => __('Naziv') ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'pages' => $pages
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'page' => Page::where('id', '=', $id)->first(),
            'edit' => true
        ]);
    }
    public function update(Request $request): JsonResponse | string | bool{
        try{
            Page::where('id', '=', $request->id)->update($request->except(['id', 'undefined', 'files']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.other.pages.edit', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function updatePhoto  (Request $request) : RedirectResponse{
        try{
            $request['path'] = ('files/images/public-part/single-pages/');
            $file = $this->saveFile($request, 'photo_uri', 'program_file');

            Page::where('id', '=', $request->page_id)->update(['image_id' => $file->id]);
            return redirect()->back()->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }
}
