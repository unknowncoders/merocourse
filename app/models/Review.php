<?php

class Review extends Eloquent
{

  protected $fillable = array('content');

  protected $table = 'reviews';

  public function user(){
        return $this->belongsTo('User','user_id');
  }

  public function subject(){
       return $this->belongsTo('Subject','subject_id');
  }

  public function votes(){
        return $this->hasMany('Vote','review_id');
  }

}
