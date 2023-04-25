<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TherapistModel extends Eloquent
{
    protected $connection="mongodb";

    protected $fillable = ['name', 'email', 'password',"phone",'country'];
    protected $collection = 'Therapist';
    
}
