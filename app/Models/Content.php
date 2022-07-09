<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    protected $primaryKey = 'content_id';

    protected $fillable = [
        'content_name',
        'content_image',
        'content_url',
        'is_one_account',
        'is_paid_subscription',
        'user_id'
    ];

    protected $casts = [
        'user_id' => 'int'
    ];
}
