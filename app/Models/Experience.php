<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public $timestamps = false;
    protected $hidden = ['employee_id'];



    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
