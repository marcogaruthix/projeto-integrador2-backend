<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $fillable = ['id', 'description', 'user_id', 'method_id', 'category_id', 'value'];
    protected $hidden = ['category_id'];

    public function category(){
		return $this->belongsTo('App\Category');
	}

	public function method(){
		return $this->belongsTo('App\Method');
	}
}
