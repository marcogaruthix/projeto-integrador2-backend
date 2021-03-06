<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name', 'description'];

    public function releases(){
    	return $this->hasMany('App\Release');
    }
}
