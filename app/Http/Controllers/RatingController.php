<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use  App\Models\Rating;
use App\Models\ReplyComment;

class RatingController extends Controller
{
    public function saveRating(Request $request, $id)
    {
        if ($request->ajax()) {
            Rating::insert([
                'ra_product_id' => $id,
                'ra_number'     => $request->ra_number,
                'ra_content'    => $request->ra_content,
                'ra_user_id'    => get_data_user('web'),
                'created_at'    =>Carbon::now(),
                'updated_at'    =>Carbon::now()
            ]);
            $product = Product::find($id);
            $product->pro_total_number += $request->ra_number;
            $product->pro_total_rating += 1;
            $product->save();
        }
        return response()->json(['code' => 1]);
    }
   //hàm lưu các reply comment
    public function saveReplyComment(Request $request,$id)
    {
        //gửi trả lời comment
        if ($request->ajax()) {
            ReplyComment::insert([
                're_rating_id' => $id,
                're_comment'    => $request->re_comment,
                're_user_id'    => get_data_user('web'),
                'created_at'    =>Carbon::now(),
                'updated_at'    =>Carbon::now()
            ]);
        }
        return response()->json(['code' => 1]);
    }

}
