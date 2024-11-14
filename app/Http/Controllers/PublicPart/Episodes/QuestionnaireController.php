<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Other\Questionnaire\QuestionnaireAnswers;
use App\Models\Other\Questionnaire\QuestionnaireAnswersRel;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller{
    use ResponseTrait, EpisodeBaseTrait;

    public function save(Request $request): JsonResponse{
        try{
            /* Check does it exist */
            $questAnswer = QuestionnaireAnswers::where('episode_id', '=', $request->episode_id)->where('user_id', '=', Auth::user()->id)->first();
            if($questAnswer){
                /* Delete all previous answers */
                QuestionnaireAnswersRel::where('qa_id', '=', $questAnswer->id)->delete();
            }else{
                /* Create new answer */
                $questAnswer = QuestionnaireAnswers::create([
                    'episode_id' => $request->episode_id,
                    'user_id' => Auth::user()->id
                ]);
            }

            foreach ($request->data as $question){
                QuestionnaireAnswersRel::create([
                    'qa_id' => $questAnswer->id,
                    'question_id' => $question['question_id'],
                    'answer' => $question['value']
                ]);
            }

            return $this->jsonSuccess(__('Uspješno spašeno. Hvala na učešću! '));
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Desila se greška. Pokušajte ponovo!'));
        }
    }
}
