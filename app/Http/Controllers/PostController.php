<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use App\Post;
use App\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0){

            Session::flash('info','Create category before creating some posts!');
            return redirect()->route('posts');
        }

        return view('admin.posts.create')->with('categories',$categories)
                                        ->with('tags' , Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $this->validate($request,[
           'title'=>'required',
           'content'=>'required',
           'featured'=>'required|image',
           'category_id'=>'required',
           'tags'=>'required'
        ]);
        $featured_image = $request->featured;
        $featured_image_new = time().$featured_image->getClientOriginalName();
        $featured_image->move('uploads/posts',$featured_image_new);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_image_new,
            'category_id' => $request->category_id,
            'slug'   => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post created successfully!');
        return redirect()->route('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit')->with('post',$post)
                                       ->with('categories',$categories)
                                       ->with('tags',Tag::all());
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
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
         ]);
         $post = Post::find($id);

         if($request->hasFile('featured')){
            $featured_image = $request->featured;
            $featured_image_new = time().$featured_image->getClientOriginalName();
            $featured_image->move('uploads/posts',$featured_image_new);
            $post->featured = 'uploads/posts/'.$featured_image_new;
         }
         $post->title = $request->title;
         $post->content = $request->content;
         $post->category_id = $request->category_id;
         $post->tags()->attach($request->tags);
         $post->save();

         return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','You Deleted the Post successfully!');
        return redirect()->route('posts');
    }

    public function trashed(){
        $post = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$post);

    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Deleted from trash successfully!');
        return redirect()->back();

    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored from trash successfully!');
        return redirect()->route('posts');
    }
}
