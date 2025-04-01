<?php

namespace App\Models\Users\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $model_id)
 */
class NotificationMessage extends Model{
    use HasFactory;

    protected $table = 'notifications__messages';
    protected $guarded = ['id'];
}
