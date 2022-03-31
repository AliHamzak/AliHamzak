@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">RoomType
                <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            
            @if($errors->any())
                @foreach($errors->all() as $er)
                    <p class="text-danger">{{$er}}</p>
                @endforeach
            @endif

            @if(Session::has('success'))
               <p class="text-success">{{session('success')}}</p>
            @endif

            <div class="table-responsive">
                <form action="{{url('admin/roomtype')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input name="title" type="text" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>
                                <input name="price" type="number" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td>
                                <textarea name="detail" type="text" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td>
                                <input name="imgs[]" type="file" multiple />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection