<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Booking;


class HomeController extends Controller
{
    //
    public function room_details($id)
    {
        $room= Room::find($id);
        return view('home.room_details',compact('room'));
    }

    public function add_booking(Request $request,$id){

        $request->validate ([
            'startDate'=>'required|date',
            'endDate'=>'required|date|after:startDate',

        ]);


        $data = new Booking;
        $data->room_id= $id;
        $data->name= $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;


        
        $startDate= $request->startDate;
        $endDate= $request->endDate;

        $isBooked = Booking::where('room_id',$id)
        ->where('start_date', '<=',$endDate)
        ->where('end_date', '>=',$startDate)->exists();


        if($isBooked)
        {
            return redirect()->back()->with('message','Room is already Booked please try different date');

        }


        else
        {
        $data->start_date= $request->startDate;
        $data->end_date= $request->endDate;
        $data->save();
        return redirect()->back()->with('message','Room Booked  Successfully');

        }
    }

}
