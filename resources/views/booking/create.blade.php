@extends('layout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Booking
                <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
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
                <form action="{{url('admin/booking')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Customer <span>*</span></th>
                            <td>
                                <select class="form-control" name="customer_id">
                                    <option value="0">-- Select --</option>
                                    @foreach ($data as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>ChechIn Date</th>
                            <td>
                                <input name="checkin_date" type="date" class="form-control checkin_date" />
                            </td>
                        </tr>
                        <tr>
                            <th>ChechOut Date</th>
                            <td>
                                <input name="checkout_date" type="date" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Available Rooms</th>
                            <td>
                                <select class="form-control room-list" name="room_id">
                    
                                </select>
                                <p>Price: <span class="show-room-price"></span></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Adults</th>
                            <td>
                                <input name="total_adult" type="text" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Total Children</th>
                            <td>
                                <input name="total_children" type="text" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="roomprice" class="room-price" value="">
                                <input type="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function(){
        $('.checkin_date').on('blur', function(){
        var _checkindate=$(this).val();
            $.ajax({
                url: "{{url('admin/booking')}}/available_rooms/"+_checkindate,
                dataType:'json',
                    beforeSend:function(){
                        $('.room-list').html('<option>--- Loading ---</option>')
                    },
                    success:function(res){
                        var _html='';
                        $.each(res.data, function(index,row){
                            _html+='<option data-price = "'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                        });
                        $(".room-list").html(_html);
                        var _selectedPrice = $(".room-list").find('option:selected').attr('data-price');
                       $(".room-price").val(_selectedPrice);
                       $(".show-room-price").text(_selectedPrice);
                    }
                });
            });
            $(document).on("change",".room-list",function(){
                        var _selectedPrice = $(this).find('option:selected').attr('data-price');
                       $(".room-price").val(_selectedPrice);
                       $(".show-room-price").text(_selectedPrice);
                    });
        });
</script>
@endsection

<!-- /.container-fluid -->
@endsection