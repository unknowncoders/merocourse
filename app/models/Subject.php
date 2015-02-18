<?php

class Subject extends Eloquent
{
   protected $fillable = array('subject_name');

   protected $table ='subjects';

   public function courseterms()
    {
          return $this->belongsToMany('CourseTerm','CourseTermSubjects','subject_id','courseterm_id');
    }

   public function reviews()
   {  
           return $this->hasMany('Review','subject_id');
   }

   public function interestRatings()
   {
           return $this->hasMany('InterestRating','subject_id');
   }

   public function difficultyRatings()
   {
           return $this->hasMany('DifficultyRating','subject_id');
   }

   public function userResources()
   {
           return $this->hasMany('UserResource','subject_id');
   }

   public function adminResources()
   {
           return $this->hasMany('AdminResource','subject_id');
   }

   
}
