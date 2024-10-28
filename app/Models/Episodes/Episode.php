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
use Illuminate\Support\Facades\Auth;

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
    public function reviewsRel(): HasMany{
        return $this->hasMany(Review::class, 'episode_id', 'id');
    }

    /**
     *  Helper functions
     */
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
    public function averageRating(): string {
        return number_format(4, 1, '.', '');
    }
    public function totalReviews(): string{
        try{
            $reviews = $this->reviewsRel->count();

            if($reviews < 100){
                return $reviews;
            }else{
                return number_format(($reviews / 1000), 1, '.', '') . 'K';
            }
        }catch (\Exception $e){
            return 0;
        }
    }

    /**
     *  Check does this episode has review from logged User
     */
    public function hasReview(): int{
        return Review::where('episode_id', '=', $this->id)->where('user_id', '=', Auth::user()->id)->count();
    }
}
