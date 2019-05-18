<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	public function depart(){
		return $this->belongsTo('App\Depart');
	}
	public function entrust(){
		return $this->belongsTo('App\Entrust');
	}
    //
}
