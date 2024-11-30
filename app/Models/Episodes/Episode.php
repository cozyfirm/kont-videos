<?php

namespace App\Models\Episodes;

use App\Models\Core\File;
use App\Models\Core\Hashtags\Hashtag;
use App\Models\Core\Keyword;
use App\Models\Other\Questionnaire\Questionnaire;
use App\Models\Other\Questionnaire\QuestionnaireAnswers;
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
 * @method static find(mixed $id)
 * @method static whereHas(string $string, \Closure $param)
 * @property mixed $stars
 * @property mixed $videoContentRel
 */
class Episode extends Model{
    use HasFactory, SoftDeletes, EpisodeBaseTrait, CommonTrait;

    protected $table = 'episodes';
    protected $guarded = ['id'];

    protected array $taggable = ['title', 'short_description', 'description'];
    public function getTaggable(): array {return $this->taggable; }

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
        return $this->hasMany(EpisodeVideo::class, 'episode_id', 'id')->where('category', '=', 1)->orderBy('id');
    }
    public function allVideoContentRel(): HasMany{
        return $this->hasMany(EpisodeVideo::class, 'episode_id', 'id')->orderBy('id');
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
    public function episodeActivity(): HasMany{
        return $this->hasMany(EpisodeActivity::class, 'episode_id', 'id');
    }
    public function questionnaireRel(): HasMany{
        return $this->hasMany(QuestionnaireAnswers::class, 'episode_id', 'id')->orderBy('id');
    }

    /**
     *  Episode chapters relationships
     */
    public function chapterVideoRel(): HasOne{
        return $this->hasOne(ChapterVideo::class,'episode_id', 'id')->where('category', '=', '1');
    }
    public function chapterTrailerRel(): HasOne{
        return $this->hasOne(ChapterVideo::class,'episode_id', 'id')->where('category', '=', '2');
    }

    /**
     * Get duration in seconds (based on video durations)
     * @return int
     */
    public function durationInSeconds(): int{
        $duration = 0;
        if($this->type == 0){
            foreach ($this->videoContentRel as $video){
                $duration += $video->duration_sec;
            }
        }else{
            $duration = $this->chapterVideoRel->duration_sec ?? 0;
        }
        return $duration;
    }
    /**
     * Get total duration of Episode:
     *  - based on video durations for type = 1
     *  - based on single video (chapters) for type = 2
     * @return string
     */
    public function totalDuration(): string{
        if(isset($this->type) and $this->type == 0){
            return $this->getDurationHelper($this->durationInSeconds());
        }else{
            return $this->getDurationHelper(isset($this->chapterVideoRel) ? $this->chapterVideoRel->duration_sec : 0);
        }
    }

    /**
     * Get number of total views | loads (API is not considered this time)
     * @return int
     */
    public function totalViews(): int{
        if($this->type == 0) return EpisodeVideo::where('episode_id', '=', $this->id)->sum('total_loads');
        else return ChapterVideo::where('episode_id', '=', $this->id)->sum('total_loads');
    }

    /**
     * Average rating (based on calculated value)
     * @return string
     */
    public function averageRating(): string {
        return ($this->stars) ? $this->stars : '1.0';
    }

    /**
     * Set average rating of episode, according to approved ratings;
     * This function should be called on "Approve rating"
     * @return string
     */
    public function setAverageRating(): string{
        $stars = Review::where('episode_id', '=', $this->id)->where('status', '=', 1)->sum('stars');
        $total = Review::where('episode_id', '=', $this->id)->where('status', '=', 1)->count();
        $avgReview = number_format(($total) ? (floor(($stars / $total) * 2) / 2) : 0, 1, '.', '');

        $this->update(['stars' => $avgReview]);

        return $avgReview;
    }

    /**
     * Total approved reviews (scaled for huge amount of reviews)
     * @return string
     */
    public function totalReviews(): string{
        try{
            $reviews = $this->approvedReviewsRel->count();

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
     * Last updated in format Month year
     * @return string
     */
    public function lastUpdated(): string{
        return $this->getMonthName(Carbon::parse($this->updated_at)->format('m') - 1) . ' ' . Carbon::parse($this->updated_at)->format('Y');
    }

    /**
     * Number of chapters (trailer not included)
     * @return int
     */
    public function totalChapters(): int{
        if($this->type == 0) return isset($this->videoContentRel) ? $this->videoContentRel->count() : 0;
        else return isset($this->chapterVideoRel->chaptersRel) ? $this->chapterVideoRel->chaptersRel->count() : 0;
    }

    /**
     * Year, when episode is created | published
     * @return string
     */
    public function getCreationYear(): string{
        return isset($this->created_at) ? $this->getYear($this->created_at) : date('Y');
    }

    /**
     *  Check does this episode has review from logged User
     */
    public function hasReview(): int{
        return Review::where('episode_id', '=', $this->id)->where('user_id', '=', Auth::user()->id)->count();
    }

    /**
     * Calculate progress per episode for logged User
     * @return int
     */
    public function progressByUser(): int{
        $durationInSeconds = $this->durationInSeconds();
        if(!$durationInSeconds) return 0;

        /**
         *  Let's find out, total watch time of episode, based on logged User activity
         */
        $watchedSeconds = EpisodeActivity::where('episode_id', '=', $this->id)->where('user_id', '=', Auth::user()->id)->sum('time');

        $progress = (int) (($watchedSeconds / $durationInSeconds) * 100);
        /* Cheat sheet; Differences between duration from API and real duration in around one second */
        return ($progress >= 98) ? 100 : $progress;
    }

    /**
     * Get rating by user for specific Episode
     * @return int|string|bool
     */
    public function userRating(): int | string | bool{
        $review =  Review::where('episode_id', '=', $this->id)->where('user_id', '=', Auth::user()->id)->first(['stars']);
        return isset($review) ? $review->stars : false;
    }

    /**
     * Get all tags by user
     * @return mixed
     */
    public function getAllTags(): mixed{
        $id = $this->id;

        $tags = Hashtag::where('lang', '=', 'bs')->whereHas('tagsRel', function ($query) use ($id){
            $query->where(function ($query) use ($id){
                $query->where('post_id', $id)->where('category', $this->getTable());
            });
        })->orderBy('id')->get();

        foreach ($tags as $tag){
            $tag->update(['views' => ($tag->views + 1)]);
            $tag->tag = str_replace('#', '', $tag->tag);
        }

        return $tags;
    }

    public function isNew(): bool{
        $date = Carbon::parse($this->created_at);
        $now  = Carbon::now();

        return !(($date->diffInDays($now) > 30));
    }
}
