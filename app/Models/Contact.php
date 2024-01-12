<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Contact extends Model
{
    use HasFactory, SoftDeletes, CausesActivity, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'subject', 'message'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Contact');
    }

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
