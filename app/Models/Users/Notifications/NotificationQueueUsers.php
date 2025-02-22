<?php

namespace App\Models\Users\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 * @method static create(array $array)
 */
class NotificationQueueUsers extends Model{
    use HasFactory;

    protected $table = 'notifications__queue_users';
    protected $guarded = ['id'];
}
