<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;


class MainPagesController extends Controller
{


   
    
    public function dashboard(){
        return view('pages.dashboard');
        }

        
    public function index()
    {
        //for take from data
        //return $main = Main::first();
        $main = Main::first();
        return view('pages.main',compact('main'));
           
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //error checking --it's mean when some field data missing , then see error
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string'
        ]);

        //data send database
        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        //one image added or replace one iamge
        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            //bc_img
            $img_file->storeAs('public/img/','bc_img.' . $img_file->getClientOriginalExtension());
            //replace image by new image
            $main->bc_img = 'storage/img/bc_img.' . $img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume.' . $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.' . $pdf_file->getClientOriginalExtension();
        }

        $main->save();

        return redirect('/admin/main')->with('success', "Main Page data has been updated successfully");
    }

    
}
