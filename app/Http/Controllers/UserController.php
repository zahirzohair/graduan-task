<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   function index(){

    return view('dashboards.users.index');
   }

   function profile(){
       return view('dashboards.users.profile');
   }

    function updateInfo(Request $request){
       $user = Auth::user();
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {
                $current_password = $user->password;
                $user->name = $request_data['name'];
                if (isset($request_data['avatar'])) {
                    //dd($request->avatar->getClientOriginalName());
                    $filename = $request->avatar->getClientOriginalName();
                    $request->avatar->storeAs('images',$filename,'public');
                    Auth()->user()->update(['avatar'=>$filename]);
                }


                if (!empty($request_data['current_password'])){
                    if(Hash::check($request_data['current_password'], $current_password))
                    {
                        //$user_id = Auth::User()->id;
                        //$obj_user = User::find($user_id);
                        $user->password = Hash::make($request_data['password']);

                        //return view('dashboards.users.profile');
                    }
                    else
                    {
                        $error = array('current-password' => 'Please enter correct current password');
                        return response()->json(array('error' => $error), 400);
                    }
                }
                $user->save();
                return view('dashboards.users.profile');
            }
        }
        else
        {
            return redirect()->to('/');
        }

       //return view('dashboards.users.profile');
    }
   function settings(){
       return view('dashboards.users.settings');
   }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            //'current_password.required' => 'Please enter current password',
            //'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            //'current_password' => 'required',
            //'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'same:password',
            'password_confirmation' => 'same:password',
        ], $messages);

        return $validator;
    }
}
