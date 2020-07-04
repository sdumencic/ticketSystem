<?php

namespace TicketSystem\Http\Controllers;

use Illuminate\Http\Request;
use TicketSystem\Post;
use Illuminate\Support\Facades\Storage;
use DB;

class PostsController extends Controller
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
   {
      //$posts = Post::all()->paginate(1); //koliko po stranici
      $posts = Post::orderBy('status', 'asc')->paginate(12);
      return view('posts.index')->with('posts', $posts);
      //ako zelimo sortirati $posts = Post::orderBy('title', 'asc' ili 'desc')->get();
      //ako zelimo s SQL use DB; i naredba $posts = DB::select('SELECT * FROM posts');
   }

   /**
    * Show the form for creating a new resource.
    * 
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
      return view('posts.create');
   }

   /**
    * Store a newly created resource in storage.
    * 
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */

   public function store(Request $request)
   {
      $this->validate($request, [
         'title' => 'required',
         'body' => 'required',
         'priority' => 'required',
         'file' => 'nullable|max:1999',
         'status' => 'required|nullable',
      ]);

      //hanlde file upload
      if ($request->hasFile('file')) {
         $fileNameWithExt = $request->file('file')->getClientOriginalName();
         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('file')->getClientOriginalExtension();
         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
         $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
      } else {
         $fileNameToStore = 'noimage.jpg';
      }

      $post = new Post;
      $post->title = $request->input('title'); //dodaj ostalo kao prioritet itd
      $post->body = $request->input('body');
      $post->priority = $request->input('priority');
      $post->user_id = auth()->user()->id;
      $post->file = $fileNameToStore;
      $post->status = $request->input('status');
      $post->save();

      return redirect('/home')->with('success', 'Ticket Created'); //promijeni redirect
   }

   /**
    * Display the specified resource.
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */

   public function show($id)
   {
      $post = Post::find($id);
      return view('posts.show')->with('post', $post);
   }

   /**
    * Show the form for editing the specified resource.
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
      $post = Post::find($id);
      if (auth()->user()->id !== $post->user_id) {
         return redirect('/posts')->with('error', 'Unauthorized Page');
      }
      
      return view('posts.edit')->with('post', $post);
   }

   /**
    * Update the specified resource in storage.
    * 
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */

   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'title' => 'required',
         'body' => 'required',
         'file' => 'nullable|max:1999'
      ]);

      $post = Post::find($id);      

      if ($request->hasFile('file')) {
         $fileNameWithExt = $request->file('file')->getClientOriginalName();
         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('file')->getClientOriginalExtension();
         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
         $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
         Storage::delete('public/file/' . $post->file);
      } else {
         $fileNameToStore = 'noimage.jpg';
      }

      $post = Post::find($id);
      $post->title = $request->input('title'); //dodaj ostalo kao prioritet itd
      $post->body = $request->input('body');
      $post->priority = $request->input('priority');
      $post->file = $fileNameToStore;
      $post->status = $request->input('status');
      $post->save();

      return redirect('/posts')->with('success', 'Ticket Updated'); //promijeni redirect
   }

   /**
    * Remove the specified resource from storage.
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */

   public function destroy($id)
   {
      $post = Post::find($id);
      if (auth()->user()->id !== $post->user_id) {
         return redirect('/posts')->with('error', 'Unauthorized Page');
      }

      //if($post->file != 'noimage.jpg') {
      Storage::delete('public/file/' . $post->file);
      //}
      $post->delete();
      return redirect('/home')->with('success', 'Ticket Deleted');
   }
}
