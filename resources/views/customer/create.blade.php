@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer
                <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
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
                <form action="{{url('admin/customer')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>
                                <input name="name" type="text" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>email</th>
                            <td>
                                <input name="email" type="email" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>
                                <input name="password" type="password" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Moblie</th>
                            <td>
                                <input name="mobile" type="mobile" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>photo</th>
                            <td>
                                <input name="photo" type="file" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>address</th>
                            <td>
                                <textarea name="address" type="address" class="form-control"></textarea>
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