<?php

namespace App\Http\Controllers\PublicPart\MyProfile;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeActivity;
use App\Models\Episodes\EpisodeVideo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyProgressController extends Controller{
    protected string $_path = 'public-part.app.my-profile.progress.';

    public function myProgress(): View | RedirectResponse{
        if(!Auth::user()->hasActivity()) return redirect()->route('public.episodes');

        $lastActivity = EpisodeActivity::where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'DESC')->first();

        if($lastActivity){
            // $lastWatchedEpisode = Episode::where('id', '=', $lastActivity->episode_id)->first();
            $lastWatched = EpisodeVideo::where('id', '=', $lastActivity->video_id)->first();
        }
        $otherActivities = EpisodeActivity::where('user_id', '=', Auth::user()->id)->where('id', '!=', $lastActivity->id)->orderBy('updated_at', 'DESC')->get();
        $otherActivities = Episode::whereHas('episodeActivity', function ($q) use($lastActivity){
            $q->where('user_id', '=', Auth::user()->id);
        })->orderBy('title')->get();

        return view($this->_path . 'progress', [
            'lastWatched' => $lastWatched,
            'otherActivities' => $otherActivities
        ]);
    }
}
