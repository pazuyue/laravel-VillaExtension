<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 12:17
 */

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FileController extends Controller
{

    /**用户上传文件
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function pustFile(Request $request){

        if (!$request->hasFile('file')) {
            return response()->json([], 500, '无法获取上传文件');
        }
        $file = $request->file('file');

        if ($file->isValid()) {
            // 获取文件相关信息
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $originalName = $file->getClientOriginalName(); // 文件原名

            // 上传文件
            $filename = $originalName;

            $file->storeAs('public', $filename);
            $path ='storage/'.$filename;
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

}

