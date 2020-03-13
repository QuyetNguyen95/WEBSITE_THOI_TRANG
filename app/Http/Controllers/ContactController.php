<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\RequestContact;
class ContactController extends FrontendController
{

	public function __construct()
	{
		parent::__construct();
	}

	
    public function index()
    {
    	return view('contact.index');
    }

    public function postContact(RequestContact $request)
    {

    	// dung phuong phap Mass Assignment
    	$data =$request->except('_token');
    	$data['updated_at'] = $data['created_at'] = Carbon::now();
    	Contact::insert($data);
    	return redirect()->back()->with('success','Gửi thông tin thành công');
    }
}
