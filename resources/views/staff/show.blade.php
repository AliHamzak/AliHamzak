@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@foreach($data as $d) {{$d->full_name}} @endforeach
                <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('admin/staff')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        @foreach ($data as $d)
                            <tr>
                                <th>Name</th>
                                <td>{{$d->full_name}}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>{{$d->department->title}}</td>
                            </tr>
                            <tr>
                                <th>photo</th>
                                <td>
                                    <img src="{{Storage::url($d->photo)}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td>{{$d->bio}}</td>
                            </tr>
                            <tr>
                                <th>Sallery Type</th>
                                <td>{{$d->salary_type}}</td>
                            </tr>
                            <tr>
                                <th>Salary Amount</th>
                                <td>{{$d->salary_amt}}</td>
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