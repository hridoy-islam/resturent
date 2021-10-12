@extends('admin.home')


@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
             <a class="btn btn-info" href="{{route('food.create')}}">Add New Reservation</a>
        </div>

        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Reservation</h4>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>

                        <th> Name </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Guests </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Edit </th>
                        <th> Delete </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $row )

                      <tr>
                        <td>
                          <span class="pl-2">{{ $row->name }}</span>
                        </td>
                        <td> {{ $row->email }} </td>
                        <td> {{ $row->phone }} </td>
                        <td> {{ $row->number_guests }} </td>
                        <td> {{ $row->date }} </td>
                        <td> {{ $row->time }} </td>

                        <td>
                            <div class="badge badge-outline-primary">
                                <a href="{{route('food.edit', $row->id)}}">Edit</a>
                            </div>
                          </td>

                        <td>
                          <div>
                            <form method="POST" action="{{route('food.destroy', $row->id) }}"  >
                                @csrf
                                @method('DELETE')

                              <button class="btn btn-danger"type="submit"> Delete</button>
                            </form>


                          </div>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>


@endsection
