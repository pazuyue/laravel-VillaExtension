<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 18-3-5
 * Time: 下午6:21
 */

namespace App\Http\Controllers\Message;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $message_rows = DB::table('message')
            ->join('users', 'message.user_id', '=', 'users.id')
            ->select('users.portrait','users.name','message.*')
            ->where([['parent_id', '=', '0']])
            ->orderBy('created_at','desc')
            ->paginate(15);

        foreach ($message_rows->items() as &$value){
            if(!empty($value->id)){
                $this->getChildMessage($value,$value->id);
            }
        }

        return view('auth.message.messageList',compact('message_rows'));
    }

    public function getChildMessage(&$value,$parent_id){
        $rows = DB::table('message')
            ->join('users', 'message.user_id', '=', 'users.id')
            ->select('users.portrait','users.name','message.*')
            ->where('parent_id', '=', $parent_id)
            ->get();

        if(!empty($rows[0])){
            $value->child_team=$rows;
            foreach ($rows as $row){
                $this->getChildMessage($row,$row->id);
            }
        }
    }

}