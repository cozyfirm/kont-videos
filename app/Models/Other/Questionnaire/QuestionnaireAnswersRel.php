<?php

namespace App\Models\Other\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, $id)
 */
class QuestionnaireAnswersRel extends Model{
    use HasFactory;

    protected $table = 'questionnaire__answers_rel';
    protected $guarded = ['id'];

    public function questionRel(): HasOne{
        return $this->hasOne(Questionnaire::class, 'id', 'question_id');
    }
}
