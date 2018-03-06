<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 18-3-5
 * Time: 下午6:21
 */

namespace App\Http\Controllers\Message;


use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $message = DB::table('message')->get();
        return view('auth.message.messageList');
    }

}