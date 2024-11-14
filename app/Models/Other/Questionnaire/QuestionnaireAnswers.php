<?php

namespace App\Models\Other\Questionnaire;

use App\Models\Episodes\Episode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, mixed $id)
 */
class QuestionnaireAnswers extends Model{
    use HasFactory;

    protected $table = 'questionnaire__answers';
    protected $guarded = ['id'];

    public function episodeRel(): HasOne{
        return $this->hasOne(Episode::class, 'id', 'episode_id');
    }
    public function userRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
