<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Filters\EventFilters;
//this uses the model post create
use App\Post;

class PostsController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //this allow guest user to only access events and view them, they cannot create events 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventFilters $filters)
    {
        //this return the view in the postst folder
        //and it is order by the most recent added, and i paginaded it to be 10 events per page 
        $posts = Post::orderBy('created_at','desc')->filter($filters)->latest()->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //this loads the view
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating the form 
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'time' => 'required',
            'contact' => 'required',
            'venue' => 'required',
            'type' => 'required|in:sport,culture,other',
            'image' => 'image|nullable|max:1998'
        ]);

          // this handle File Upload
          if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // get only the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // this store the image in store/public, however
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


          // this creats the Event 
            $post = new Post;
            $post->name = $request->input('name');
            $post->description = $request->input('description');
            $post->due_date = $request->input('due_date');
            $post->time =  $request->input('time');
            $post->contact = $request->input('contact');
            $post->venue = $request->input('venue');
            $post->type = $request->input('type');
            $post->user_id = auth()->user()->id;
            $post->image = $fileNameToStore;
            $post->save();
        
            return redirect('/posts')->with('success', 'Event Created');
         }
    

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show the post using the id
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //this view the post that we want to update
        $post = Post::find($id);
        //this is a sor of protection again edithing people post
        
        return view('posts.edit')->with('post', $post);
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
        //
         //validating the form 
         $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'time' => 'required',
            'contact' => 'required',
            'venue' => 'required',
            'type' => 'required|in:sport,culture,other',
        ]);
         // this handle File Upload
         if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // get only the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // this store the image in store/public, however
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } 

        
       

          // this find the Event and it updates it
            $post = Post::find($id);
            $post->name = $request->input('name');
            $post->description = $request->input('description');
            $post->due_date = $request->input('due_date');
            $post->time =  $request->input('time');
            $post->contact = $request->input('contact');
            $post->venue = $request->input('venue');
            $post->type = $request->input('type');
            if($request->hasFile('image')){
                $post->image = $fileNameToStore;
            }
            $post->save();

        
            return redirect('/posts')->with('success', 'Event Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //this finds the event and delete it
        $post = Post::find($id);
          // Check for correct user

        if($post->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();
        //this redirect to the events 
        return redirect('/posts')->with('success', 'Event Removed');
    }
}

 
