<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable = [
        'id','name','category_id',
    ];
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
