<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestPassword;
use App\Http\Requests\RequestUpdateUser;
use App\Http\Controllers\FrontendController;

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

    public function updateInfo()
    {
        $user = User::find(get_data_user('web'));
        return view('user.updateInfo',compact('user'));
    }

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

    public function updatePass()
    {
        return view('user.updatePass');
    }

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

    public function justWatch()
    {
        return view('user.just_watch');
    }

    public function viewjustWatch(Request $request)
    {
        if($request->ajax())
        {
            $listId = $request->listId;
            $justWatchProducts = Product::whereIn('id',$listId)->limit(4)->get();
            $html = view("user.view_just_watch",compact('justWatchProducts'))->render();
            return response()->json($html);
        }
    }

    public function bestSellingProduct()
    {
        $bestSellProducts = Product::where('pro_pay','>',0)->orderBy('pro_pay','desc')->paginate(10);
        return view('user.best_selling_product',compact('bestSellProducts'));
    }
}
