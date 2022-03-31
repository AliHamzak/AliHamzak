<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\roomType;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = booking::all();
        return view('booking.index',['data'=>$booking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('booking.create',['data'=>$customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'customer_id'=>'required',
                'room_id'=>'required',
                'checkin_date'=>'required',
                'checkout_date'=>'required',
                'total_adult'=>'required',
                'roomprice'=>'required',
            ]);
         
            // $ref  = $request->ref;
            // if ($ref=='front') {
            //     return redirect('booking')->with('success', 'Booking has been created.');
            // }    
            // return redirect('admin/booking/create')->with('success', 'Data has been added.');

            if($request->ref=='front'){
                $sessionData=[
                    'customer_id'=>$request->customer_id,
                    'room_id'=>$request->room_id,
                    'checkin_date'=>$request->checkin_date,
                    'checkout_date'=>$request->checkout_date,
                    'total_adult'=>$request->total_adult,
                    'total_children'=>$request->total_children,
                    'roomprice'=>$request->roomprice,
                    'ref'=>$request->ref
                ];
                session($sessionData);
                \Stripe\Stripe::setApiKey('sk_test_51JKcB7SFjUWoS3CIIaPlxPSREpJYoyPsn5KIhj2CBCM9z23dRUreOUwFq6eXmRYmgXNfxSozplocikiAFe3aX7sK008OH0sqy6');
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                      'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                          'name' => 'T-shirt',
                        ],
                        'unit_amount' => $request->roomprice*100,
                      ],
                      'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => 'http://127.0.0.1:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => 'http://127.0.0.1:8000/booking/fail',
                ]);
                return redirect($session->url);
            }else{
                $data = new booking;
                $data->customer_id = $request->customer_id;
                $data->room_id = $request->room_id;
                $data->checkin_date = $request->checkin_date;
                $data->checkout_date = $request->checkout_date;
                $data->total_adult = $request->total_adult;
                $data->total_childern = $request->total_children;
                    if($request->ref=='front'){
                    $data->ref='front';
                }else{
                    $data->ref='admin';
                }
                $data->save();
                return redirect('admin/booking/create')->with('success','Data has been added.');
            }
            
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = booking::where('id', $id)->delete();
        return redirect('admin/booking')->with('success', 'Data has deleted.');
    }

    function available_room(Request $request, $checkin_date){
        $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");

        $data=[];
        foreach($arooms as $room){
            $roomTypes=roomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);
    }

    function front_booking(){
        return view('front-booking');
    }

    function booking_payment_success(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51JKcB7SFjUWoS3CIIaPlxPSREpJYoyPsn5KIhj2CBCM9z23dRUreOUwFq6eXmRYmgXNfxSozplocikiAFe3aX7sK008OH0sqy6');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $customer = \Stripe\Customer::retrieve($session->customer);
        if($session->payment_status=='paid'){
            $data = new booking;
            $data->customer_id = session('customer_id');
            $data->room_id = session('room_id');
            $data->checkin_date = session('checkin_date');
            $data->checkout_date = session('checkout_date');
            $data->total_adult = session('total_adult');
            $data->total_childern = session('total_children');
            if(session('ref')=='front'){
                $data->ref='front';
            }else{
                $data->ref='admin';
            }
            $data->save();

            return view('booking.success');
        }
    }
    function booking_payment_fail(){
        return view('booking.failure');
    }
}
