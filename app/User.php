<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_number', 'last_name', 'first_name', 'middle_name', 'suffix', 'email', 'password', 'account_id', 'immediate_supervisor_id', 'department_head_id', 'super_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function immediate_supervisor()
    {
        return $this->belongsTo('App\User', 'immediate_supervisor_id');
    }

    public function subordinates()
    {
        return $this->hasMany('App\User', 'immediate_supervisor_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function head_of()
    {
        return $this->hasOne('App\DepartmentHead');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_roles');
    }
}
