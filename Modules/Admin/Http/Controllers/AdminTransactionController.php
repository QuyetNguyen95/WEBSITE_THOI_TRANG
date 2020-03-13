<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\Order;
class AdminTransactionController extends Controller
{
   
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
    				$transaction->tr_status = $transaction->tr_status == 0 ? 1 : 0;
    				$transaction->save();
    				return redirect()->back()->with('success','Cập nhật hàng thành công');
    				break;	
    		}
    	}
    }
    public function deleteOrder($key)
    {
        $deleteOrder  = Order::find($key);
        $deleteOrder->delete();
        return redirect()->back()->with('danger','Xóa sản phẩm thành công');
    }
    public function viewOrder(Request $request, $id)
    {
        if ($request->ajax()) {
            $orders = Order::with("product")->where("or_transaction_id",$id)->get();//lay du lieu cua chi tiet don hang
            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);

        }
    }
}
