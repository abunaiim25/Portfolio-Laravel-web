@extends('layouts.admin_layout')

@section('title')
    Main
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Main</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Main</li>
            </ol>


            <form action="{{ url('admin-main-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT' )}}
                <div class="row">

                    <div class="form-group col-md-4 mt-3">
                        <h4>Background Image</h4>
                        <img style="height: 30vh" src="{{ url($main->bc_img) }}" class="img-thumbnail" alt="">
                        <input class="mt-3" type="file" name="bc_img" id="bc_img">
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <div>
                            <label for="title">
                                <h4>Title</h4>
                            </label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $main->title }}">
                        </div>

                        <div class="mt-2">
                            <label for="sub_title">
                                <h4>Sub Title</h4>
                            </label>
                            <input type="sub_title" class="form-control" id="sub_title" name="sub_title"
                                value="{{ $main->sub_title }}">
                        </div>

                        <div class="mt-4">
                            <h4>Upload Resume</h4>
                            <input class="mt-2" type="file" name="resume" id="resume">
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-4">
            </form>

        </div>

    </main>
@endsection
