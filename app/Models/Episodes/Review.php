<?php

namespace App\Models\Episodes;

use App\Models\Core\Keyword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, mixed $episode_id)
 */
class Review extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'episodes__reviews';
    protected $guarded = ['id'];

    public function episodeRel(): HasOne{
        return $this->hasOne(Episode::class, 'id', 'episode_id');
    }
    public function userRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function createdAt(): string{
        return Carbon::parse($this->created_at)->format('d.m.Y H:i');
    }
    public function statusRel(): HasOne{
        return $this->hasOne(Keyword::class, 'value', 'status')->where('type', '=', 'reviews_status');
    }
}
