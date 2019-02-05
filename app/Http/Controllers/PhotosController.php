<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
  public  function  create($album_id)
  {
      return view('photos.create')->with('album_id',$album_id);
  }


  public function  store(Request $request)
  {
      $this->validate($request,[
          'title'=>'required',
          'photo'=>'image|max:1999'
      ]);

      //handle the file upload
      if($request->hasFile('photo'))
      {
          //get file name with extention
          $fileNameWithExt=$request->file('photo')->getClientOriginalName();
          //now it may create problem if user select the image with same name so we get

          //Get just file name seprately
          $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

          //Get just Extension
          $extension=$request->file('photo')->getClientOriginalExtension();

          //now to name of image will be
          $fileNameToStore=$fileName.'_'.time().'.'.$extension;

          //store image
          $path=$request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$fileNameToStore);
      }

      //create new Album and save to database
      $photo=new Photo();
      $photo->album_id=$request->input('album_id');
      $photo->title=$request->input('title');
      $photo->description=$request->input('description');
      $photo->size=$request->file('photo')->getClientSize();
      $photo->photo=$fileNameToStore;
      $photo->save();

      return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Added Successfully Congratulations!');

  }


  public function show($id)
  {
      $photo=Photo::find($id);
      return view('photos.show')->with('photo',$photo);
  }

  public function destroy($id)
  {
      $photo=Photo::find($id);

      if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo))
      {
          $photo->delete();
      }
      else
          $photo->delete();

      return redirect('/albums/'.$photo->album_id)->with('success','Photo Deleted successfully');
  }
}
