@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Staff Data 
                <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">   
                <form action="{{url('admin/staff/'.$data->id.'')}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>
                                <input value="{{$data->full_name}}" name="full_name" type="text" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Select Department</th>
                            <td>
                                <select name="department_id" class="form-control">
                                    <option value="0">-- Select --</option>
                                        @foreach ($department as $dp)
                                            <option @if ($data->id == $dp->id) selected @endif value="{{$dp->id}}">{{$dp->title}}</option>
                                        @endforeach    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input name="photo" type="file" class="form-control">
                                <input type="hidden" value="{{$data->photo}}" name="prev_photo"/>
                                <img src="{{Storage::url($data->photo)}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>
                                <textarea name="bio" class="form-control">{{$data->bio}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input @if ($data->salary_type == 'daily') checked @endif name="salary_type" type="radio" value="daily"> Daily
                                <input @if ($data->salary_type == 'monthly') checked @endif name="salary_type" type="radio" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td>
                                <input value="{{$data->salary_amt}}" name="salary_amt" type="number" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" value="Update">
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