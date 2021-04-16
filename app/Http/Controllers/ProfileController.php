<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class ProfileController extends Controller
{
    //for profile view
    public function index()
    {
        //auth id is used for fetch the data for logged in user
        $auth_id = Auth::user()->id;
        $user = User::with( 'profile')->where('id', $auth_id)->first();
        return view('user.profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
     //if get request hit user go on view page if post request hit user will go for store data
        if($request->isMethod('get'))
        {
            return view('user.profile');
        }
        else
        {
            $id = $request->id;
            if ($request->file('image'))
            {
                $new_name= Storage::disk('avatars')->putFile('', $request->image);
                $update_profile['image'] = $new_name;
            }

            //for Update user table data
            $update_user['name'] = $request->name;

            if($request->password!=null){
                $update_user['password'] = Hash::make($request->password);

            }
            //For Update user profile data
            $update_profile['address'] = $request->address;
            $update_profile['phone_number'] = $request->phone_number;
            $update_profile['user_id'] = $id;


            $user_data = User::where('id', $id)->update($update_user);


            $profile_data = Profile::where('user_id', $id)->update($update_profile);
            if($profile_data==0)
            {
                $update_profile['user_id']= $id;
                $profile_data = Profile::insert($update_profile);
            }

            return back()->with('message', 'Profile updated successfully.');
        }

    }
}

