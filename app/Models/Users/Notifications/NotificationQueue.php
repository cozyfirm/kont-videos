<?php

namespace App\Models\Users\Notifications;

use App\Models\Episodes\Episode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, string $string2)
 */
class NotificationQueue extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'notifications__queue';
    protected $guarded = ['id'];

    public function episodeRel(): HasOne{
        return $this->hasOne(Episode::class, 'id', 'model_id');
    }
}
