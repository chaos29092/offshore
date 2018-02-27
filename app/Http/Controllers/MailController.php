<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Mail;
use TCG\Voyager\Models\Page;
use App\Models\Order;

class MailController extends Controller
{

    public function submit(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
        ]);

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone =$request->phone;
//        $order->subject =$request->subject;
        $order->message =$request->message;
        $order->url =$request->url;

        $order->save();

        Mail::to('chaos29092@gmail.com')->send(new OrderShipped($order));

        return redirect('/submit_ok');
    }

    public function submit_ok()
    {
        $page = Page::find(9);
        return view('submit_ok',compact('page'));
    }

}
