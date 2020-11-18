<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Http\Requests\Backend\ArticleRequest;
use Alert;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(25);
        return view('admin.article.index', compact('articles'));
    }
    
    public function create()
    {	
        return view('admin.article.create');
    }
    
    public function store(ArticleRequest $request)
    {
      	$data = $request->all();
        if ($request->hasFile('image_media')) {
            $media = saveSingleMedia($request, 'image');
            if (TRUE != $media['status']) {
                Alert::error('Error', 'Image Not Found');
                return redirect(route('article.index'));
            }
            $data['media_id'] = $media['media_id'];
        }
        Article::create($data);
        Alert::success('Success', 'Successfully Created Article');
        return redirect(route('article.index'));
    }
    
    public function edit($id)
    {
        $article = Article::find($id);   
        if(empty($article)) {
            Alert::error('Error', 'Article Not Found');
            return redirect(route('article.index'));
        }
        return view('admin.article.edit',compact('article'));        
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $article = Article::find($id);
        if(empty($article)) {
            Alert::error('Error', 'Article Not Found');
            return redirect(route('article.index'));
        }
        // if ($request->hasFile('image_media')) {
        //     $media = saveSingleMedia($request, 'image');
        //     if (TRUE != $media['status']) {
        //         Flash::error($media['message']);
        //         return redirect(route('lawyer.index'));
        //     }
        //     $data['media_id'] = $media['media_id'];
        // }
        $article->update($data);
        Alert::success('Success', 'Successfully Updated Article');
        return redirect(route('article.index'));
    }
    
    public function destroy($id)
    {
        Article::find($id)->delete();
        Alert::success('Success', 'Successfully Deleted Article');
        return redirect(route('article.index'));
    }
}
