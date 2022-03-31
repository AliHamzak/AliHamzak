@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@foreach($data as $d) {{$d->title}} @endforeach
                <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('admin/rooms')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        @foreach ($data as $d)
                            <tr>
                                <th>Title</th>
                                <td>{{$d->title}}</td>
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