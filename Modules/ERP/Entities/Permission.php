<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=[
        'name',
        'slug'
    ];
}
