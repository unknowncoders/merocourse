<?php

class Faculty extends Eloquent
{
   protected $table ='faculty';
   protected $fillable = array('faculty_name');
 

   public function semester()
   {
        return $this->belongsToMany('Semester','fss','faculty_id','semester_id')->withPivot('subject_id');

   }
  

   public function subject()
   {
        return $this->belongsToMany('Subject','fss','faculty_id','subject_id')->withPivot('semester_id');
   }



}
