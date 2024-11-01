<?php

namespace App\Models\Episodes;

use App\Models\Core\File;
use App\Models\Core\Keyword;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use App\Traits\Episodes\EpisodeBaseTrait;
use Carbon\Carbon;
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
 * @property mixed $stars
 * @property mixed $videoContentRel
 */
class Episode extends Model{
    use HasFactory, SoftDeletes, EpisodeBaseTrait, CommonTrait;

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
    public function approvedReviewsRel(): HasMany{
        return $this->hasMany(Review::class, 'episode_id', 'id')->where('status', '=', 1)->orderBy('id', 'DESC');
    }
    public function languageRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'language_id');
    }
    public function userNotesRel(): HasMany{
        return $this->hasMany(MyNote::class, 'episode_id', 'id')->where('user_id', '=', Auth::user()->id);
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
        return EpisodeVideo::where('episode_id', '=', $this->id)->sum('total_loads');
    }
    public function averageRating(): string {
        return ($this->stars) ? $this->stars : '1.0';
    }
    public function setAverageRating(): string{
        $stars = Review::where('episode_id', '=', $this->id)->where('status', '=', 1)->sum('stars');
        $total = Review::where('episode_id', '=', $this->id)->where('status', '=', 1)->count();
        $avgReview = number_format(($total) ? (floor(($stars / $total) * 2) / 2) : 0, 1, '.', '');

        $this->update(['stars' => $avgReview]);

        return $avgReview;
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
    public function lastUpdated(): string{
        return $this->getMonthName(Carbon::parse($this->updated_at)->format('m') - 1) . ' ' . Carbon::parse($this->updated_at)->format('Y');
    }

    /**
     *  Check does this episode has review from logged User
     */
    public function hasReview(): int{
        return Review::where('episode_id', '=', $this->id)->where('user_id', '=', Auth::user()->id)->count();
    }
}
