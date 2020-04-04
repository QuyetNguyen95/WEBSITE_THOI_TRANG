<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected  $guarded = [''];

     const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOT_PUBLIC = 1;
    const HOT_PRIVATE = 0;

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

    protected $hot = [
    	1 => [
    		'name'  => 'Nổi bật',
    		'class' => 'btn-info'
    	],

    	0 => [
    		'name'  => 'Không',
    		'class' => 'btn-default'
    	]
    ];
    public function getStatus()
    {
    	return array_get($this->status,$this->a_active);
    }

    public function getHot()
    {
    	return array_get($this->hot,$this->a_hot);
    }
}
