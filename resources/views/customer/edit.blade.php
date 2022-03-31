@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Customer
                <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">   
                    <form action="{{url('admin/customer/'.$data->id.'')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input value="{{$data->name}}" name="name" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>email</th>
                                <td>
                                    <input name="email" type="email" class="form-control" value="{{$data->email}}" />
                                </td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>
                                    <input name="password" type="password" class="form-control" value="{{$data->password}}" />
                                </td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>
                                    <input name="mobile" type="text" class="form-control" value="{{$data->mobile}}" />
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <input type="file" name="photo">
                                    <input name="prev_pic" type="hidden" class="form-control" value="{{$data->photo}}" />
                                    <img width="100px" src="{{asset('storage/app'.$data->photo)}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <textarea name="address" type="text" class="form-control">{{$data->address}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Update" class="btn btn-primary">
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