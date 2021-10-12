@extends('admin.home')
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('reserve.index')}}">Back</a>
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

                    <h4 class="card-title"> {{$data->title}} </h4>

                    <p> {{$data->description}}</p>
                    <p> {{$data->category->name}}</p>
                    <a href="{{route('blog.edit', $data->id)}}" class="btn btn-info">Edit</a>

                </div>
            </div>
        </div>
        <div class="col-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid" src="{{asset('blogimage/'.$data->image)}}" >
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
