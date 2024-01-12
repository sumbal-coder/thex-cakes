<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Address extends Model
{
    use HasFactory, SoftDeletes, CausesActivity, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['added_by', 'title', 'address', 'phone_number', 'website'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Address');
    }

    protected $fillable = [
        'added_by',
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
