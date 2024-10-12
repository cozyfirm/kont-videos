<?php

namespace App\Models\Episodes;

use App\Models\Core\File;
use App\Models\User;
use App\Traits\Episodes\EpisodeBaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $array)
 * @method static get()
 * @method static orderBy(string $string, string $string1)
 */
class Episode extends Model{
    use HasFactory, SoftDeletes, EpisodeBaseTrait;

    protected $table = 'episodes';
    protected $guarded = ['id'];

    public function presenterRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'presenter_id');
    }
    public function imageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function videoRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'video_id');
    }
    public function videoContentRel(): HasMany{
        return $this->hasMany(EpisodeVideo::class, 'episode_id', 'id');
    }
    public function totalDuration(): string{
        $duration = 0;
        foreach ($this->videoContentRel as $video){
            $duration += $video->duration_sec;
        }
        return $this->getDurationHelper($duration);
    }
    public function totalViews(): int{
        return EpisodeVideo::where('episode_id', '=', $this->id)->sum('views');
    }
}
