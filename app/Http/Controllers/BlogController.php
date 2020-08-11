<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use App\Tag;
use App\BlogTag;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;
use Auth;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::where('is_verified','=',1)->paginate(6, ['*'], 'blogs');
        $users=[];
        foreach($blogs as $blog)
        {      
            $user = $blog->user()->get();
            array_push($users, $user[0]); 
        }           

        return view('blog.blogs',compact('blogs','users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        return view('blog.create-blog',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        //validate
        //store;     
        try {
            // dd($request);
            DB::beginTransaction();
                $image_path = $request->image->store('uploads', 'public');
                var_dump($image_path);
            $blog = Blog::create([
            "title" => $request->title,
            'content' => $request->content,
            "user_id"=>2,
            // "user_id" =>Auth::id(),
            'image' => $image_path,
            ]);
            $tags = $request->tags;
            foreach($tags as $tag )
            {
            $tags = BlogTag::create([
                "tag_id"=>$tag,
                "blog_id"=>$blog->id,   
            ]);
            }
            Db::commit();
        } 
        catch (\Throwable $th)
        {
            dd($th);
            // delete blog if an error arises and return server error
            DB::rollBack();
            return abort(500);
        }
        // commit changes if every thing goes ok
        // Db::commit();
        //redircet
        return view('blog.single-blog',compact('blog','tags'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $tags = Tag::all();
        return view('blog.single-blog',compact('blog','tags'));
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
