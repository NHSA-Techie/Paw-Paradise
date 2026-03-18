<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Gallary;

use App\Models\Contact;

use App\Notifications\SendEmailNotification;

use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookingApprovedMail;

use App\Mail\BookingRejectedMail;



class Admincontroller extends Controller
{
    // For log in user returning view from blade
    public function index()

    {   
        // meaning if user is log in 
        if(Auth::id()){
            // $usertype =Auth()->user()->usertype;
            $usertype = Auth::user()->usertype;

            if($usertype == 'user')
            {   
                $room = Room::all();
                $gallary = Gallary::all();
                // (PS:using this also when we want to see data in same view during log in* )
                return view('home.index',compact('room','gallary'));
            }
            
            // else if($usertype == 'admin')
            // {
            //     return view('admin.index');
            // }

            else if($usertype == 'admin')
            {
                // compute counts here
                $roomCount    = \App\Models\Room::count();
                $bookingCount = \App\Models\Booking::count();
                $messageCount = \App\Models\Contact::count();
                $adminCount   = \App\Models\User::where('usertype', 'admin')->count();

                // now load the same index that includes admin.body
                return view('admin.index', compact('roomCount', 'bookingCount', 'messageCount', 'adminCount'));
            }

            else{
                return redirect()->back();
            }
        }      

    }
    
    public function home(){
        // get all room data and store in variable
        $room = Room::all();
        //get all data from gallary data for home gallery
        $gallary = Gallary::all();

        //send data to the view while log out*
        return view('home.index',compact('room','gallary'));
    }


    public function create_room(){
        return view('admin.create_room');
    }

    // admin contrller should be able to receive data
    public function add_room(request $request){
        

        // creating a new instance of the Room model
        $data = new Room;

        // come from database table and blade file , left right
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        // $data ->wifi = $request->wifi;
        $data->room_type = $request->type;

        // this image from name create_room.blade.php
        $image=$request->image; 
        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            // this images from database, imaage name is stored in database
            $data->images=$imagename;

        }

        $data-> save();
        // same page
        return redirect()->back();
        
    }

    public function view_room(){
        $data = Room::all();
        // all data will be send to view_room
        return view('admin.view_room',compact('data'));
    }

    public function room_delete($id){

        $data = Room::find($id);
        $data->delete();

        return redirect()->back();

    }

    public function room_update($id)

    {
        $data =Room::find($id);

        return view('admin.update_room',compact('data'));
    }
    public function edit_room(Request $request , $id){
        $data = Room::find($id);

        // database  ---- blade's name

        $data->room_title =$request->title;

        $data->description= $request->description;

        $data->price= $request->price;

        $data->room_type= $request->type;

        $image=$request->image;
        
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            // this images from database, image name is stored in database
            $data->images=$imagename;
        }

        $data->save();

        return redirect()->back();

    }

    

    public function bookings(){
        $data=Booking::all();
        return view('admin.booking',compact('data')); //go to blade
    }

    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data -> delete();
        return redirect()->back();
    }

    

    public function approve_book($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approve';
        $booking->save();

        try {
            Mail::to($booking->email)->send(new BookingApprovedMail($booking));
            return redirect()->back()->with('message', 'Booking approved and email sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Booking approved, but email could not be sent.');
        }
    }
    

    public function reject_book($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        try {
            Mail::to($booking->email)->send(new BookingRejectedMail($booking));
            return redirect()->back()->with('message', 'Booking rejected and email sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Booking rejected, but email could not be sent.');
        }
    }

 
    // -----gallary page for admin -----

    public function view_gallary(){
        
        $gallary = Gallary::all(); //getting gallary data  and storing in variable

        return view('admin.gallary',compact('gallary'));
    }

    public function upload_gallary(Request $request){

        $data = new Gallary;

        $image = $request->image; // name

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            // store image in public folder in gallary folder

            $request->image->move('gallary',$imagename);

            // store in database

            $data->image = $imagename;

            $data->save();

            return redirect()->back();

        }

    }

    public function delete_gallary($id)
    {
        $data= Gallary::find($id);

        $data->delete();

        return redirect()->back();
    }
    
    public function all_messages(){

        $data = Contact::all();
        return view('admin.all_messages',compact('data'));
        
    }
    // this is from all_messages's pg  button

    public function send_mail($id){

        $data =Contact::find($id);

        return view('admin.send_mail',compact('data'));
    }


    public function mail(Request $request, $id)
    {
        $data = Contact::findOrFail($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,
        ];

        try {
            Notification::send($data, new SendEmailNotification($details));
            return redirect()->back()->with('message', 'Email sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Message saved, but email could not be sent on server.');
        }
    }

    public function delete_message($id)
    {
        $data= Contact::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function dashboard()
    {
        $roomCount = \App\Models\Room::count();
        $bookingCount = \App\Models\Booking::count();
        $messageCount = \App\Models\Contact::count();
        $adminCount = \App\Models\User::where('usertype', 'admin')->count();

        return view('admin.index', compact('roomCount', 'bookingCount', 'messageCount', 'adminCount'));
    }
    // from admin check paid or not
    public function mark_paid($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->payment_status !== 'pending_verify') {
            return redirect()->back()->with('message', 'No slip waiting for verification.');
        }

        $booking->payment_status = 'paid';
        $booking->paid_at = now();
        $booking->save();

        return redirect()->back()->with('message', 'Payment verified ✅');
    }

        
}
