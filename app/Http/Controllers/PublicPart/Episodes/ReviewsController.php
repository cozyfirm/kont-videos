<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\Episodes\Review;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller{
    use ResponseTrait, EpisodeBaseTrait;

    public function save(Request $request): JsonResponse{
        try{
            $review = Review::where('episode_id', '=', $request->episode_id)->where('user_id', '=', Auth::user()->id)->first();
            if($review){
                if($review->status != 0){
                    return $this->jsonError('0001', __('Vaša recenzija je objavljena. Nije moguće vršiti naknadne izmjene!'));
                }
                $review->update([
                    'stars' => $request->stars,
                    'note' => $request->note
                ]);
            }else{
                $review = Review::create([
                    'episode_id' => $request->episode_id,
                    'user_id' => Auth::user()->id,
                    'stars' => $request->stars,
                    'note' => $request->note
                ]);
            }

            return $this->jsonSuccess(__('Uspješno sačuvano!'));
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }
    public function checkForReview(Request $request): JsonResponse | bool | string {
        try{
            $review = Review::where('episode_id', '=', $request->episode_id)->where('user_id', '=', Auth::user()->id)->first();

            /* Detect where did user click on it */
            $starIndex = 1; $index = 'left';

            if(isset($review)){
                $this->getReviewsInfo($starIndex, $index, $review->stars);
            }

            return $this->jsonResponse('0000', __('Uspješno sačuvano!'), [
                'review' => $review,
                'hasReview' => isset($review),
                'starIndex' => $starIndex,
                'index' => $index
            ]);
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }
}
