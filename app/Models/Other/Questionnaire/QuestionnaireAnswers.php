<?php

namespace App\Models\Other\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireAnswers extends Model{
    use HasFactory;

    protected $table = 'questionnaire__answers';
    protected $guarded = ['id'];
}
