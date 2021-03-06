<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function employees()
    {
    	return $this->hasMany('App\User');
    }

    public function heads()
    {
    	return $this->belongsToMany('App\User', 'department_heads');
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    public function appraisal_forms()
    {
        return $this->belongsToMany('App\AppraisalForm', 'department_appraisal_forms');
    }
}
