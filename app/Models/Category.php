<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];
    const STATUS_PUBLIC = 1;
    const  STATUS_PRIVATE = 0;
    const HOME_PUBLIC = 1;
    const HOME_PRIVATE = 0;

    protected $status = [
    	1 => [
    		'name'  => 'Public',
    		'class' => 'btn-danger'
    	],

    	0 => [
    		'name'  => 'Private',
    		'class' => 'btn-default'
    	]
    ];

    protected $home = [
    	1 => [
    		'name'  => 'Public',
    		'class' => 'btn-info'
    	],

    	0 => [
    		'name'  => 'Private',
    		'class' => 'btn-default'
    	]
    ];
    public function getStatus()
    {
    	return array_get($this->status,$this->c_active);
    }

    public function getHome()
    {
    	return array_get($this->home,$this->c_home);
    }
}
