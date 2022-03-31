@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Service details
                <a href="{{url('admin/service')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('admin/service')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        @foreach ($data as $d)
                            <tr>
                                <th>Name</th>
                                <td>{{$d->title}}</td>
                            </tr>    
                            <tr>
                                <th>Photo</th>
                                <td><img width="100px" src="{{Storage::url($d->photo)}}"></td>
                            </tr>
                            <tr>
                                <th>Small Detail</th>
                                <td>{{$d->small_desc}}</td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>{{$d->detail_desc}}</td>
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