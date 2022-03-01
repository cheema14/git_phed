<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'name',
        'slug'
    ];
}
