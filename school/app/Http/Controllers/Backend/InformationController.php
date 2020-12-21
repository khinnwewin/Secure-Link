<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Information;
use App\Http\Requests\Backend\InformationRequest;
use Alert;
class InformationController extends Controller
{
    //
     public function index()
    {
        $infos = Information::orderBy('id', 'DESC')->paginate(25);
        return view('admin.information.index', compact('infos'));
    }
     public function create()
    {	
        return view('admin.information.create');
    }
    public function store(InformationRequest $request)
    {
      	$data = $request->all();
        Information::create($data);
        Alert::success('Success', 'Successfully Created Customer Feedback');
        return redirect(route('information.index'));
    }

    public function edit($id)
    {
        $information = Information::find($id);
        // dd($information);
        // $articles=Article::all();
        if(empty($information)) {
            Alert::error('Error', 'information Not Found');
            return redirect(route('information.index'));
        }
        return view('admin.information.edit', compact('information'));
    }

    
    
     public function update(InformationRequest $request, $id)
    {
        $data = $request->all();
        $information = Information::find($id);
        if(empty($information)) {
            Alert::error('Error', 'information Not Found');
            return redirect(route('information.index'));
        }
        Information::find($id)->update($data);
        Alert::success('Success', 'Successfully Updated information');
        return redirect(route('information.index'));
    }

   
    public function destroy($id)
    {
        $information = Information::find($id);
        if(empty($information)) {
            Alert::error('Error', 'information Not Found');
            return redirect(route('information.index'));
        }
        $information->delete();
        Alert::success('Success', 'Successfully deleted information');
        return redirect(route('information.index'));
    }
    
}
