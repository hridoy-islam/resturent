@extends('admin.home')


@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('chef.index')}}">Back</a>
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

                    <h4 class="card-title">Add Chef</h4>
<form action="{{route('chef.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="">Chef Name</label>
    <input name="name" class="form-control" type="text" placeholder="Name">
</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="">Chef Title</label>
    <input name="title" class="form-control" type="text" placeholder="Chef Title">
</div>
@error('title')
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
    <label for="facebook">Facebook Link</label>
    <input class="form-control" type="text" name="facebook">
</div>
@error('facebook')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <label for="twitter">Twitter Link</label>
    <input class="form-control" type="text" name="twitter">
</div>
@error('twitter')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <label for="instagram">Instagram Link</label>
    <input class="form-control" type="text" name="instagram">
</div>
@error('instagram')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror




<div class="form-group">

    <input class="form-control bg-info" value="Add Chef" type="submit">
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
