<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    use HasFactory;

    protected $fillable = [
       'image','firstname','lastname','fonction','datepanne','type','nature','description','request_case','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
