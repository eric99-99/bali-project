<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public $timestamps = false;

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'employee_id','id');
    }

}
