@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@foreach($data as $d) {{$d->title}} @endforeach
                <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('admin/roomtype')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        @foreach ($data as $d)
                            <tr>
                                <th>Title</th>
                                <td>{{$d->title}}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{$d->price}}</td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>{{$d->detail}}</td>
                            </tr>
                            <tr>
                                <th>Gallery Images</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            @foreach ($d->roomtypeimgs as $img)
                                                <td class="imgcol{{$img->id}}">
                                                    <img src="{{Storage::url($img->img_scr)}}" />
                                                </td>                                                
                                            @endforeach
                                        </tr>
                                    </table>
                                </td>
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