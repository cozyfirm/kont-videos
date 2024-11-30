<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Chapter;
use App\Models\Episodes\EpisodeVideo;
use App\Models\Episodes\MyNote;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller{
    use ResponseTrait, EpisodeBaseTrait;

    /**
     * Save new note
     *
     * @param Request $request
     * @return JsonResponse|string|bool
     */
    public function save(Request $request): JsonResponse | string | bool{
        try{
            if(isset($request->chapter_id)){
                /* Note on chapter */
                $note = MyNote::where('video_id', '=', $request->video_id)->where('chapter_id', '=', $request->chapter_id)->where('user_id', '=', Auth::user()->id)->where('time', '=', $request->time)->first();
                if($note){
                    $note->update(['note' => $request->note]);
                }else{
                    $note = MyNote::create([
                        'episode_id' => $request->episode_id,
                        'video_id' => $request->video_id,
                        'chapter_id' => $request->chapter_id,
                        'user_id' => Auth::user()->id,
                        'time' => $request->time,
                        'note' => $request->note
                    ]);;
                }
            }else{
                /* Note on real video */
                $note = MyNote::where('video_id', '=', $request->video_id)->where('user_id', '=', Auth::user()->id)->where('time', '=', $request->time)->first();
                if($note){
                    $note->update(['note' => $request->note]);
                }else{
                    $note = MyNote::create([
                        'episode_id' => $request->episode_id,
                        'video_id' => $request->video_id,
                        'user_id' => Auth::user()->id,
                        'time' => $request->time,
                        'note' => $request->note
                    ]);;
                }
            }

            $note->createdAtDate = $note->createdAtDate();

            return $this->jsonResponse('0000', __('Uspješno sačuvano!'), [
                'note' => $note,
                'video' => isset($request->chapter_id) ? Chapter::where('id', '=', $request->chapter_id)->first() : EpisodeVideo::where('id', '=', $request->video_id)->first()
            ]);
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }

    /**
     * Load note; Pay attention for permissions
     *
     * @param Request $request
     * @return bool|JsonResponse|string
     */
    public function load(Request $request): JsonResponse | string | bool{
        try{
            $note = MyNote::where('id', '=', $request->id)->where('user_id', '=', Auth::user()->id)->first();
            if(!$note){
                return $this->jsonError('0002', __('Desila se greška. Pokušajte ponovo!'));
            }
            $note->createdAtDate = $note->createdAtDate();

            return $this->jsonResponse('0000', __('Uspješno sačuvano!'), [
                'note' => $note,
                'video' => isset($note->chapter_id) ? Chapter::where('id', '=', $note->chapter_id)->first() : EpisodeVideo::where('id', '=', $note->video_id)->first()
            ]);
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }

    /**
     * Update note
     *
     * @param Request $request
     * @return JsonResponse|string|bool
     */
    public function update(Request $request): JsonResponse | string | bool{
        try{
            $note = MyNote::where('id', '=', $request->id)->where('user_id', '=', Auth::user()->id)->first();
            if(!$note){
                return $this->jsonError('0002', __('Desila se greška. Pokušajte ponovo!'));
            }

            $note->update(['note' => $request->note ]);

            return $this->jsonSuccess(__('Uspješno ažurirano!!'));
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }

    /**
     * Delete note
     * @param Request $request
     * @return JsonResponse|string|bool
     */
    public function delete(Request $request): JsonResponse | string | bool{
        try{
            $note = MyNote::where('id', '=', $request->id)->where('user_id', '=', Auth::user()->id)->first();
            if(!$note){
                return $this->jsonError('0002', __('Desila se greška. Pokušajte ponovo!'));
            }
            $note->delete();

            return $this->jsonSuccess(__('Uspješno obrisano!!'));
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }
}
