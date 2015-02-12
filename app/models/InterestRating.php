<?php

class InterestRating extends \Eloquent {
	protected $fillable = [];

    protected $table = 'interestRatings';

    public function user(){
        return $this->belongsTo('User','user_id');
    }
    

    public function subject(){
        return $this->belongsTo('Subject','subject_id');
    }


}
