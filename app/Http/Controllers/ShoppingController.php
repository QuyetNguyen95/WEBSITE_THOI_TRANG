<?php

namespace App\Http\Controllers;
use Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order;
class ShoppingController extends FrontendController
{
    public function __construct()
	{
		parent::__construct();
	}
	//them san pham vao gio hang
	public function addProducts(Request $request,$id)
	{

        //kiểm tra số lướng đặt sản phẩm ở chi tiết giỏ hàng có lớn hơn lượng sản phẩm đã đặt không
        $productCarts = Cart::content();
        foreach($productCarts as $productCart){
            if($productCart->id == $id && $request->qty > 5-$productCart->qty)
            {
                return redirect()->back()->with('warning','Số lượng tối đã được mua là 5 sản phẩm cho mỗi loại');
            }
        }

        //lấy thông tin của sản phẩm qua id
		$product = Product::find($id);
		if (!$product->id) {
			return redirect('/');
        }
        //lấy size sản phẩm qua request
        if ($request->size) {
            $size = $request->size;
        }else{
            $size = 'N/A' ;
        }

        //lấy color sản phẩm qua request
        if ($request->color) {
            $color = $request->color;
        }else{
            $color = 'N/A' ;
        }
        //lấy số lượng sản phẩm từ input so sánh với qty trong database
        if($request->qty <= 5) {
            if($request->qty)
            {
                $qty = $request->qty;
            }else{
                $qty = 1;
            }
            Cart::add([
                'id'      => $product->id,
                'name'    => $product->pro_name,
                'qty'     => $qty,
                'price'   => $product->pro_price*(1-$product->pro_sale/100),
                'options' =>
                 [
                    'sale'      => $product->pro_sale,
                    'avatar'    => $product->pro_avatar,
                    'price_old' => $product->pro_price,
                    'size'      => $size,
                    'color'     => $color

                ]]);
            //mac dinh cua Cart co cac truong id, nam, qty,price va muon them truong khac thi phai dua vao mang options

            return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
        }
        return redirect()->back()->with('warning','Số lượng tối đã được mua là 5 sản phẩm cho mỗi loại');

	}

	//show san pham ra gio hang

	public function showProducts()
	{

		$products = Cart::content();
		return view('shopping.index',compact('products'));
	}

	//thanh toan gio hang


	public function getPay()
	{
		$products = Cart::content();
		return view('shopping.pay',compact('products'));
	}

	//xoa san pham khoi gio hang


	public function delete($rowId)
	{
		if ($rowId) {
			Cart::remove($rowId);
		}

		return redirect()->back()->with('danger','Xóa sản phẩm thành công');
	}

	//phần cập nhật số lượng giỏ hàng
	public function quantity($rowId,$id,Request $request)
	{
        $product = Product::select('pro_number')->find($id);

        if($request->quantity <= 5){

          Cart::update($rowId, $request->quantity);

          return redirect()->back()->with('info','Cập nhật giỏ hàng thành công');
      } else {
           return redirect()->back()->with('warning','Số lượng tối đã được mua là 5 sản phẩm cho mỗi loại');

        }

	}

	//lua don hang va chi tiet don hang vao database

	public function saveTransaction(Request $request)
	{
        dd($request->all());
        $total = Cart::subtotal(0,'','');
        //lưa transaction vào dattabase đồng thời lấy ra id của transaction bằng insertGetId() để dùng cho order
		$idTransaction = Transaction::insertGetId([
			'tr_user_id' => get_data_user('web'),
			'tr_total'   => (int)$total,
			'tr_note'    => $request->note,
			'tr_address' => $request->address,
			'tr_phone'   => $request->phone,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);
            //lưa order vào database
		if ($idTransaction) {
			$products = Cart::content();//lấy danh sách sản phẩm từ giỏ hàng
			foreach ($products as $product) {
				Order::insert([
					'or_transaction_id' => $idTransaction,
					'or_product_id'     =>$product->id,
					'or_qty'            => $product->qty,
					'or_price'          => $product->options->price_old,
                    'or_sale'           => $product->options->sale,
                    'or_color'          => $product->options->color,
                    'or_size'           => $product->options->size,
					'created_at'        => Carbon::now(),
					'updated_at'        => Carbon::now()
				]);
			}
		}

        Cart::destroy();
        //sau khi lưu giỏ hàng thành công thì xóa giỏ hàng
		return redirect()->route('home')->with('alert', 'Mua hàng công, cảm ơn bạn đã mua hàng ở website chúng tôi,vui lòng kiểm tra email của bạn để biết chi tiết đơn hàng!');
	}

}


