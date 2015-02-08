<?php

class Subject extends Eloquent
{
   protected $fillable = array('subject_name');

   protected $table ='subject';

   public function user()
    {
          return $this->belongsToMany('User','sur')->withPivot('review_id');
    }

   public function review()
   {  
           return $this->belongsToMany('Review','sur')->withPivot('user_id');
   }


}
