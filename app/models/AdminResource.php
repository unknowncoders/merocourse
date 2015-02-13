<?php

class AdminResource extends \Eloquent {
	protected $fillable = [];

    protected $table = 'adminResources';

    public subject(){
        return $this->belongsTo('Subject','subject_id');
    }
}
