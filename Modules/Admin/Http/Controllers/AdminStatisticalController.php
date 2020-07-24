<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class AdminStatisticalController extends AdminHeaderController
{
    //thống kê theo ngày
   public function day(){
    $days = DB::table('transactions')
    ->select(DB::raw('Date(created_at) as date'), DB::raw('sum(tr_total) as sumDay'),DB::raw('count(*) as count'))->where('tr_status',1)
    ->groupBy('date')
    ->get();
     return view('admin::statistical.day',compact('days'));
   }

   //thống kê theo tháng
   public function month(){
    $months = DB::table('transactions')
    ->select(DB::raw('MONTH(created_at) as m'), DB::raw('sum(tr_total) as sumMonth'),DB::raw('count(*) as count'))->where('tr_status',1)
    ->groupBy('m')
    ->get();
     return view('admin::statistical.month',compact('months'));
   }
   //thống kê theo năm
   public function year(){
    $years = DB::table('transactions')
    ->select(DB::raw('YEAR(created_at) as y'), DB::raw('sum(tr_total) as sumYear'),DB::raw('count(*) as count'))->where('tr_status',1)
    ->groupBy('y')
    ->get();
     return view('admin::statistical.year',compact('years'));
   }
}
