<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addtag;
use App\Alumni;
use App\Tagslist;
use Auth;
class AddtagController extends Controller
{
  public function index($id)
  {
    $a = Addtag::where('alum_id',$id)->where('tags',request('tag'))->get();
    $b = $a->toArray();

    if($b != null)
      {
        if(Auth::user()->type == 'CO' )
          return redirect('/viewdata')->with('Error','Tag already exists for that alum');
          else
            return redirect('/viewdata_s')->with('Error','Tag already exists for that alum');

        }
        else{
         Addtag::create([
           'alum_id' => $id,

           'tags' => request('tag'),

         ]);
       }

       if(Auth::user()->type == 'CO' )
        return redirect('/viewdata')->with('message','Tag has been added sucessfully');
        else
          return redirect('/viewdata_s')->with('message','Tag has been added sucessfully');
      }
      public function delete($id)  
      {


        $alum=Addtag::find(request('tagd'));
        $alum->delete(); 
        if(Auth::user()->type == 'CO' )
          return redirect('/viewdata')->with('message','Tag has been deleted sucessfully');
          else
            return redirect('/viewdata_s')->with('message','Tag has been deleted sucessfully');

        }
      }
