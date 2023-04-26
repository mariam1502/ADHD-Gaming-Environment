<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PatientModel extends Eloquent
{

    protected $connection="mongodb";
    protected $collection = 'Patients';

    protected $fillable = ['name', 'birth' ,'gendre', 'email' ,'phone' ,'symptoms' ,'diagnostic_information' ,'history','impacting_daily' ,'support_system' ,'school_performance' ,'home_environment' ,'social_skills','medication' ,'daily_routines','emotional_behavioral_regulation','self_esteem','goals','extra'];


}
