<?php

class Subject extends Eloquent
{
   protected $table ='subject';
   protected $fillable = array('subject_name');

   public function user()
    {
          return $this->belongsToMany('Review','sur')->withPivot('review_id');
    }

   public function review()
   {  
           return $this->belongsToMany('User','sur')->withPivot('user_id');
   }


}
