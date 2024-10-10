<?php

namespace App\Models\Episodes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $array)
 */
class Episode extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'episodes';
    protected $guarded = ['id'];

}
