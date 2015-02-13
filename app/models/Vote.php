<?php

class Vote extends \Eloquent {
	protected $fillable = [];

    protected $table = 'votes';

    public function user(){
            return $this->belongsTo('User','user_id');
    }

    public function review(){
            return $this->belongsTo('Review','review_id');
    }
}
