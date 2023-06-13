<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use Illuminate\Http\Request;

class subscriptionController extends Controller
{
    public function create(Request $request){
        // dd($request->email);

        $this->validate($request, [
            'email'      =>  'required',
        ]);
        $subscription = Subscription::where('email' , $request->email)->first();
        if($subscription){
            return 1;
        }
        else{
            $subscription = new Subscription();
            $subscription->email = $request->email;
            $subscription->save();

            if($subscription){
                return 1;
            }
            else{
                return 0;
            }
        }
    }
}
