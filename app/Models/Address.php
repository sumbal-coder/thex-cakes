<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'optional_address',
        'phone_number',
        'optional_phone_number',
        'website',
        'optional_website',
        'link',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
