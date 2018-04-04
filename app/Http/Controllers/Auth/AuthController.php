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
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function index()
    {
        $user=Auth::user();

        if (empty($user->portrait)){
            $user->portrait_img="";
        }else{
            $user->portrait_img=json_decode($user->portrait)->store_name;
        }

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

    /**用户列表
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function userList(){
        $this->cors();
        $users=User::all();
        return $users;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * 解决跨域
     */
    public function cors(){
        header('Access-Control-Allow-Origin:*');//允许所有来源访问
        header("Access-Control-Allow-Methods:POST");
        header("Access-Control-Allow-Headers:x-requested-with,content-type");
    }

    public function userAdd(Request $request){
        $this->cors();
        $ret=$this->validator($request->all())->validate();
        var_dump($ret);
    }

}