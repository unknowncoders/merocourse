<?php

class Admin extends \Eloquent {
	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admins';

    public function user(){

            return $this->belongsTo('User');
    }    
}
