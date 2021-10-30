<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Model\Article\Article;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Sabberworm\CSS\Value\URL;

class ArticleController extends Controller
{


    public function index(){
        $results = Article::with('CreatedBy')->orderBy('article_id','DESC')->get();
        return view('admin.article.index',['results' => $results]);
    }



    public function create(){
        return view('admin.article.form');
    }



    public function store(ArticleRequest $request) {

		$file 	= $request->file('attach_file');
        $input  = $request->all();
        $input['created_by'] = Auth::user()->user_id;
        $input['updated_by'] = Auth::user()->user_id;
        $input['publish_date'] = dateConvertFormtoDB($request->publish_date);

        if($file){
            $fileName = md5(str_random(30).time().'_'.$request->file('attach_file')).'.'.$request->file('attach_file')->getClientOriginalExtension();
            $request->file('attach_file')->move('uploads/notice/',$fileName);
            $input['attach_file'] = $fileName;
        }

        try{
            Article::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect('article')->with('success', 'Article Successfully saved.');
        }else {
            return redirect('article')->with('error', 'Something Error Found !, Please try again.');
        }
    }



    public function edit($id){
        $editModeData = Article::with('createdBy')->where('article_id',$id)->first();
        return view('admin.article.index',compact('editModeData'));
    }



    public function show($id){
        $editModeData = Article::FindOrFail($id);
        return view('admin.article.form',compact('editModeData'));
    }



    public function update(ArticleRequest $request,$id) {

		$file = $request->file('attach_file');
        $data = Article::FindOrFail($id);
        $input = $request->all();
        $input['created_by'] = Auth::user()->user_id;
        $input['updated_by'] = Auth::user()->user_id;
        $input['publish_date'] = dateConvertFormtoDB($request->publish_date);


        if($file){
            $fileName = md5(str_random(30).time().'_'.$request->file('attach_file')).'.'.$request->file('attach_file')->getClientOriginalExtension();
            $request->file('attach_file')->move('uploads/notice/',$fileName);
            if(file_exists('uploads/notice/'.$data->attach_file) AND !empty($data->attach_file)){
                unlink('uploads/notice/'.$data->attach_file);
            }
            $input['attach_file'] = $fileName;
        }

        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            return redirect()->back()->with('success', 'Article Successfully Updated.');
        }else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }



    public function destroy($id){
        try{
            $data = Article::FindOrFail($id);
            if (!is_null($data->attach_file))
            {
                if(file_exists('uploads/notice/'.$data->attach_file) AND !empty($data->attach_file))
                {
                    unlink('uploads/notice/'.$data->attach_file);
                }
            }
            $data->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            echo "success";
        }elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }


    public function APIArticles(Request $request)
    {
        $block_one = function ($params) {

            $articles = Article::where('status', 'Published')->get();
            $status = false;
            $message = "";

            $data = [];
            if (!$articles->isEmpty()) {
                $base_url = url('')."/uploads/notice/";
                foreach ($articles as $key => $article) {
                    $object = (object) [
                        'id' => $article->article_id,
                        'user_id' => 2,
                        'title' => $article->title,
                        'body' => $article->description,
                        'image' => $base_url.$article->attach_file,
                        'created_at' => $article->created_at->toDateString(),
                        'updated_at' => $article->updated_at->toDateString()
                    ];
                    array_push($data, $object);
                }

                $status = true;
                $message = "OK";
            } else {
                $status = false;
                $message = "There are no published articles";
            }

            return ['success' => $status, 'data' => $data, 'message' => $message];
        };

        $response = executeRestrictedAccess($block_one, "auth", ['request' => $request]);
        return response()->json($response);
    }
}
