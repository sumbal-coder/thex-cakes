<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['content'];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
