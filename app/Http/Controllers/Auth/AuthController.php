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
use Illuminate\Support\Facades\Hash;
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

    /**用户修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

    /**用户添加头像
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userFile(Request $request){
        $this->cors();


        if (!$request->hasFile('file')) {
            return response()->json([], 500, '无法获取上传文件');
        }
        $file = $request->file('file');
        if ($file->isValid()) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg

            // 上传文件
            $filename = $request->fileNmae;
            // 使用我们新建的uploads本地存储空间（目录）
           // $path = $file->store($filename, 'uploads');
            $path = $file->storeAs('userPhoto', $filename.'.jpg');
            return response()->json([

                'code' => 1,
                'message' => 'success',
                'photo' => $path,
                'name' => $originalName,
            ]);

        } else {
            return response()->json([], 500, '文件未通过验证');
        }
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
        header("Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers:Origin, Content-Type, X-Auth-Token");

    }

    public function userAdd(Request $request){
        $this->cors();
        $ret=$this->validator($request->all())->validate();

        if(empty($ret)){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'portrait' => $request->desc,
                'imageUrl' => $request->imageUrl,
            ]);
            return response()->json([

                'code' => 1,
                'message' => 'success',
                'data'=>""
            ]);
        }
    }

}