@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payment
                <a href="{{url('admin/staff/payment/'.$staff_id.'/edit')}}" class="float-right btn btn-success btn-sm">Add New Payment</a>
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
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                        </tr>                    
                    </tfoot>
                    @if($data)
                        @foreach ($data as $d)
                            <tbody>
                                <tr>
                                    <td>{{$d->staff_id}}</td>
                                    <td>{{$d->amount}}</td>
                                    <td>{{$d->payment_date}}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to delete this data')" href="{{url('admin/staff/payment/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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