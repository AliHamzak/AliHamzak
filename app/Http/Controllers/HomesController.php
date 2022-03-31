<?php

namespace App\Http\Controllers;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use APP\Models\RoomtypeImg;
use App\Models\roomType;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\banner;
use App\Models\Customer;

class HomesController extends Controller
{
    public function home(){
        $services = Service::all();
        $roomtypes = RoomType::all();
        $testimonial = Testimonial::all();
        $banner = banner::where('publish_status', 'on')->get();
        return view('homes', ['roomtype'=> $roomtypes, 'service'=> $services, 'testimonial'=>$testimonial, 'banner'=>$banner]);
    }

    public function service_detail($id){
        $services = Service::find($id);
        return view('servicedetail', ['service'=> $services]);
    }

    public function add_testimonial(){
        return view('add-testimonial');
    }

    public function save_testimonial(Request $request){
        $customerID = session('data')[0]->id;
        $data = new Testimonial;
        $data->customer_id = $customerID;
        $data->testi_cont = $request->testi_cont;
        $data->save();

        return redirect('customer/add-testimonial')->with('success', 'Data has been added.');
    }
}
