<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    
    protected $fillable = ['mission', 'vision'];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
