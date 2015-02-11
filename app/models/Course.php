<?php

class Course extends \Eloquent {

	protected $fillable = [];

    protected $table = 'courses';

    public function terms(){
        return $this->belongsToMany('Term','CourseTerms');
    }


    public function users(){
        return $this->belongsToMany('User','UserCourse');
    }
   
}
