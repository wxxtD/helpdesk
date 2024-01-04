<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logiciel extends Model
{
    use HasFactory;
    protected $fillable = [
      'nom', 'date_creation' ,'licence', 'version' , 'code_config','code'
    ];
}
