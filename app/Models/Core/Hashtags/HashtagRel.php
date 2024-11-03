<?php

namespace App\Models\Core\Hashtags;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, $category)
 */
class HashtagRel extends Model{
    use HasFactory;

    protected $table = 'hashtags__rel';
    protected $guarded = ['id'];

    public function tagRel(): HasOne{
        return $this->hasOne(Hashtag::class, 'id', 'tag_id');
    }
}
