<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();
        return view('customer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
        ]);
     
        $imgpath = $request->file('photo')->store('public/imgs');
     
        $data =new Customer;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = sha1($request->password);
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->photo= $imgpath;
        $data->save();

        $ref=$request->ref;
        if($ref=='front'){
            return redirect('registers')->with('success', 'Data has been saved.');
        }

        return redirect('admin/customer/create')->with('success', 'Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customer::where('id', $id)->get();
        return view('customer.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::find($id); 
        return view('customer.edit', ['data' => $data]);

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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $imgpath = $request->file('photo')->store('public/imgs');
        }else{
            $imgpath = request()->prev_pic;
        }
        
        $data = Customer::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = sha1($request->password);
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->photo= $imgpath;
        $data->save();

        return redirect('admin/customer/'.$id.'/edit')->with('success', 'Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id', $id)->delete();
        return redirect('admin/customer')->with('success', 'Data has deleted.');
    }

    public function logins(){
        return view('front-login');
    }

    public function customer_logins(Request $request){
        $email = $request->email;
        $password = sha1($request->password);
        $detail=Customer::where(['email'=>$email, 'password'=>$password])->count();
        if($detail>0){
            $detail=Customer::where(['email'=>$email, 'password'=>$password])->get();
            session(['customerlogin'=>true, 'data'=>$detail]);
            return redirect('/homes');
        }else{
            return redirect('/logins')->with('error','invalid email/pasaword!!');
        }
    }

    public function registers(){
        return view('registers');
    }

    public function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('/logins');
    }
}
