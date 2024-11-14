<?php

namespace App\Http\Controllers\Admin\Other\Questionnaire;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\Other\Questionnaire\Questionnaire;
use App\Models\Other\Questionnaire\QuestionnaireAnswers;
use App\Models\Other\Questionnaire\QuestionnaireAnswersRel;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionnaireController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait;
    protected string $_path = 'admin.app.other.questionnaire.';

    public function index(): View{
        $questions = Questionnaire::where('id', '>', 0);
        $questions = Filters::filter($questions);
        $filters = [ 'question' => __('Pitanje')];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'questions' => $questions
        ]);
    }
    public function create(): View{
        return view($this->_path . 'create', [
            'create' => true
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $question = Questionnaire::create($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.questionnaire.preview', ['id' => $question->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview($id): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'question' => Questionnaire::where('id', '=', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'question' => Questionnaire::where('id', '=', $id)->first()
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            Questionnaire::where('id', '=', $request->id)->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.questionnaire.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function delete($id): RedirectResponse{
        Questionnaire::where('id', '=', $id)->delete();
        return redirect()->route('system.admin.episodes.questionnaire')->with('success', __('Uspješno obrisano!'));
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /**
     * Answers per episode and detailed infos
     */
    public function answersPerEpisode($episode_id): View{
        $episode   = Episode::where('id', '=', $episode_id)->first();

        $questionnaires = QuestionnaireAnswers::where('episode_id', '=', $episode_id)->orderBy('id', 'DESC');
        $questionnaires = Filters::filter($questionnaires);
        $filters = [ 'userRel.name' => __('Korisnik')];

        return view($this->_path . 'per-episode', [
            'filters' => $filters,
            'questionnaires' => $questionnaires,
            'episode' => $episode
        ]);
    }

    public function answersPerEpisodeDetailed($id): View{
        $questAnswer = QuestionnaireAnswers::where('id', '=', $id)->first();
        $episode     = Episode::where('id', '=', $questAnswer->episode_id)->first();
        $answers     = QuestionnaireAnswersRel::where('qa_id', '=', $questAnswer->id)->get();

        return view($this->_path . 'per-episode-detailed', [
            'episode' => $episode,
            'questAnswer' => $questAnswer,
            'answers' => $answers
        ]);
    }
}
