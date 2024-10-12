<?php

namespace App\Models\Episodes;

use App\Traits\Episodes\EpisodeBaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * @method static create(array $except)
 * @method static where(string $string, string $string1, $id)
 */
class EpisodeVideo extends Model{
    use HasFactory, SoftDeletes, EpisodeBaseTrait;

    protected $table = 'episodes__videos';
    protected $guarded = ['id'];

    public function getDuration(): string{
        return $this->getDurationHelper($this->duration_sec);
    }
    public function activityRel(): HasOne{
        return $this->hasOne(EpisodeActivity::class, 'video_id', 'id')->where('user_id', '=', Auth::user()->id);
    }
}
