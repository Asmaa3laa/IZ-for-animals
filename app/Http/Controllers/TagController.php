<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Tag;
use App\TagTranslation;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tags.index',compact('tags'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();
        return view('tags.create', compact('tag'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = Tag::create($request->validate([
            'name'=>'required|min:3|unique:tags',
        ]));
        return redirect('tag')->with('message','a new tag has been added ');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->validate([
            /* 'name:en'=>['required', 'min:3',
            Rule::unique('tags', 'name')->ignore($tag->id)->where(function ($query) { return $query->where('deleted_at', null); })]
        ,
        'name:ar'=>['required', 'min:3',
        Rule::unique('tags', 'name')->ignore($tag->id)->where(function ($query) { return $query->where('deleted_at', null); })]
        */ ],
    ));
        return redirect('tag')->with('message','tag has been updated successfully ^_^');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if(count($tag->blog)){
            return redirect('tag')->with('deleted',"Can't delete this because it has been added to a blog");
        }
        $tag->delete();
        return redirect('tag')->with('deleted','Tag has been deleted successfully :(');
    }
}
