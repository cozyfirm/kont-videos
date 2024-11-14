<?php

namespace App\Models\Other\Questionnaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $all)
 * @method static get()
 */
class Questionnaire extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'questionnaire';
    protected $guarded = ['id'];
}
