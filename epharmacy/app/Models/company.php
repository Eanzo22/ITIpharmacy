<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $guarded = ['created_at' , 'updated_at' , 'deleted_at'] ;
    use HasFactory;
    public function drugs () {
        return $this->hasMany(drug::class) ; 
    }
}
