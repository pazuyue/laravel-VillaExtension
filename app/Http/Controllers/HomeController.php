<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sum(){
        set_time_limit(3600);
        strtotime(date(""));
        $count=DB::select("select count(*) count from hm_basedata WHERE goods_attr IS NULL");

        while (!empty($count[0]->count)){
            $rows=DB::select("select * from hm_basedata WHERE goods_attr IS NULL LIMIT 10000");
            if(empty($rows)) die;
            foreach ($rows as $key=> $row){
                $color=json_decode($row->color);
                $size= strtr($row->size, array(' '=>''));
                $goods_attr ="{$color->text} {$size}";
                DB::update('update hm_basedata set goods_attr = ? where b_id = ?',[''.$goods_attr.'',$row->b_id]);
            }
            unset($rows);
        }
    }

    public function getDate(){
        $beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));//获取本月开始的时间戳
        $endThismonth=mktime(23,59,59,date('m')+1,1,date('Y'));//获取本月结束的时间戳

        $todayBegin = date("Y-m-d 00:00:00",$beginThismonth);
        $todayEnd = date("Y-m-d 23:59:59",$endThismonth);
        dump($todayBegin);
        dump($todayEnd);

        //dump(date('Y-m-d H:i:s', $beginThismonth));
        //dump(date('Y-m-d H:i:s', $endThismonth));
    }
}
