<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CreateController extends Controller
{
    public function index(){
        return view('blog.create');

    }
    public function store(Request $request){

        $this->validate($request,[
            'titre'=> 'required',
            'contenu'=>'required'
        ]);
        $blog= new Blog();
        $blog->titre=$request->input('titre');
        $blog->contenu=$request->input('contenu');
        $blog->save();
        return redirect('/blog');


    }
    public function edit($id){
        $blog= Blog::find($id);
        return view('blog.edit', compact('blog'));
    }
    public function update(Request $request,$id){

        $this->validate($request,[
            'titre'=> 'required',
            'contenu'=>'required'
        ]);
        $blog= Blog::find($id);
        $blog->titre=$request->input('titre');
        $blog->contenu=$request->input('contenu');
        $blog->save();
        return redirect('/blog');


    }


}
