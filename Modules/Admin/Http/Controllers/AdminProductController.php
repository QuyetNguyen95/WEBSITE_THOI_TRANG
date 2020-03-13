<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Product;
use App\Models\Category;
class AdminProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if($request->name) $products = $products->where('pro_name','like','%'.$request->name.'%');
        if($request->category) $products = $products->where('pro_category_id',$request->category);//tim kiem theo pro_category_id(danh muc)
        $products = $products->orderByDesc('id')->paginate(10);
        $categories = $this->getCategories();
        $data = [
            'products'   =>$products,
            'categories' =>$categories,
            'query'      =>$request->query()
        ];
        return view('admin::product.index',$data);
    }
    public function create()
    {
        $categories = $this->getCategories();
    	return view('admin::product.create',compact('categories'));
    }

    public function store(RequestProduct $requestProduct)

    {
        $this->inserOrUpdate($requestProduct);
        return redirect()->back()->with('success','Thêm sản phẩm thành công');
    }

    public function getCategories()
    {
        return Category::all();
    }
    public function edit ($id)

    {
        $product = Product::find($id);
       $categories = $this->getCategories();
        return view('admin::product.update',compact('product','categories'));
    }


    public function update(RequestProduct $requestProduct,$id)
    {
        $this->inserOrUpdate($requestProduct,$id);
        return redirect()->back()->with('info','Cập nhật sản phẩm thành công');
    }

    public function inserOrUpdate(RequestProduct $requestProduct, $id='')
    {
        $product = new Product();


        if ($id)  $product = Product::find($id);

        $product->pro_name            = $requestProduct->pro_name;
        $product->pro_slug            = str_slug($requestProduct->pro_name);
        $product->pro_description     = $requestProduct->pro_description;
        $product->pro_content         = $requestProduct->pro_content;
        $product->pro_category_id     = $requestProduct->pro_category_id;
        $product->pro_price           = $requestProduct->pro_price;
        $product->pro_sale            = $requestProduct->pro_sale;
        $product->pro_number          = $requestProduct->pro_number;
        $product->pro_type            = $requestProduct->pro_type;
        $product->pro_size            = $requestProduct->pro_size;
        $product->pro_color           = $requestProduct->pro_color;
        $product->pro_addInfo         = $requestProduct->pro_addInfo;

        if ($requestProduct->hasFile('avatar')) {
            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $product->pro_avatar = $file['name'];
            }
        }
        if ($requestProduct->hasFile('avatar2')) {
            $file = upload_image('avatar2');
            if (isset($file['name'])) {
                $product->pro_img = $file['name'];
            }
        }
        $product->save();



    }

    public function action($action,$id)
    {
        $product = Product::find($id);
        if ($action) {
            switch ($action) {
                case 'delete':
                    $product->delete();
                    return redirect()->back()->with('danger','Xóa sản phẩm thành công');
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot == 1 ? 0 :1;
                    $product->save();
                    return redirect()->back()->with('success','Cập nhật thành công');
                    break;
                case 'active':
                    $product->pro_active = $product->pro_active == 1 ? 0 :1;
                    $product->save();
                    return redirect()->back()->with('success','Cập nhật thành công');
                    break;
            }
        }

    }



}
