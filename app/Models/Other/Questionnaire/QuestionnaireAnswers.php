<?php

namespace App\Models\Other\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, mixed $id)
 */
class QuestionnaireAnswers extends Model{
    use HasFactory;

    protected $table = 'questionnaire__answers';
    protected $guarded = ['id'];
}
