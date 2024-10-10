<?php

namespace App\Http\Controllers\Admin\Episodes;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\User;
use App\Traits\Common\FileTrait;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EpisodesController extends Controller
{
    use ResponseTrait, FileTrait, EpisodeBaseTrait;
    protected string $_path = 'admin.app.episodes.';

    public function index(): View{
        $episodes = Episode::where('id', '>', 0);
        $episodes = Filters::filter($episodes);

        $filters = [
            'title' => __('Naslov'),
            'presenter' => __('Predavač')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'episodes' => $episodes
        ]);
    }
    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true,
            'users' => User::pluck('name', 'id')
        ]);
    }
    public function save(Request $request): RedirectResponse{
        try{
            /* Save image */
            $request['path'] = 'files/images/episodes/';
            $image = $this->saveFile($request, 'image_id', 'video');

            /* Save video */
            $request['path'] = 'files/videos/';
            $video = $this->saveFile($request, 'video_id', 'video');

            /* Generate unique slug */
            $request['slug'] = $this->getSlug($request->title);
            $request['created_by'] = Auth::user()->id;

            $episode = Episode::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'presenter_id' => $request->presenter_id,
                'image_id' => $image->id,
                'video_id' => $video->id,
                'created_by' => $request->created_by
            ]);

            return redirect()->route('system.admin.episodes.preview', ['slug'  => $episode->slug ]);
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška! Pokušajte ponovo!'));
        }
    }

    public function preview ($slug): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'episode' => Episode::where('slug', '=', $slug)->first(),
            'users' => User::pluck('name', 'id')
        ]);
    }
    public function edit ($slug): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'episode' => Episode::where('slug', '=', $slug)->first(),
            'users' => User::pluck('name', 'id')
        ]);
    }
    public function update(Request $request): RedirectResponse{
        try{
            $episode = Episode::where('id', '=', $request->id)->first();

            if(isset($request->image_id)){
                /* Save image */
                $request['path'] = 'files/images/episodes/';
                $image = $this->saveFile($request, 'image_id', 'video');
            }
            if(isset($request->video_id)){
                /* Save video */
                $request['path'] = 'files/videos/';
                $video = $this->saveFile($request, 'video_id', 'video');
            }

            $episode->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_id' => isset($image) ? $image->id : $episode->image_id,
                'video_id' => isset($video) ? $video->id : $episode->video_id
            ]);

            return redirect()->route('system.admin.episodes.preview', ['slug'  => $episode->slug ]);
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška! Pokušajte ponovo!'));
        }
    }
    public function delete ($slug): RedirectResponse{
        Episode::where('slug', '=', $slug)->delete();
        return redirect()->route('system.admin.episodes');
    }
}
