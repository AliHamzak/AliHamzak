@extends('frontlayout'); 
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Register</h3>
        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <form action="{{url('admin/customer')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Name <span class="text-danger">*</span></th>
                    <td><input required type="text" name="name" class="form-control"></td>
                </tr>
                <tr>
                    <th>Email <span class="text-danger">*</span></th>
                    <td><input required type="email" name="email" class="form-control"></td>
                </tr>
                <tr>
                    <th>Password <span class="text-danger">*</span></th>
                    <td><input required type="password" name="password" class="form-control"></td>
                </tr>
                <tr>
                    <th>Mobile <span class="text-danger">*</span></th>
                    <td><input required type="number" name="mobile" class="form-control"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea type="text" name="address" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input type="file" name="photo" class="form-control"></td>
                </tr>
                <tr>
                    <input type="hidden" name="ref" value="front">
                    <td colspan="2"><input type="submit" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection