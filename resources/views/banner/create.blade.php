@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Banner
                <a href="{{url('admin/banner')}}" class="float-right btn btn-success btn-sm">View All</a>
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
                <form action="{{url('admin/banner')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Banner Image</th>
                            <td>
                                <input name="banner_src" type="file" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Alt Text</th>
                            <td>
                                <input name="alt_text" type="text" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Publish Status</th>
                            <td>
                                <input name="publish_status" type="checkbox" class="form-control" />
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