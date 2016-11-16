<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

//calling in the Post Model Class.
use App\Post;
use App\User;



class PostsController extends Controller
{

  //Returns all posts
  public function index()
 {

   //two database call to get two multideminsional objects from the Database
   $a = Post::all()->where('posttype','=','video');
   $b = Post::all()->where('posttype','=','post');

   // passing objects to view.
   return view('public.index',compact('a','b'));
 }

 // Returns Video Posts
 public function video()
 {
   $a = Post::all()->where('posttype','=','video');
   return view('public.videos',compact('a'));
 }

 // Returns Post Posts lol
 public function post()
{
  $a = Post::all()->where('posttype','=','post');
 return view('public.posts',compact('a'));
}


/*
// Returns individual post

OLD VERSION BY ID
public function show($id)
{
 $a = Post::find($id);

return view('public.single',compact('a'));
}
*/

// Returns individual post by title
public function show($title)
{
  //taking in  the url and reformatting for db calling

  // need to sanitise
  $title = str_replace('-', ' ', $title);
 $a = Post::all()->where('posttitle','=',$title)->first();
return view('public.single',compact('a'));
}



// Returns admin pages
public function admin()
{
  return view('admin.index');
}

public function create()
{
return view('admin.add');
}

//Stores post values
public function store()
{
$id = Auth::user()->id;

//Capturing post from form
$a = request()->all();
//capturing request object again.
$request = request();
//storing file from post in variable
$file = $request->file('fmedia');

//Checking post type
$posttype = $a['posttype'];
if($posttype == 1){
  $postType = 'video';
}else {
  $postType = 'post';
}

//Creating an instance of the Post object
  $b = new Post;
//Assigning values // need to sanitise.
  $b->posttitle = $a['title'];
  $b->postcontent = $a['postcontent'];
//File management
if (!empty($file)) {
  $f = $_FILES['fmedia'];

  $fname = $f['name'];

  $dpath = public_path("resources");
  $p = $file->move($dpath,$fname);
  $b->fmedia = "/resources/".$fname;
}
  	$b->posttype = $postType;
    $b->user_id = $id;
    $b->poststatus = 'published';

    $request = request();

    $file = $request->file('fmedia');


//saving new object
		$b->save();


    //returns to edit the post that was just created

    //CODE NEEDS TO BE REFACTORED
    $i = $b->id;

return redirect('/share/edit/'.$i);

}



public function edit($id)
{
  $user_id = Auth::user()->id;
  $currentuser = User::find($user_id);




  $a = $currentuser->posts->where('id','=',$id)->first();
//  return $a;
//  $a = Post::find($id);
  return view('admin.edit',compact('a'));

}
//basically the same as store
public function update($id)
{

  $user_id = Auth::user()->id;
  $b = Post::find($user_id);

  $c = request()->all();


  $b->posttitle = $c['title'];
  $b->postcontent = $c['postcontent'];

  $posttype = $c['posttype'];
  if($posttype == 1){
    $postType = 'video';
  }else {
    $postType = 'post';
  }
  $b->posttype = $postType;

  if (!empty($file)) {
    $f = $_FILES['fmedia'];

    $fname = $f['name'];

    $dpath = public_path("resources");
    $p = $file->move($dpath,$fname);
    $b->fmedia = "/resources/".$fname;
  }

      $b->user_id = $user_id;
      $b->poststatus = 'published';
  		$b->save();
  		return back();
}


// needs to only show users posts.
public function allposts()
{
  $id = Auth::user()->id;
  $currentuser = User::find($id);
//  return $currentuser;

$a = $currentuser->posts;

//return $a;
  // $a = User::posts();

  return view('admin.list', compact('a'));
}
public function archive($id)
{
  $b = Post::find($id);
  $b->poststatus = "archived";
  $b->save();
  return $b;
}



}
