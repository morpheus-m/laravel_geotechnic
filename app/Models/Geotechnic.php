<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geotechnic extends Model
{
    use HasFactory;


    const FINE_GRAINED_LANDS = 'fine_grained_lands';
    const SANDY_ALLUVIAL_SOILS = 'sandy_alluvial_soils';
    const LARGE_SAND_ALLUVIUM = 'large_sand_alluvium';


}
