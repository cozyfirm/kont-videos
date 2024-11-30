<?php

namespace App\Models\Episodes;

use App\Traits\Common\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, mixed $video_id)
 * @method static create(array $array)
 */
class MyNote extends Model{
    use HasFactory, SoftDeletes, CommonTrait;

    protected $table = 'episodes__notes';
    protected $guarded = ['id'];

    public function createdAtDate(): string{
        return isset($this->created_at) ? Carbon::parse($this->created_at)->format('d. ') . $this->getMonthName(Carbon::parse($this->created_at)->format('m') - 1) . ' ' . Carbon::parse($this->created_at)->format('Y') : '';
    }
    public function videoRel(): HasOne{
        return $this->hasOne(EpisodeVideo::class, 'id', 'video_id');
    }
    public function chapterRel(): HasOne{
        return $this->hasOne(Chapter::class, 'id', 'chapter_id');
    }
}
