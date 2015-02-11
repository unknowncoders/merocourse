<?php

class DifficultyRating extends \Eloquent {
	protected $fillable = [];

    protected $table = 'difficultyRatings';

    public user(){
        return $this->belongsTo('User','user_id');
    }
    

    public subject(){
        return $this->belongsTo('Subject','subject_id');
    }

}
