<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminHeaderController extends Controller
{

    public function __construct()
    {
         //lấy liên lạc mới nhất
         $newContacts = Contact::where('c_status',0)->get();
         //đếm sô liên lạc chưa được xử lý
         $countContact = Contact::where('c_status',0)->count();

         $data = [
             'newContacts'  => $newContacts,
             'countContact' => $countContact
         ];

         view()->share('data', $data);
    }

}
