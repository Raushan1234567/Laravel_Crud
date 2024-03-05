<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ravi extends Model
{
    use HasFactory;

    protected $table = 'ravi'; // specify the table name
    protected $primaryKey = 'id'; // specify the primary key field name

    protected $fillable = ['name', 'address'];
}
