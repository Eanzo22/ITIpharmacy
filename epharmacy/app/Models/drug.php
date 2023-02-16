<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class drug extends Model
{
    protected $guarded = ['created_at' , 'updated_at' , 'deleted_at'] ;
    use SoftDeletes ;
    use HasFactory;
    public function company() {
        return $this->belongsTo(company::class) ;
    }
    public function categories(){
        return $this->belongsToMany(category::class , "drug_category" , "drug_id" , "category_id") ; 
    }
}
