@extends('frontlayout'); 
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Contact Us</h3>
        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>            
        @endif
        <form action="{{url('save-contactus')}}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input name="name" type="text" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input name="email" type="email" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>
                        <input name="subject" type="text" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>
                        <textarea name="msg" class="form-control" row="8"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection