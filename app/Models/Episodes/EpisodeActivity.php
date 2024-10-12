<?php

namespace App\Models\Episodes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 * @method static create(array $array)
 */
class EpisodeActivity extends Model{
    use HasFactory;

    protected $table = 'episodes__activity';
    protected $guarded = ['id'];

}
