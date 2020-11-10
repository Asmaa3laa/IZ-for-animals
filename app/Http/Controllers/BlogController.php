<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use App\Tag;
use App\BlogTag;
use App\Http\Requests\BlogRequest;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Auth;




class BlogController extends Controller
{
    public function __construct()
    {
    $this->middleware('can:create.blogs', ['only' => ['create', 'store', 'edit','update','delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->role == 'doctor'or'clinic')
        { 
            // dd( Auth::user()->role);
            // if(Auth::user()->role == 'doctor')
            // {
                $blogs=Blog::where('is_verified','=',1)->paginate(9, ['*'], 'blogs');
                $users=[];
                foreach($blogs as $blog)
                {      
                    $user = $blog->user()->get();
                    array_push($users, $user[0]); 
                }           
                $tags=Tag::all();
                return view('blog.index',compact('blogs','users','tags'));
            // }
        }
        else
        {
            $blogs=Blog::where(['is_verified'=>1,'for_doctors'=>0])->paginate(9, ['*'], 'blogs');
            $users=[];
            foreach($blogs as $blog)
            {      
                $user = $blog->user()->get();
                array_push($users, $user[0]); 
            }           
            $tags=Tag::all();
            return view('blog.index',compact('blogs','users','tags'));   
        }
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
            DB::beginTransaction();
                $image_path = $request->image->store('uploads', 'public');
            $blog = Blog::create([
            "title" => $request->title,
            'content' => $request->content,
            "user_id" =>Auth::id(),
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
            // dd($th);
            // delete blog if an error arises and return server error
            DB::rollBack();
            return abort(500);
        }

        // commit changes if every thing goes ok
        $latest_blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        //redircet
         if(Auth::user()->role == 'clinic')
         {
        return  redirect("blog/".$blog->id)->with('success','Blog has added successfuly');
         }
        else
        {
        return  redirect("/blog/pending")->with('success','Blog has added successfuly');
        }

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
        $latest_blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        // $tag_blogs = BlogTag::where('tag_id','=',$id)->get();
        if($blog->is_verified == 1)
        {
            return view('blog.single-blog',compact('blog','tags','latest_blogs'));
        }
        else
        {
            return Redirect::to('blog/');
        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if(Auth::id() == $blog->user_id)
        {
            return view('blog.edit',['blog'=>Blog::find($id),'tags'=>Tag::all(),'blogtags'=>BlogTag::where('blog_id',"=",$id)->get()]);
        }
        else
        {
            return Redirect::to('blog/');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update($request->all());
        if($request->hasFile('image'))
        {
         $image_path = $request->image->store('uploads', 'public');
         $blog->image = $image_path;
         $blog->save();
        }
            $tags = $request->tags;
            foreach($tags as $tag )
            {
                DB::table('blog_tag')->where('blog_id', $id)->update(['tag_id' => $tag,'blog_id'=>$blog->id]);
            }   
        if(Auth::user()->role == 'clinic')
        {
            return  redirect("blog/".$blog->id)->with('success','Blog has added successfuly');  
        }
        elseif(Auth::user()->role == 'admin' or Auth::user()->role == 'blogs_admin')   
        {
            return  redirect("blog/pending")->with('success','Blog has added successfuly');  

        }

    }

    public function acceptedBlogs()
    {
        $blogs = Blog::where('is_verified','=','1')->paginate(10);
        return view('admin.blogs.index',compact('blogs'));        
    }
    public function pendingBlogs()
    {
        $blogs = Blog::where('is_verified','=','0')->paginate(10);
        return view('admin.blogs.index',compact('blogs'));
    }
    public function accept(Request $request)
    {
        // $blog = Blog::find($_POST['blogId']);
        $blog = Blog::find($request->get('blogId'));
        $for_doctors = $request->get('for_doctor');
        if($for_doctors == 'true')
        {
            $blog->for_doctors = 1;
        }
        $blog->is_verified = 1;
        $blog->update();
        $tags = $request->get('selected_tags');
        BlogTag::where('blog_id','=',$blog->id)->delete();
        foreach($tags as $tag )
        {
            $tags = BlogTag::create([
                "tag_id"=>$tag,
                "blog_id"=>$blog->id,   
            ]); 
        }  
        return response()->json(['success'=>'Got Simple Ajax Request','for_doctors'=>$for_doctors,'tags'=>$tags]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id); 
        // dd($blog);
        // $this->authorize('delete', $blog);
        $blog->delete();
        if(Auth::user()->role == 'admin')
        {
            return redirect('admin/home/'.Auth::id())->with('success','Blog deleted successfully ');
        }
        return redirect('profile/'.Auth::id())->with('success','Blog deleted successfully ');
    }

    public function denyBlog($id)
    {
        try {
            DB::beginTransaction();
            $blog = Blog::find($id);
            $name = $blog->user->name;  
            $title = $blog->title;      
            Mail::to($blog->user->email)->send(new blog_denyMail($name, $title));
            // $blog->is_verified = '0'
            Db::commit();
            return Redirect::to('blog/pending')->with('reject',"Reject email has been send and blog isn't confirmed");
            } 
        catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollBack();
            return Redirect::to('blog/pending')->with('failed',"Email address may be not accurate, it can't send email!");

        }
    }
    
}
