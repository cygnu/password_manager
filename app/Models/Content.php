<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_name',
        'content_image',
        'content_url',
        'is_one_account',
        'is_paid_subscription',
    ];

    // protected $casts = [
    //     'is_one_account' => 'boolean',
    //     'is_paid_subscription' => 'boolean',
    // ];
}
