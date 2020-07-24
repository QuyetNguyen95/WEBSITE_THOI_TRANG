<?php

namespace App\Models;

use App\User;
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
    		'name'  => 'Hiển thị',
    		'class' => 'btn-danger'
    	],

    	0 => [
    		'name'  => 'Không',
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
    	return array_get($this->status,$this->pro_active);// lấy dữ liệu của mảng bởi key
    }

    public function getHot()
    {
    	return array_get($this->hot,$this->pro_hot);
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
        //một sản phẩm thuộc một danh mục
    }
    public function favourite()
    {
        return $this->belongsToMany(User::class,'user_favourite','uf_product_id','uf_user_id');
        //một user có thể yêu thích nhiều sản phẩm thông qua bảng trung gian user_favourite
    }

    public function viewed()
    {
        return $this->belongsToMany(User::class,'viewed_product','vp_product_id','vp_user_id');
        //một user có thể xem nhiều sản phẩm thông qua bảng trung gian viewed_product
    }

    public function buyafter()
    {
        return $this->belongsToMany(User::class,'buy_after','ba_product_id','ba_user_id');
        //một user có thể mua sau nhiều sản phẩm thông qua bảng trung gian buy_after
    }
}
