<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";

    protected $casts = [
        'id'    => 'string'
    ];
}
