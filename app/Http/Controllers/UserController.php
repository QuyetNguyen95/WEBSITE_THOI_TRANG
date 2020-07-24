<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestPassword;
use App\Http\Requests\RequestUpdateUser;
use App\Http\Controllers\FrontendController;
use Cart;
class UserController extends FrontendController
{
    public function __construct()
	{
		parent::__construct();
    }

    public function index()
    {
        //số đơn hàng của khách hàng
        $countTransaction = Transaction::where('tr_user_id',get_data_user('web'))->count();

        //số đánh giá của khách hàng
        $countRating = Rating::where('ra_user_id',get_data_user('web'))->count();

        //số điểm tích lủy của khách hàng
        $countUser = User::where('id',get_data_user('web'))->value('total_pay');

        //số sản phẩm đã mua
        //lấy dánh sách id transaction đã được xử lý
        $listTransaction = Transaction::where([
            'tr_user_id' => get_data_user('web'),
            'tr_status'  => 1
        ])->pluck('id');

        //lấy id sản phẩm đã mua
        $countProduct = Order::whereIn('or_transaction_id',$listTransaction)->count();

        $transactions = Transaction::where('tr_user_id',get_data_user('web'))->paginate(10);
        $data = [
            'countTransaction' => $countTransaction,
            'countRating'      => $countRating,
            'countUser'        => $countUser,
            'countProduct'     => $countProduct,
            'transactions'     => $transactions
        ];
        return view('user.index',$data);
    }
    //hiển thị cập nhật thông tin
    public function updateInfo()
    {
        $user = User::find(get_data_user('web'));
        return view('user.updateInfo',compact('user'));
    }
    //lưu thông tin cập nhật
    public function saveInfo(RequestUpdateUser $requestUpdateUser)
    {
        $user = User::find(get_data_user('web'));
        $user->name = $requestUpdateUser->name;
        $user->email = $requestUpdateUser->email;
        $user->phone = $requestUpdateUser->phone;
        $user->address = $requestUpdateUser->address;
        $user->note = $requestUpdateUser->note;

        if ($requestUpdateUser->hasFile('avatar')) {
            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $user->avatar = $file['name'];
            }
        }
        $user->save();
        return redirect()->back()->with('alert','Cập nhật thành công!!');
    }
    //hiển thị trang thay đổi mật khẩu
    public function updatePass()
    {
        return view('user.updatePass');
    }
    //lưu mật khẩu đã đổi
    public function savePass(RequestPassword $requestPassword)
    {
        if (Hash::check($requestPassword->old_password, Auth::user()->password))
        {
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($requestPassword->new_password);
            $user->save();
            return redirect()->route('get.login')->with('alert','Cập nhật mật khẩu thành công, xin mời đăng nhập lại!!');
        }else
        {
            return redirect()->back()->with('alert','Mật khẩu củ không đúng, xin mời nhập lại!!');
        }
    }




    // hiển thị các sản phẩm bán chạy
    public function bestSellingProduct()
    {
        $bestSellProducts = Product::where('pro_pay','>',0)->orderBy('pro_pay','desc')->paginate(10);
        return view('user.best_selling_product',compact('bestSellProducts'));
    }

    //hiển thị chi tiết đơn hàng
    public function showDetailOrder($id)
    {
        $orders = Order::where('or_transaction_id',$id)->paginate(10);
        return view('user.show_detail_order',compact('orders'));
    }

    //xuất đơn hàng ra dạng pdf
    public function pdfview(Request $request,$id)
    {
       $orders = Order::where('or_transaction_id',$id)->paginate(10);
       $data =
       [
            'orders' => $orders
       ];
      $pdf = PDF::loadView('user.export_pdf',$data);
      return $pdf->download('nguyencuongquyet.pdf');
    }

     //thêm sản phẩm yêu thích

     public function addFavourite(Request $request,$id)
     {
         if ($request->ajax()) {
             //kiểm tra có tồn tại sản phẩm hay không
             $product = Product::find($id);
             if(!$product) return response(['messages' => 'Không tồn tại sản phẩm']);
             //unique(uf_product_id,uf_product_id) nên khi thêm trùng hai giá trị uf_product_id,uf_user_id sẽ
             //xãy ra exception
             try {
                 \DB::table('user_favourite')->insert([
                     'uf_product_id' => $id,
                     'uf_user_id'    => Auth::user()->id,
                     'created_at'    => Carbon::now(),
                     'updated_at'    => Carbon::now()
                 ]);
                 $messages = "Thêm yêu thích thành công";
             } catch (\Exception $e) {
                $messages = "Sản phẩm này đã được yêu thích";
             }
             return response(['messages' => $messages]);
         }
     }

     //show sản phẩm yêu thích
     public function showFavouriteProduct()
     {
         $userId = Auth::user()->id;
         $products =Product::whereHas('favourite', function ($query) use ($userId) {
            $query->where('uf_user_id',$userId);
        })->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_total_rating','pro_total_number','pro_view','pro_price')->paginate(10);
        return view('user.show_favourite_pro',compact('products'));
     }

     //show sản phẩm vừa xem
     public function viewjustWatch()
    {
        $userId = Auth::user()->id;
         $products =Product::whereHas('viewed', function ($query) use ($userId) {
            $query->where('vp_user_id',$userId);
        })->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_total_rating','pro_total_number','pro_view','pro_price')->paginate(10);
        return view('user.just_watch',compact('products'));
    }

    //show sản phẩm mua sau
    public function buyBeforeProduct()
    {
        $userId = Auth::user()->id;
         $products =Product::whereHas('buyafter', function ($query) use ($userId) {
            $query->where('ba_user_id',$userId);
        })->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_total_rating','pro_total_number','pro_view','pro_price')->paginate(10);
        return view('user.buy_before_product',compact('products'));
    }
    //xóa sản phẩm yêu thích
    public function deleteFavouriteProduct($idPro)
    {
        $idUser = Auth::user()->id;
        DB::table('user_favourite')
        ->whereRaw("uf_user_id= $idUser and uf_product_id = $idPro")
        ->delete();
        return redirect()->back()->with('danger','Bỏ thích thành công');
    }
    //xóa sản phẩm mua sau
    public function deleteBuyBeforeProduct($idPro)
    {
        $idUser = Auth::user()->id;
        DB::table('buy_after')
        ->whereRaw("ba_user_id= $idUser and ba_product_id = $idPro")
        ->delete();
        return redirect()->back()->with('danger','Bỏ đã xem thành công');
    }

    //them san pham vao gio hang
	public function addProducts(Request $request,$id)
	{
        //kiểm tra số lướng đặt sản phẩm ở chi tiết giỏ hàng có lớn hơn lượng sản phẩm đã đặt không
        //lấy id của sản phẩm
        $product = Product::find($id);
        //lấy thông tin của giỏ hàng
        $productCarts = Cart::content();


        foreach($productCarts as $productCart){
           if($productCart->id == $id)//kiểm tra id sản phẩm đúng sản phẩm cần kiểm kiểm tra
           {
            //kiểm tra số lượng sản phẩm so với kho hàng
            if($request->qty > $product->pro_number - $productCart->qty)
            {
                return redirect()->back()->with('warning','Số lượng vượt quá số lượng trong kho ');
            }
            //kiểm tra số lượng sản phẩm so với yêu cầu
            if($request->qty > 5-$productCart->qty)
            {
                return redirect()->back()->with('warning','Số lượng tối đã được mua là 5 sản phẩm cho mỗi loại');
            }
           }
        }
        //lấy thông tin của sản phẩm qua id
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

            if ($product->pro_number>=$request->qty) {
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
                    'color'     => $color,
                    'slug'      => $product->pro_slug,
                    'number'    => $product->pro_number

                ]]);
            //mac dinh cua Cart co cac truong id, nam, qty,price va muon them truong khac thi phai dua vao mang options

            return redirect()->route('show.products.shopping')->with('success', 'Thêm vào giỏ hàng thành công!');
            }
            return redirect()->back()->with('warning','Số lượng vượt quá số lượng trong kho');
        }
        return redirect()->back()->with('warning','Số lượng tối đã được mua là 5 sản phẩm cho mỗi loại');

    }

    //show sản phẩm đã mua
    public function boughtProduct()
    {
        //lấy mảng id transaction mà khách hàng đã mua
       $getIdTransactionOfUser = Transaction::where([
           'tr_user_id' => Auth::user()->id,
           'tr_status'  => 1
       ])->get(['id'])->toArray();
       //muốn foreach được phải chuyển object thành mảng qua toArray()
       $getListProduct = [];
       foreach($getIdTransactionOfUser as $idTran)
       {
        //lấy mảng  id các sản phẩm có trong đơn hàng của khách hàng
        $getListProduct = Order::where('or_transaction_id',$idTran)->get(['or_product_id'])->toArray();
       }

        //lấy thông tin các sản phẩm dựa vào mảng id sản phẩm trên
        $products = Product::whereIn('id',$getListProduct)->orderBy('id','desc')->paginate(10);
       return view('user.bought_product',compact('products'));
    }

    //show đánh giá
    public function showRating()
    {
        $ratings = Rating::with('product:id,pro_name,pro_avatar,pro_slug')
        ->where('ra_user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.show_rating',compact('ratings'));
    }
}
