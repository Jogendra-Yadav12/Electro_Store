<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";
    protected $primaryKey = 'id';
    protected $fillables = ['name','email','password'];
    use HasFactory;
}
