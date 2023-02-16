<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = ['created_at' , 'updated_at' , 'deleted_at'] ;
    use HasFactory;
    public function drug() {
        return $this->belongsTo(drug::class) ;
    }
    public function user() {
        return $this->belongsTo(user::class) ;
    }
}
