<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Auth;

class NewsController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        return view('news.index', compact('news'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('news.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $data = new News();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $user = Auth::user();
        $data->user_id = $user->id;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().$file->getClientOriginalName();
            $file-> move(public_path('/image/news'), $filename);
            $data->image= $filename;
        }
        $data->save();
        return redirect()->route('news.index')->with('success','News has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit',compact('news'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $data = News::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().$file->getClientOriginalName();
            $file-> move(public_path('/image/news'), $filename);
            $data->image= $filename;
        }
        $data->save();

        return redirect()->route('news.index')->with('success','News Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        /*$path = public_path()."/uploads/".$from_db->image_name;
        unlink($path);*/
        return redirect()->route('news.index')->with('success','News has been deleted successfully');
    }
}

