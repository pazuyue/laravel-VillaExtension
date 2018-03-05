<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 18-3-5
 * Time: 下午6:21
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index(){
        dump(123);

        return view('auth.message.messageList');
    }

}