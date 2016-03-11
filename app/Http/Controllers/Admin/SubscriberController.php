<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use Validator;
class SubscriberController extends Controller
{
    

    public function index(Request $request){



    	$subscribers = \App\Subscriber::orderBy('created_at','DESC')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));



    	return view('admin.subscribers.index',compact('subscribers','row_count'));
    }

    public function edit(){

    }

    public function update(){

    }

    public function create(){

    }

    public function store(Request $request){

        $v = Validator::make($request->all(),[
            'email'=>'required | email | unique:subscribers,email'
        ]);

        if($v->fails()){


            return redirect()->back()->withErrors($v,'newsubscriber')->withInput();
        }


        $sub = new \App\Subscriber();

        $sub->email = $request->input('email');

        $sub->unsubscribe_token = md5(time().$request->input('email'));

        $sub->save();

        return redirect()->back()->with('success','Subscriber added');


    }

    public function sendNewsLetter(Request $request){

        // dd($request->all());

        if($request->input('type') == "all"){


            $subscribers = \App\Subscriber::all();
        }

        if($request->input('type') == "selected"){

            $subids = $request->input('subid');

            // dd($subids);



            if(count($subids)){

                $subscribers = \App\Subscriber::Find($subids);

            }
        }



        if($subscribers->count()){


            foreach ($subscribers as $subscriber) {
                // Send Email
                 Mail::send('admin.emails.newsletter.main', ['subscriber' => $subscriber,'content'=>$request->input('content')], function ($m) use ($subscriber,$request) {

                    $m->to($subscriber->email)->subject($request->input('subject','NEWS LETTER'));
                });   
            }



        }

        return redirect()->back()->with('success','Newsletter send successfully');




    }

    public function delete($subid){


        $sub = \App\Subscriber::find($subid);

        if($sub){


            $sub->delete();

            return redirect()->back()->with('success','Subscriber deleted');
        }

        return redirect()->back();
    }


}
