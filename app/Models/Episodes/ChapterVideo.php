<?php

namespace App\Models\Episodes;

use App\Traits\Episodes\EpisodeBaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $except)
 * @method static where(string $string, string $string1, $id)
 */
class ChapterVideo extends Model{
    use HasFactory, SoftDeletes, EpisodeBaseTrait;

    protected $table = 'episodes__chapter_videos';
    protected $guarded = ['id'];

    public function getDuration(): string{
        return $this->getDurationHelper($this->duration_sec);
    }
    public function episodeRel(): HasOne{
        return $this->hasOne(Episode::class, 'id', 'episode_id');
    }
    public function chaptersRel(): HasMany{
        return $this->hasMany(Chapter::class, 'video_id', 'id');
    }
}
