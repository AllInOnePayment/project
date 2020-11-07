<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    {   $news=News::all()->where('service_id',session()->get('service_id'));
        $index=0;
        return view('service.news.index',['news'=>$news,'index'=>$index]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request->input('title'));
        //dd(date('Y-m-d'));
        $news=new News();
        $news->service_id=session()->get('service_id');
        $news->title=$request->input('title');
        $news->news=$request->input('body');
        $news->start_date=date('Y-m-d');
        $news->expire_date=$request->input('expire');
        $news->save();
        
        return redirect()->route('ServiceNews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=News::find($id);
        return view('service.news.show',['news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $news=News::find($id);
        return view('service.news.edit',['news'=>$news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $news=News::find($id);
        $news->service_id=session()->get('service_id');
        $news->title=$request->title;
        $news->news=$request->body;
        $news->save();

        return redirect()->route('ServiceNews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('ServiceNews.index');
    }
}
