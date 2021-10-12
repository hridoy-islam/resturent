@extends('admin.home')


@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('blog.index')}}">Back</a>
        </div>

        <div class="col-6 grid-margin">
            <div class="card">
                <div class="card-body">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <h4 class="card-title">Add blog</h4>
                    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" class="form-control" type="text" placeholder="name">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="category" id="">
                                @foreach ($cat as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


    <div class="form-group">

        <input class="form-control bg-info" value="Add blog" type="submit">
    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
