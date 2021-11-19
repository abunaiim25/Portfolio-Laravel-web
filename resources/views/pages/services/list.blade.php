@extends('layouts.admin_layout')

@section('title')
    Services List
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List of Services</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of Services</li>
            </ol>


            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Font Awesome Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($services) > 0)
                        @foreach ($services as $service)
                        <tr>
                            <th scope="row">{{$service->id}}</th>
                            <td>{{$service->icon}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{Str::limit(strip_tags($service->description),40)}}</td>
                            <td>
                              <div class="row">
                                <div class="col-sm-2 mx-3 my-1">
                                  <a role="button" href="{{url('admin-services-edit/'.$service->id)}}" class="btn btn-success">Edit</a>
                                </div>

                                <!--delete-->
                                <div class="col-sm-2 mx-3 my-1">
                                  <form action="{{url('admin-services-delete/'.$service->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                  </form>
                                </div>


                              </div>
                            </td>
                          </tr>
                        @endforeach
                    @endif
                  
                 
                </tbody>
              </table>

    </main>
@endsection
