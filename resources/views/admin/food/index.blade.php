@extends('admin.home')


@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
             <a class="btn btn-info" href="{{route('food.create')}}">Add New Food</a>
        </div>

        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Foods</h4>

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
                        <th>
                          <div class="form-check form-check-muted m-0">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
                            </label>
                          </div>
                        </th>
                        <th> Photo </th>
                        <th> Name </th>
                        <th> Price </th>
                        <th> Edit </th>
                        <th> Delete </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $row )

                      <tr>
                        <td>
                          <div class="form-check form-check-muted m-0">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
                            </label>
                          </div>
                        </td>
                        <td>
                            <img src="{{asset('foodimage/'.$row->image)}}"  />

                        </td>
                        <td>
                          <span class="pl-2">{{ $row->title }}</span>
                        </td>
                        <td> {{ $row->price }} </td>

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
