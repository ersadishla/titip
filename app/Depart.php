<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
	protected $table = 'departs';

	public $primaryKey = 'id';

	protected $fillable = [
    'time',
    'destination',
    'user_id',
    'entrust_id'
  	];

  	public function user(){
  		return $this->belongsTo('App\User');
  	}

    // public function entrust(){
    //   return $this->belongsTo('App\Entrust');
    // }
    public function transaction(){
      return $this->hasMany('App\Transaction');
    }
    //
}
