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



    /**用户修改数据显示
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userEditShow(Request $request){

        $userid = $request->userid;
        $user=User::find($userid);
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'data'=>$user
        ]);
    }

    public function userEdit(Request $request){

    }

    /**用户添加头像
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userFile(Request $request){

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
            $filename = $request->fileNmae.".".$ext;
            // 使用我们新建的uploads本地存储空间（目录）
           // $path = $file->store($filename, 'uploads');
            $path = $file->storeAs('userPhoto', $filename);
            return response()->json([
                'code' => 1,
                'message' => 'success',
                'photo' => $path,
                'name' => $filename,
            ]);

        } else {
            return response()->json([], 500, '文件未通过验证');
        }
    }

    /**用户列表
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function userList(){

        $users=User::all();
        return $users;
    }



    /**用户添加
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userAdd(Request $request){

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

    public function userDel(Request $request){

        $userid = $request->userid;
        $user=User::find($userid);
        $user->delete();
        if($user->trashed()){

            return response()->json([
                'code' => 1,
                'message' => 'success',
                'data'=>"冻结成功"
            ]);
        }else{
            return response()->json([
                'code' => 1,
                'message' => 'false',
                'data'=>"冻结失败"
            ]);
        }
    }

}