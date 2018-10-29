<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 18-3-5
 * Time: 下午6:21
 */

namespace App\Http\Controllers\News;


use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NewController extends Controller
{

    /**保存新闻
     * @param Request $request
     */
    public function saveNew(Request $request){
        $ret=$this->validator($request->all())->validate();
        if(empty($ret)){
            $new = new News;
            $new->title = $request->title;
            $new->article_id = json_encode($request->article_id);
            $new->imageUrl = $request->imageUrl;
            $new->content = $request->content_info;
            $new->user_id =1; //测试默认为1
            if($new->save()){
                return response()->json([
                    'code' => 1,
                    'message' => 'success',
                    'data'=>""
                ]);
            }else{
                return response()->json([
                    'code' => 0,
                    'message' => 'fail',
                    'data'=>""
                ]);
            }
        }
    }

    /**咨询列表
     * @param Request $request
     */
    public function newList(Request $request){
        $news=News::paginate();
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'data'=>$news
        ]);
    }

    /**删除商品
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newDel(Request $request){
        $id = $request->new_id;
        $flight = News::find($id);
        if($flight->delete()){
            return response()->json([
                'code' => 1,
                'message' => 'success',
                'data'=>""
            ]);
        }else{
            return response()->json([
                'code' => 0,
                'message' => 'falid',
                'data'=>""
            ]);
        }
    }

    /**资讯修改显示
     * @param Request $request
     */
    public function newEditShow(Request $request){
        $new_id = $request->new_id;
        $new=News::find($new_id);
        if(!empty($new->article_id)){
            $new->article_id= json_decode($new->article_id);
        }

        return response()->json([
            'code' => 1,
            'message' => 'success',
            'data'=>$new
        ]);
    }

    /**修改资讯
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newEdit(Request $request){
        $new_id = $request->new_id;
        $new=News::find($new_id);
        $new->title=$request->title;
        $new->article_id=json_encode($request->article_id);
        $new->imageUrl=$request->imageUrl;
        $new->content=$request->content_info;
        if($new->save()){
            return response()->json([
                'code' => 1,
                'message' => 'success',
                'data'=>"修改成功"
            ]);
        }else{
            return response()->json([
                'code' => 1,
                'message' => 'success',
                'data'=>"修改失败"
            ]);
        }
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
            'title' => 'required|string|max:255',
            'article_id' => 'required|array',
            'content_info' => 'required',
        ]);
    }

}