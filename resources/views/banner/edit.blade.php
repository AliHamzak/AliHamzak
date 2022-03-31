@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Banner
                <a href="{{url('admin/banner')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">   
                    <form action="{{url('admin/banner/'.$data->id.'')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <table class="table table-bordered">
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <input type="file" name="banner_src">
                                    <input name="prev_pic" type="hidden" class="form-control" value="{{$data->banner_src}}" />
                                    <img width="100px" src="{{Storage::url($data->banner_src)}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Alt Text</th>
                                <td>
                                    <input name="alt_text" type="text" value="{{$data->alt_text}}" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Publish Status</th>
                                <td>
                                    <input name="publish_status" type="checkbox" value="{{$data->publish_status}}" class="form-control"/>
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