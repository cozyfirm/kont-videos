<?php

namespace App\Models\Other\Blog;

use App\Models\Core\File;
use App\Models\Core\Keyword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static take(int $int)
 */
class Blog extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'blog';
    protected $guarded = ['id'];

    public function categoryRel(): HasOne{
        return $this->hasOne(Keyword::class, 'id', 'category');
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
}
