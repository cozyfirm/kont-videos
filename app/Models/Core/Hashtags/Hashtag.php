<?php

namespace App\Models\Core\Hashtags;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, mixed $tag)
 */
class Hashtag extends Model{
    use HasFactory;

    protected $table = 'hashtags';
    protected $guarded = ['id'];

    public function tagsRel(): HasMany{
        return $this->hasMany(HashtagRel::class, 'tag_id', 'id');
    }
}
