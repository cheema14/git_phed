<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $table = 'scheme';
    protected $fillable = [
        'scheme_number', 'scheme_name', 'province_id', 'identified_by_id', 'recommended_by_id', 'program_id', 'tehsil_id', 'division_id', 'district_id'
    ];

    public function program()
    {
        return $this->hasOne(Program::class, 'id', 'program_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function zone()
    {
        return $this->hasOne(Zone::class, 'id', 'zone_id');
    }

    public function division()
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
    }

    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function tehsil()
    {
        return $this->hasOne(Tehsil::class, 'id', 'tehsil_id');
    }

    public function identified_by()
    {
        return $this->hasOne(ActionBy::class, 'id', 'recommended_by_id');
    }

    public function cleared_by()
    {
        return $this->hasOne(ActionBy::class, 'id', 'recommended_by_id');
    }

    public function schemes_list()
    {
    }


}
