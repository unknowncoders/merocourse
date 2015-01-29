<?php

class Urs extends Eloquent
{

  protected $table = 'urs';
  protected $fillable = array('subject_id','review_id','user_id','status');
  
}
