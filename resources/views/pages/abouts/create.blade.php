@extends('layouts.admin_layout')

@section('title')
    About Create
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">About Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>



            <form action="{{ url('admin-about-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-md-4 mt-3">
                        <h3>Image</h3>
                        <img style="height: 30vh" src="{{ asset('assets/img/big_image.jpg') }}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="image">
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <div class="mb-3">
                            <label for="title">
                                <h4>Title 1</h4>
                            </label>
                            <input type="text" class="form-control" id="title1" name="title1" value="">
                        </div>
                        <div class="mb-5">
                            <label for="sub_title">
                                <h4>Title 2</h4>
                            </label>
                            <input type="text" class="form-control" id="title2" name="title2" value="">
                        </div>
                    </div>
                    <div class="form-group col-md-8 mt-3">
                        <h3>Description</h3>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary my-5">

            </form>


        </div>

    </main>
@endsection
