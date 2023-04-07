<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_name'
    ];
    public $timestamps = false;

    public function sovga(){
        return $this->hasMany(Sovga::class,'category_id','id');
//       return $this->belongsTo(Category::class,'category_name','id');
    }

}
