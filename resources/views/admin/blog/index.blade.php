@extends('admin.home')
@section('content')

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
             <a class="btn btn-info" href="{{route('blog.create')}}">Add New blog</a>
        </div>

        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All blog</h4>

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

                        <th> Title </th>
                        <th> Image </th>
                        <th> Description </th>
                        <th> Category </th>
                        <th> View </th>
                        <th> Delete </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $row )

                      <tr>
                        <td>
                          <span class="pl-2">{{ $row->title }}</span>
                        </td>
                        <td>
    <img src="{{asset('blogimage/'.$row->image)}}" alt="">
                          </td>

    <td>{{$row->description}}</td>
    <td>{{$row->category->name}} </td>

                        <td>
                            <div class="badge badge-outline-primary">
                                <a href="{{route('blog.show', $row->id)}}">View</a>
                            </div>
                          </td>

                        <td>
                          <div>
                            <form method="POST" action="{{route('blog.destroy', $row->id) }}"  >
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
