<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Storage;

class BlogsController extends Controller
{
    public function index(){
        //Remember you may have to move this function to to dealt with from your home controller
        $blogs = Blog::all();
        return view('blogs.index',['blogs' => $blogs]);
    }

    public function create(){

        return view('blogs.create');
    }

    public function store(Request $request){
        $blog = new Blog;
        // gets The file
        $path = Storage::putFile('public', $request->file('image'));
        //Gets the URL which we will use to store the image in the DataBase
        $url = Storage::url($path);

        $blog->image = $url;
        $blog->title = $request->title;
        $blog->content = $request->content;

        $blog->save();

        return redirect()->route('blogs');
    }

    public function show($id){
        $blog = Blog::find($id);

        return view('blogs.show', ['single_blog' => $blog]);
    }

    public function edit($id){
        $blog = Blog::find($id);

        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id){
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->content = $request->content;

        $blog->update();

        return redirect()->route('blog_path', ['id' =>$blog]);
    }

    public function destroy($id){
        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->route('blogs', ['blog'=>$blog]);
    }
}
