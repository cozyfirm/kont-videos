<?php

namespace App\Models\Episodes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, $id)
 * @method static create(array $array)
 */
class EpisodeActivity extends Model{
    use HasFactory;

    protected $table = 'episodes__activity';
    protected $guarded = ['id'];

    public function episodeRel(): HasOne{
        return $this->hasOne(Episode::class, 'id', 'episode_id');
    }
    public function chapterRel(): HasOne{
        return $this->hasOne(Chapter::class, 'id', 'chapter_id');
    }
}
