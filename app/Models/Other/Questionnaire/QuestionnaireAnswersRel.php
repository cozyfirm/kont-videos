<?php

namespace App\Models\Other\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireAnswersRel extends Model{
    use HasFactory;

    protected $table = 'questionnaire__answers_rel';
    protected $guarded = ['id'];
}
