<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 18:21
 */

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    public function saveArticle(Request $request){
        $ret=$this->validator($request->all())->validate();
        if(empty($ret)){
            $new = new Article;
            $new->article_name = $request->article_name;
            $new->parent_id = $request->parent_id;
            $new->parent_array = json_encode($request->selectedOptions);
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

    public function articleList(Request $request){
        $articles=Article::all()->toArray();
        $articles_array =array();
        foreach ($articles as $key => $article){
            $articles_array[$article['id']]=$article;
        }
        $selectedOptions=$this->generateTree($articles_array);

        return response()->json([
            'code' => 1,
            'message' => 'success',
            'data'=>$selectedOptions
        ]);
    }

    public function getArticleList(Request $request){
        $articles=Article::all();
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'data'=>$articles
        ]);
    }


    public function articleDel(Request $request){
        $userid = $request->article_id;
        $user=Article::find($userid);
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


    /**
     * @param  [array] $items [需要处理的数组]
     * @return [array]        [多维数组]
     */
    function generateTree($arr,$pid=0,$lev=0){
        $list = array();
        foreach($arr as $v){
            if($v['parent_id']==$pid){
                $selectedOptionsinfo =array();
                $selectedOptionsinfo['value'] = $v['id'];
                $selectedOptionsinfo['label'] = $v['article_name'];
                $selectedOptionsinfo['children'] =$this->generateTree($arr,$v['id'],$lev+1);
                if(empty($selectedOptionsinfo['children'])){
                    unset($selectedOptionsinfo['children']);
                }
                $list[] = $selectedOptionsinfo;
            }
        }
        return $list;
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
            'parent_id' => 'required|int',
            'selectedOptions' => 'required|array',
            'article_name' => 'required|max:255',
        ]);
    }

}