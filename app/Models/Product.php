<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOT_PUBLIC = 1;
    const HOT_PRIVATE = 0;

    protected $status = [
    	1 => [
    		'name'  => 'Public',
    		'class' => 'label-danger'
    	],

    	0 => [
    		'name'  => 'Private',
    		'class' => 'label-default'
    	]
    ];

    protected $hot = [
    	1 => [
    		'name'  => 'Nổi bật',
    		'class' => 'label-info'
    	],

    	0 => [
    		'name'  => 'Không',
    		'class' => 'label-default'
    	]
    ];
    public function getStatus()
    {
    	return array_get($this->status,$this->pro_active);
    }

    public function getHot()
    {
    	return array_get($this->hot,$this->pro_hot);
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }
}
