<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
  public function index()
  {
      $albums=Album::with('Photos')->get();
      return view('album.index')->with('albums',$albums);
  }

    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required',
           'cover_image'=>'image|max:1999'
       ]);

        //handle the file upload
        if($request->hasFile('cover_image'))
        {
            //get file name with extention
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //now it may create problem if user select the image with same name so we get

            //Get just file name seprately
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //Get just Extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();

            //now to name of image will be
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;

            //store image
           $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }

        //create new Album and save to database
        $album=new Album();
        $album->name=$request->input('name');
        $album->description=$request->input('description');
        $album->cover_image=$fileNameToStore;
        $album->save();

        return redirect()->back()->with('success','Album Created Successfully Congratulation!');
        // or
        // return redirect('/posts')->with('success','Post Create Successfully Congratulation!');
    }



    public function show($id)
    {
        $album=Album::with('Photos')->find($id);
        return view('album.show')->with('album',$album);
    }

    public function destroyAlbum($id)
    {
        $album=Album::destroy($id);

        return redirect('/albums')->with('success','Album deleted successfully!!!');
    }
}
