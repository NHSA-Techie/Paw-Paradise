<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;
use App\Models\Gallary;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function room_details($id){

        $room = Room::find($id);
        return view('home.room_details',compact('room'));

    }
    public function add_booking(Request $request,$id){

        $request->validate([
            'startDate' =>'required|date',
            'endDate' =>'date|after:startDate',
        ]);

        $data = new Booking;

        $data->room_id = $id;

        $data->name =$request->name;

        $data->email =$request->email;

        $data->phone =$request->phone;


        //Booking date check if already booked or not on that date


        $startDate =$request->startDate;

        $endDate =$request->endDate;

        $isBooked = Booking::where('room_id', $id)
        ->whereIn('status', ['waiting', 'approve'])
        ->where('start_date', '<=', $endDate)
        ->where('end_date', '>=', $startDate)
        ->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message','This room is already booked please try different date');
        }
        else
        {
            $data->start_date =$request->startDate;

            $data->end_date = $request->endDate;

            $data->save();

            return redirect()->back()->with('message','Success Booking');
        }

            // $data->start_date =$request->startDate;

            // $data->end_Date =$request->endDate;

            // $data->save();

            // return redirect()->back()->with('message','Success Booking');
        

    }

    public function contact(Request $request){

        $contact = new Contact;
        // database     - balde's name
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('message','Message sent Successfully');

    }
    // 

    public function our_rooms(){

        $room = Room::all();
        return view('home.our_rooms',compact('room'));
    }

    public function hotel_gallery(){

        $gallary = Gallary::all();
        return view('home.hotel_gallery',compact('gallary'));
    }

    // public function contact_us(){

    //     return view('home.contact_us');
    // }
    public function about(){

        return view('home.hotel_about');
        
    }

    public function my_bookings(){
    $bookings = Booking::where('email', Auth::user()->email)
                        ->latest()
                        ->get();

    return view('home.my_bookings', compact('bookings'));
    }




    // payment

    public function pay_booking($id){
    $booking = Booking::with('room')->findOrFail($id);

    // Only booking owner can access
    if ($booking->email !== Auth::user()->email) {
        abort(403);
    }

    // Only after approval
    if ($booking->status !== 'approve') {
        return redirect()->back()->with('message', 'Payment is available only after approval.');
    }

    return view('home.pay_booking', compact('booking'));}

    public function upload_slip(Request $request, $id)
    {
        $request->validate([
            'slip' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $booking = Booking::with('room')->findOrFail($id);

        // Only booking owner can upload
        if ($booking->email !== Auth::user()->email) {
            abort(403);
        }

        // Only after approval
        if ($booking->status !== 'approve') {
            return redirect()->back()->with('message', 'Payment is available only after approval.');
        }

        // Save slip to public/slips
        $file = $request->file('slip');
        $filename = 'slip_' . $booking->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('slips'), $filename);

        $booking->payment_slip = $filename;
        $booking->payment_status = 'pending_verify';
        $booking->payment_method = 'promptpay';
        $booking->save();

        return redirect()->back()->with('message', 'Slip uploaded! Waiting for admin verification.');
    }


        
}

