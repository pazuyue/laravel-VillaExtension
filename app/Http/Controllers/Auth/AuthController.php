<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 18-2-24
 * Time: 下午5:40
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function index()
    {
        $user=Auth::user();
        $user->portrait_img=json_decode($user->portrait)->store_name;
        return view('auth.userinfo',compact('user'));
    }

    /**
     *
     */
    public function userinfoEdit(Request $request){

        $userid = $request->userid;

        if ($request->hasFile('portrait') && $request->file('portrait')->isValid()) {
            $photo = $request->file('portrait');
            $extension = $photo->extension();

            $store_result = $photo->storeAs('public', $userid.'.jpg');
            $output = [
                'extension' => $extension,
                'store_result' => $store_result,
                'store_name' => $userid.'.jpg'
            ];

            $user=User::findOrFail($userid);
            $user->portrait = json_encode($output);
            $user->save();

            return $this->index();
        }
        exit('未获取到上传文件或上传过程出错');

    }

}