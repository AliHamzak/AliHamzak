@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@foreach($data as $d) {{$d->name}} @endforeach
                <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('admin/customer')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        @foreach ($data as $d)
                            <tr>
                                <th>Photo</th>
                                <td><img width="100px" src="{{Storage::url($d->photo)}}"></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$d->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$d->email}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{$d->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$d->address}}</td>
                            </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection