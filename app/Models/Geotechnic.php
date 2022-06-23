<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geotechnic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'machine_bore_depth' => 'array',
        'manual_well_depth' => 'array',
    ];

    const FINE_GRAINED_LANDS = 'fine_grained_lands';
    const SANDY_ALLUVIAL_SOILS = 'sandy_alluvial_soils';
    const LARGE_SAND_ALLUVIUM = 'large_sand_alluvium';


    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }


    public function land()
    {

        return [
            self::FINE_GRAINED_LANDS => 'ریز دانه ای',
            self::SANDY_ALLUVIAL_SOILS => 'آبرفتی ماسه ای',
            self::LARGE_SAND_ALLUVIUM => 'آبرفتی شن درشت',

        ][$this->type_of_land];
    }



}
