<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Core\Country;
use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeActivity;
use App\Models\Episodes\Review;
use App\Traits\Episodes\EpisodeBaseTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $except)
 * @method static pluck(string $string, string $string1)
 */
class User extends Authenticatable{
    use HasFactory, Notifiable, EpisodeBaseTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'api_token',
        'role',
        'prefix',
        'phone',
        'birth_date',
        'address',
        'city',
        'country',
        'about',
        'photo_uri',
        'cover_photo_uri',
        'instagram',
        'facebook',
        'twitter',
        'linkedin',
        'web'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function photoUri(){
        return isset($this->photo_uri) ? $this->photo_uri : 'silhouette.png';
    }
    public function coverPhotoUri(){
        return isset($this->cover_photo_uri	) ? $this->cover_photo_uri : '';
    }
    public function birthDate(): string {
        return Carbon::parse(isset($this->birth_date) ? $this->birth_date : date('Y-m-d'))->format('d.m.Y');
    }
    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
    public function getInitials(): string{
        $name = explode(' ', $this->name);
        return substr($name[0] ?? '', 0, 1) . (isset($name[1]) ? ' ' . substr($name[1] ?? '', 0, 1) : '');
    }
    public function totalReviews(): int{
        return Review::where('user_id', '=', $this->id)->count();
    }
    public function totalReviewsByWord(): int | string{
        return $this->numberOfReviewsInWords($this->totalReviews());
    }
    public function activityRel(): HasMany{
        return $this->hasMany(EpisodeActivity::class, 'user_id', 'id');
    }
    public function hasActivity(): int{
        return isset($this->activityRel) ? $this->activityRel->count() : 0;
    }
    public function episodeRel(): HasOne{
        return $this->hasOne(Episode::class, 'presenter_id', 'id');
    }

    /**
     * Get number of episodes, watched by user
     * @return int
     */
    public function episodesWatched(): int{
        return EpisodeActivity::where('user_id', '=', $this->id)
            ->select('episode_id')
            ->distinct()
            ->get()
            ->count();
    }

    /**
     * Get total number of time, spent watching videos
     * @return int|string
     */
    public function totalWatchTime(): int | string{
        return $this->getDurationHelper(EpisodeActivity::where('user_id', '=', $this->id)->sum('time'));
    }
}
