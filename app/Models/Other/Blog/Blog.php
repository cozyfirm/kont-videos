<?php

namespace App\Models\Other\Blog;

use App\Models\Core\File;
use App\Models\Core\Keyword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static take(int $int)
 * @method static get()
 * @method static orderBy(string $string, string $string1)
 */
class Blog extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'blog';
    protected $guarded = ['id'];

    /**
     * Helper functions:
     *
     *  1. Get date
     *  2. Get date time
     */
    public function getDate(): string{
        return Carbon::parse($this->created_at ?? date('Y-m-d'))->format('d.m.Y');
    }
    public function getDateTime():string {
        return Carbon::parse($this->created_at ?? date('Y-m-d H:i'))->format('M d.Y H:i');
    }

    /**
     *  Get model relationships
     */
    public function categoryRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'category');
    }
    public function createdBy(): HasOne{
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function smallImgRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'small_img');
    }
    public function mainImgRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'main_img');
    }
    public function imageRel(): HasMany{
        return $this->hasMany(BlogGallery::class, 'blog_id', 'id');
    }

    /**
     *  Get category
     */
    public function getCategory(){
        return (!$this->category) ? __('Globalni post') : $this->categoryRel->name ?? '';
    }
}
