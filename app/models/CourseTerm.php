<?php

class CourseTerm extends \Eloquent {
	protected $fillable = [];

    protected $table='CourseTerms';

    public function course(){
        return $this->belongsTo('Course','course_id');
    }

    public function term(){
        return $this->belongsTo('Term','term_id');
    }

    public function subjects(){
        return $this->belongsToMany('Subject','CourseTermSubjects','courseterm_id','subject_id');
    }

    public function users(){
        return $this->belongsToMany('User','UserCourseTerm','courseterm_id','user_id');
    }
}
