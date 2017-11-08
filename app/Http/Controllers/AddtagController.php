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

    	
    	Addtag::create([
    			'alum_id' => $id,
    			
    			'tags' => request('tag'),

    		]);


    	if(Auth::user()->type == 'CO' )
          return redirect('/viewdata');
          else
            return redirect('/viewdata_s');
   	}
     public function delete($id)  
    {

        
        $alum=Addtag::find(request('tagd'));
        $alum->delete(); 

        $alumni = Alumni::get();
        $message = 'Tag has been deleted succesfully';
        $tags = Tagslist::get();
        return back()->with(compact('message','alumni','tags'));
        
        
    }
}
