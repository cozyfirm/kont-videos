<?php

namespace App\Models\Episodes;

use App\Models\Core\File;
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
    use HasFactory, SoftDeletes;

    protected $table = 'episodes';
    protected $guarded = ['id'];

    public function imageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function videoRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'video_id');
    }
    public function videoContentRel(): HasMany{
        return $this->hasMany(EpisodeVideo::class, 'episode_id', 'id');
    }
}
