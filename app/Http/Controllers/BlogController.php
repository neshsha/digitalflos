<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\User;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(6);

        $id = Auth::id();

        if(Auth::User()) {
        $isadmin = Auth::User()->isadmin;
        }else {
        $isadmin = 0;
        }

        return view('blogs.index', compact('blogs', 'id', 'isadmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data = request()->validate([
            'caption' =>'required',
            'image'=> ['required', 'image'],
            'article' => 'required',
        ]);



          $avatar = $request->file('image');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          $image = Image::make($avatar)->fit(600,600)->save(public_path($filename));

            auth()->user()->blogs()->create([
                'caption' => $data['caption'],
                'image' => $filename,
                'article' => $data['article'],
            
            ]);

        return redirect()->route('blog.index')->with('message', 'Blog has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        $data = request()->validate([

            'caption' =>'required',
            'article' => 'required'
        ]);

    
      if(request('image')) {

        unlink($blog->image);

        $avatar = $request->file('image');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $image = Image::make($avatar)->fit(600,600)->save(public_path($filename));

         $blog->update([

        'caption' => $request->caption,
        'article' => $request->article,
        'image' => $filename,

         ]);

      }else{

         $blog->update([

            'caption' => $request->caption,
            'article' => $request->article,

         ]);
      }

      return redirect()->route('blog.index')->with('message', 'Blog is updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $image = $blog->image;

        unlink($image);

        $blog->delete();

        return redirect()->route('blog.index')->with('message', 'Blog has been deleted');
    }

    public function admingetall() {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(2);
        return view('admin.blogs', compact('blogs'));
    }

    public function approve(Blog $blog) {
        $blog->update([

            'isapproved' => true,

         ]);

        return redirect()->route('blog.getall')->with('message', 'Blog has been approved');
    }

    public function deny(Blog $blog) {
        $blog->update([

            'isapproved' => false,

         ]);

        return redirect()->route('blog.getall')->with('message', 'Blog has been denied');
    }
}
