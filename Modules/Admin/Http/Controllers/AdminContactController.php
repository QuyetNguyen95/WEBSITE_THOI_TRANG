<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Contact;
class AdminContactController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {

        $contacts = Contact::whereraw(1)->paginate(10);
        return view('admin::contact.index',compact('contacts'));
    }

    public function action($action,$id)
    {
        $contact = Contact::find($id);
        if ($action) {
            switch ($action) {
                case 'delete':
                    $contact->delete();
                    return redirect()->back()->with('danger','Xóa liên hệ thành công');
                    break;
                case 'active':
                    $contact->c_status = $contact->c_status == 1 ? 0 :1;
                    $contact->save();
                    return redirect()->back()->with('success','Cập nhật thành công');
                    break;
            }
        }
    }
}
