<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Student extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = ['id'];    

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('first_name')
            ->saveSlugsTo('slug'); 
   }

    public function attendance(){
        return $this->hasMany('App\Models\Attendance');
    }
}
