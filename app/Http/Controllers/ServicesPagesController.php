<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesPagesController extends Controller
{
    

   //create.blade.php
    public function create()
    {
        return view('pages.services.create');
    }

     //create.blade.php
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string', 
        ]);

        $services = new Service;
        $services->icon = $request->icon;
        $services->title = $request->title;
        $services->description = $request->description;

        $services->save();
        return redirect('/admin/services/create')->with('success', "New Services created successfully");

    }



    //list.blade.php
    public function list()
    {
        //for get all data
        $services = Service::all();
        return view('pages.services.list',compact('services'));
    }


    //list.blade.php to edit.blade.php
    public function edit($id)
    {
        //specific data find for specipic id 
        $services = Service::find($id);
        return view('pages.services.edit',compact('services'));
    }


    public function show($id)
    {
        //
    }
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string', 
        ]);
       //specific data find for specipic id 
        $services = Service::find($id);
        $services->icon = $request->icon;
        $services->title = $request->title;
        $services->description = $request->description;

        $services->save();
        return redirect('/admin/services/list')->with('success', "Services Updated successfully");

    }

    
    public function delete($id)
    {
        $services = Service::find($id);
        $services->delete();

        return redirect('/admin/services/list')->with('success', "Services Deleted successfully");

    }
}
