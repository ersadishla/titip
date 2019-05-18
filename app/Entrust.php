<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrust extends Model
{
	protected $table = 'entrusts';

	public $primaryKey = 'id';

	protected $fillable = [
    'something',
    'user_id'
  	];

	public function user(){
		return $this->belongsTo('App\User');
	}

	// public function depart(){
	// 	return $this->hasOne('App\Depart');
	// }
	public function transaction(){
      return $this->hasMany('App\Transaction');
    }
    //
}
