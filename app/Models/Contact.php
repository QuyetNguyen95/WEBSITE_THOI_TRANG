<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $guarded = [''];

    protected $status = [
    	1 => [
    		'name'  => 'Đã xử lý',
    		'class' => 'btn-success'
    	],

    	0 => [
    		'name'  => 'Chờ xử lý',
    		'class' => 'btn-default'
    	]
    ];

    public function getStatus()
    {
        //trả về giá trị của name và class
    	return array_get($this->status,$this->c_status);
    }

}
