<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\One;
use App\Model\Article;
use App\Http\Requests\Backend\OneRequest;
use Alert;
class OneController extends Controller
{
      public function index()
    {
        $ones = One::orderBy('id', 'DESC')->paginate(25);
        // dd($ones);
        return view('admin.one.index', compact('ones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    	$articles = Article::all();  
        return view('admin.one.create' ,compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(OneRequest $request)
    {
        $data = $request->all();
        One::create($data);
        Alert::success('Success', 'Successfully Created Customer Feedback');
        return redirect(route('one.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $one = One::find($id);
        $articles=Article::all();
        if(empty($one)) {
            Alert::error('Error', 'One Not Found');
            return redirect(route('one.index'));
        }
        return view('admin.one.edit', compact('one','articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function update(OneRequest $request, $id)
    {
        $data = $request->all();
        $one = One::find($id);
        if(empty($one)) {
            Alert::error('Error', 'One Not Found');
            return redirect(route('one.index'));
        }
        One::find($id)->update($data);
        Alert::success('Success', 'Successfully Updated one');
        return redirect(route('one.index'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $one = One::find($id);
        if(empty($one)) {
            Alert::error('Error', 'One Not Found');
            return redirect(route('one.index'));
        }
        $one->delete();
        Alert::success('Success', 'Successfully deleted one');
        return redirect(route('one.index'));
    }
}
