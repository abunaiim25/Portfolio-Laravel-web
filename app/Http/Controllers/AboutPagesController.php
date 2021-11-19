<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutPagesController extends Controller
{

   
    public function create()
    {
        return view('pages.abouts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title1' => 'required|string',
            'title2' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string', 
        ]);

        $abouts = new About;
        $abouts->title1 = $request->title1;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;

        $image_file = $request->file('image');
        Storage::putFile('public/img/', $image_file);
        $abouts->image = "storage/img/".$image_file->hashName();

        $abouts->save();

        return redirect('admin/about/create')->with('success','New About Created Successfully');
    }


    public function list()
    {
        $abouts = About::all();
        return view('pages.abouts.list', compact('abouts'));
    }

    
    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $about = About::find($id);
        return view('pages.abouts.edit', compact('about'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string', 
        ]);

        $abouts = About::find($id);
        $abouts->title1 = $request->title1;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;

        if($request->file('image')){
            $image_file = $request->file('image');
            Storage::putFile('public/img/', $image_file);
            $abouts->image = "storage/img/".$image_file->hashName();
        }
        
        $abouts->save();

        return redirect('admin/about/list')->with('success','About Updated Successfully');
    }

    
    public function destroy($id)
    {
        $about = About::find($id);
        @unlink(public_path($about->image));
        $about->delete();
       
        return redirect('admin/about/list')->with('success','About Deleted Successfully');
  
    }
}
