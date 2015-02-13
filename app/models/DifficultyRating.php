<?php

class DifficultyRating extends \Eloquent {
	protected $fillable = [];

    protected $table = 'difficultyRatings';

    public function user(){
        return $this->belongsTo('User','user_id');
    }
    

    public function subject(){
        return $this->belongsTo('Subject','subject_id');
    }

}
