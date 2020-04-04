<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
    	$transactions = Transaction::with('user:id,name')->paginate(5);
        return view('admin::transaction.index',compact('transactions'));
    }

    public function action($action, $id)
    {

    	$transaction = Transaction::find($id);
    	if ($action) {
    		switch ($action) {
    			case 'delete':
    				$transaction->delete();
    				return redirect()->back()->with('danger','Xóa đơn hàng thành công');
    				break;
    			case 'status':
                    $orders = Order::where('or_transaction_id',$id)->get();
                    foreach ($orders as $order) {
                        $products = Product::where('id',$order->or_product_id)->get();
                        foreach ($products as  $product) {
                            //kiểm tra nếu có hai người cùng  mua 1 sản phẩm, nếu xử lý người thứ 1 đã hết hàng
                            //thì người thứ hai sẽ không được xử lý đơn hàng(tránh pro_number âm)
                            if($product->pro_number - $order->or_qty < 0)
                            {
                                $nameProduct = $product->pro_name;
                                return redirect()->back()->with('danger','Sản phẩm  '.$nameProduct.' đã hết!');
                            }
                             //trừ đi số lượng sản phẩm (pro_number) của sản phẩm
                            $product->pro_number -= $order->or_qty;
                            //Tăng số điểm cho sản phẩm lên 1 mỗi lần mua
                            $product->pro_pay++;
                            $product->save();
                        }
                    }
                    //update điểm của thành viên khi mua sản phẩm
                    DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
                    $transaction->tr_status = 1;
    				$transaction->save();
    				return redirect()->back()->with('success','Cập nhật hàng thành công');
    				break;
    		}
    	}
    }
    public function deleteOrder($id)
    {
        $deleteOrder  = Order::find($id);
        $deleteOrder->delete();
        return redirect()->back()->with('danger','Xóa sản phẩm thành công');
    }
    public function viewOrder(Request $request, $id)
    {
        $orders = Order::with("product")->where("or_transaction_id",$id)->get();//lay du lieu cua chi tiet don hang
        return  view('admin::components.order',compact('orders'));
    }
}
