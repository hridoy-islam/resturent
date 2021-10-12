@extends('admin.home')
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <a class="btn btn-info" href="{{route('reserve.index')}}">Back</a>
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

<h4 class="card-title badge badge-outline-warning">Reservation :  {{$data->name}} at {{$data->time}}</h4>

<p>Name : <b class="badge badge-outline-primary">{{$data->name}}</b></p>
<p>Email: <b class="badge badge-outline-primary">{{$data->email}}</b></p>
<p>Phone: <b class="badge badge-outline-primary">{{$data->phone}}</b></p>
<p>Guests:<b class="badge badge-outline-primary"> {{$data->number_guests}}</b></p>
<p>Date : <b class="badge badge-outline-primary">{{$data->date}}</b></p>
<p>Time : <b class="badge badge-outline-primary">{{$data->time}}</b></p>
<p>Message: <b class="badge badge-outline-primary">{{$data->message}}</b></p>

    </div>
</div>


@endsection
