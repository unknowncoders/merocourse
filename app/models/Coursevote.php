<?php

class Coursevote extends \Eloquent {
 
    protected $fillable = [];
    
    protected $table = 'course_votes';
    
    public function user(){
            
            return $this->belongsTo('User','user_id'); }

    public function review(){
           
            return $this->belongsTo('Coursereview','course_reviews_id');
    }
}
