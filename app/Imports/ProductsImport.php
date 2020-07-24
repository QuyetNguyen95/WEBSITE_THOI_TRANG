<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductsImport implements ToModel, WithHeadingRow
{
    public function headingRow() : int
    {
        return 1;
    }
 //import danh sách sản phẩm từ một file excel
    public function model(array $row)
    {
        return new Product([
            'pro_name' => $row['ten_san_pham'],
            'pro_slug' => str_slug($row['ten_san_pham']),
            'pro_price'=> $row['gia_san_pham'],
            'pro_sale' => $row['giam_gia'],
            'pro_description' => $row['mo_ta'],
            'pro_category_id' =>$row['danh_muc'],
            'pro_number'=> $row['so_luong'],
            'pro_color' => $row['mau_san_pham'],
            'pro_size'  => $row['size'],
            'pro_type'  => $row['loai_san_pham'],
            'pro_avatar' => $row['anh_1'],
            'pro_img'   => $row['anh_2']
        ]);
    }
}
