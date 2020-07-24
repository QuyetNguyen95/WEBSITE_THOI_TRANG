<?php
    namespace App\Services;

    class ProccessViewService
    {
        public static function view($table,$column,$tag,$id)
        {
            //lấy địa chỉ ip của khách hàng. dùng hàm get_client_ip() trong helpers/function.php
            $ipAddress = get_client_ip();

            //lấy time hiện tại
            $timeNow = time();
           // dd($timeNow);
            //một view sẽ được tăng sau 1 giờ
            $throttleTime = 60*60;//3600 phút
            //tạo key cho từng lượt view
            $key = $tag.'_'.md5($ipAddress).'_'.$id;
            //Nếu tồn tại key thì kiểm tra thời gian
            if (\Session::exists($key)) {
                //lấy thời gian lượt view trước
                $timeBefore = \Session::get($key);
                //$request->session()->get($key); <=>  $request->session()->get('product_f528764d624db129b32c21fbca0cb8d6_95');
                //$key = product_f528764d624db129b32c21fbca0cb8d6_95 để đặt tên cho $key
                if ($timeBefore + $throttleTime > $timeNow) {
                    return false;
                }
            }
            \Session::put($key,$timeNow);
            //$request->session()->put('key', 'value'); cú pháp gồm 1 cặp key - value
            \DB::table($table)->where('id',$id)->increment($column);

        }
    }
?>
