<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sovga extends Model
{
    use HasFactory;
    protected $table='sovgas';
    protected $primaryKey='id';
    protected $fillable=[
        'image','name','description','narx','soni','savat_id','category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

}
