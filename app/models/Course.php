<?php

class Course extends \Eloquent {

	protected $fillable = [];

    protected $table = 'courses';

    public function terms(){
        return $this->belongsToMany('Term','CourseTerms');
    }

    //to display the reviews of the course

    public function coursereviews()
    {

           return $this->hasMany('Coursereview','course_id');
    }


    public function users(){
        return $this->belongsToMany('User','UserCourse','course_id','user_id');
    }

    public function durationToStr(){
        $str=" ";

        $month = $this->duration % 12;
        $year = $this->duration / 12;

        if($year !=0){ $str = $year." Years "; }
        if($month !=0) $str = $month." Months ";

        return $str;

    }
   
}
