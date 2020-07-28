<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class AdminStatisticalController extends AdminHeaderController
{
    //thống kê theo ngày
   public function day(Request $request){
    $days = DB::table('transactions')->select( DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as date"), DB::raw('sum(tr_total) as sumDay'),DB::raw('count(*) as count'))->where('tr_status',1)
    ->groupBy('date');
       //tìm kiếm theo ngày/tháng/năm
       $day   = str_pad($request->day, 2, '0', STR_PAD_LEFT);
       $month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
       $year  = $request->year;

    if($day && $month && $year)
    {
        $days = $days->where(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"),"$day-$month-$year");
    }

    $days = $days->get();
     return view('admin::statistical.day',compact('days'));
   }

   //thống kê theo tháng
   public function month(Request $request){

    $months = DB::table('transactions')
    ->select( DB::raw("DATE_FORMAT(created_at, '%m-%Y') as m"), DB::raw('sum(tr_total) as sumMonth'),DB::raw('count(*) as count'))->where('tr_status',1)
    ->groupBy('m');
      // Tìm kiếm theo tháng/năm
      $month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
      $year  = $request->year;
      if($month && $year)
      {
          $months = $months->where(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"),"$month-$year");
      }
    $months = $months->get();
     return view('admin::statistical.month',compact('months'));
   }
   //thống kê theo năm
   public function year(Request $request){
    $years = DB::table('transactions')
    ->select(DB::raw('YEAR(created_at) as y'), DB::raw('sum(tr_total) as sumYear'),DB::raw('count(*) as count'))->where('tr_status',1)
    ->groupBy('y');
    //tìm kiếm theo năm
    $year  = $request->year;
    if($year)
      {
          $years = $years->where(DB::raw('YEAR(created_at)'),"$year");
      }
    $years = $years->get();
     return view('admin::statistical.year',compact('years'));
   }
}
