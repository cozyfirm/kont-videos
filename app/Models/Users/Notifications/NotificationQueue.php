<?php

namespace App\Models\Users\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, string $string2)
 */
class NotificationQueue extends Model{
    use HasFactory;

    protected $table = 'notifications__queue';
    protected $guarded = ['id'];


}
