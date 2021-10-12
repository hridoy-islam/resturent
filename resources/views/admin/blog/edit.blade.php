@extends('admin.home')
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('category.index')}}">Back</a>
        </div>

        <div class="col-8 grid-margin">
            <div class="card">
                <div class="card-body">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <h4 class="card-title">Edit blog</h4>

                    <form action="{{route('blog.update', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" value={{$data->title}} class="form-control" type="text">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10"
                                class="form-control">{{$data->description}}</textarea>
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
                                <option {{$data->category_id == $category->id ? ' selected' : ''}}
                                    value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">

                            <input class="form-control bg-info" value="Update blog" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h1>Feature Image</h1>
                    <img class="img-fluid" src="{{asset('blogimage/'.$data->image)}}" >
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
