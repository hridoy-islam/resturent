@extends('admin.home')



@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">All Users Status</h4>
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
                      <th> User Name </th>
                      <th> Email </th>
                      <th> User Role </th>
                      <th> Action </th>
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

                        <span class="pl-2">{{ $row->name }}</span>
                      </td>
                      <td> {{ $row->email }} </td>
                      <td> {{ $row->usertype === '1' ? 'admin' : 'user' }} </td>
                      @if($row->usertype === '1')
                      <td>
                        <div class="badge badge-outline-success">
                            Not Allowed
                        </div>
                      </td>
                      @else
                      <td>
                        <div class="badge badge-outline-danger">
                            <a href="{{route('admin.deleteuser', $row->id)}}">Delete</a>
                        </div>
                      </td>
                      @endif
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
