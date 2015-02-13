<?php

class UserResource extends \Eloquent {
	protected $fillable = [];

    public function user(){
            return $this->belongsTo('User','user_id');
    }

    public function subject(){
            return $this->belongsTo('Subject','subject_id');
    }
}
