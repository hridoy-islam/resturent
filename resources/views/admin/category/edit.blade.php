@extends('admin.home')
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('category.index')}}">Back</a>
        </div>

        <div class="col-10 grid-margin">
            <div class="card">
                <div class="card-body">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <h4 class="card-title">Add Food</h4>

                    <form action="{{route('category.update',$data->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Category name</label>
                            <input name="name" type="text"
                            value="{{$data->name}}" class="form-control">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <input class="form-control bg-info" value="Update Food" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
