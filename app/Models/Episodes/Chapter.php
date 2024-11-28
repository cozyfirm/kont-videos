<?php

namespace App\Models\Episodes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $except)
 * @method static where(string $string, string $string1, $id)
 */
class Chapter extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'episodes__chapters';
    protected $guarded = ['id'];


}
