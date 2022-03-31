@extends('frontlayout'); 
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Register</h3>
        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>            
    @endif
        <form action="{{url('customer/logins')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Email <span class="text-danger">*</span></th>
                    <td><input required type="email" name="email" class="form-control"></td>
                </tr>
                <tr>
                    <th>Password <span class="text-danger">*</span></th>
                    <td><input required type="password" name="password" class="form-control"></td>
                </tr>
                <tr>
                    <input type="hidden" name="ref" value="front">
                    <td colspan="2"><input type="submit" value="Login" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection