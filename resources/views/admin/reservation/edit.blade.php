@extends('admin.home')
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('food.index')}}">Back</a>
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

                    <h4 class="card-title">Add Food</h4>
                    <form action="{{route('food.update',$data->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Food Title</label>
                            <input value="{{ $data->title }}" name="title" class="form-control" type="text" placeholder="Food Title">
                        </div>
                        @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        <div class="form-group">
                            <label for="price">Food Price</label>
                            <input value="{{ $data->price }}" name="price" id="price" class="form-control" type="number" placeholder="$22">
                        </div>
                        @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                        <div class="form-group">
                            <label for="description">Food Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30"
                                rows="10">{{ $data->description }}</textarea>
                        </div>
                        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input class="form-control bg-info" value="Update Food" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6 grid-margin">
            <img src="{{asset('foodimage/'.$data->image)}}" alt="">
        </div>
    </div>
</div>


@endsection
