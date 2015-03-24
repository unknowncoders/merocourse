<?php

class Coursereview extends \Eloquent {

	protected $fillable = [];
    
    protected $table = 'course_reviews';
 
   public function user(){
        return $this->belongsTo('User','user_id');
  }

  
    public function course()
    {
       return $this->belongsTo('Course','course_id');
    
    }


}
