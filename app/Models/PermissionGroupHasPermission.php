<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionGroupHasPermission extends Model
{
    use HasFactory;

    protected $fillable = ['permission_group_id', 'permission_id'];
}
