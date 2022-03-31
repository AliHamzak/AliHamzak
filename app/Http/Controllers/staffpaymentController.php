<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffPayment;
use App\Models\Department;

class staffpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $staff_id)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staff_id)
    {
        
        $data = StaffPayment::where('staff_id', $staff_id)->get();
        $staff = Staff::find($staff_id);
        return view('staffpayment.index', ['staff_id'=>$staff_id, 'data'=>$data, 'staff'=>$staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($staff_id)
    {
        return view('staffpayment.create', ['staff_id'=>$staff_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staff_id)
    {
        $data = new StaffPayment;
        $data->staff_id = $staff_id;
        $data->amount = $request->amount;
        $data->payment_date = $request->amount_date ;
        $data->save();

        return redirect('admin/staff/payment/'.$staff_id.'/edit')->with('success', 'Data has been added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
