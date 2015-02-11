<?php

class Review extends Eloquent
{

  protected $fillable = array('content');

  protected $table = 'reviews';

  public user(){
        return $this->belongsTo('User','user_id');
  }

  public subject(){
       return $this->belongsTo('Subject','subject_id');
  }

  public votes(){
        return $this->hasMany('Vote','review_id');
  }

}
