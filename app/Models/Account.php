<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    protected $fillable = [
        'account_name',
        'content_id',
        'email_address',
        'password',
        'is_multi_factor_authentication',
        'is_use_oauth2',
    ];
}
