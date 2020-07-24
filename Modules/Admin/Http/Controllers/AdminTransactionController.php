<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\TransactionExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Http\Controllers\AdminHeaderController;

class AdminTransactionController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index(Request $request)
    {
        $transactions = Transaction::with('user:id,name')->whereraw(1);
        if($request->status)
        {
           $transactions = $transactions->where('tr_status',$request->status-1);
        }
        $transactions = $transactions->orderBy('id','desc')->paginate(5);
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
        $order  = Order::find($id);
        //xóa order thì phải giảm số tiền tương ứng trong transaction
        $money = $order->or_qty*($order->or_price - ($order->or_sale/100)*$order->or_price);
        DB::table('transactions')->where('id',$order->or_transaction_id)->decrement('tr_total',$money);
        $order->delete();
        return redirect()->back()->with('danger','Xóa sản phẩm thành công');
    }
    public function viewOrder(Request $request, $id)
    {
        $totalTransaction = Transaction::select('tr_total')->
        $orders = Order::with("product")->where("or_transaction_id",$id)->get();//lay du lieu cua chi tiet don hang
        return  view('admin::components.order',compact('orders','totalTransaction'));
    }

 // Xuất đơn hàng ra dạng pdf
    public function pdfview(Request $request,$id)
    {
       //lấy thông tin khách hàng
       $transaction = Transaction::with('user:id,name')->find($id);
       //lấy thông tin đơn hàng
       $orders = Order::where('or_transaction_id',$id)->paginate(10);
       $data =
       [
            'orders'       => $orders,
            'transaction' => $transaction
       ];
      $pdf = PDF::loadView('admin::transaction.export_pdf',$data);
      return $pdf->download('nguyencuongquyet_admin.pdf');
      //return view('admin::transaction.export_pdf',$data);
    }

    //xuất file excel đơn hàng
    public function export()
    {
        return Excel::download(new TransactionExport(), 'nguyencuongquyet.xlsx');
    }
}
