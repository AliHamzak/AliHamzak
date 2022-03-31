@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer
                <a href="{{url('admin/booking/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
            </h6>
        </div>    
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Room No.</th>
                            <th>Room Type</th>
                            <th>CheckIn Date</th>
                            <th>CheckOut Date</th>
                            <th>Ref</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Room No.</th>
                            <th>Room Type</th>
                            <th>CheckIn Date</th>
                            <th>CheckOut Date</th>
                            <th>Ref</th>
                            <th>Action</th>
                        </tr>                    
                    </tfoot>
                    @if($data)
                        @foreach ($data as $d)
                            <tbody>
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->customer->name}}</td>
                                    <td>{{$d->room->title}}</td>
                                    <td>{{$d->room->roomType->title}}</td>
                                    <td>{{$d->checkin_date}}</td>
                                    <td>{{$d->checkout_date}}</td>
                                    <td>{{$d->ref}}</td>
                                    <td>
                                        <a onclick="confirm('Are you sure you want to delete this booking!!')" href="{{url('admin/booking/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@section('scripts')
<link href="{{url('../vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<!-- Page level plugins -->
<script src="{{url('../vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('../vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{url('../js/demo/datatables-demo.js')}}"></script>
@endsection

@endsection