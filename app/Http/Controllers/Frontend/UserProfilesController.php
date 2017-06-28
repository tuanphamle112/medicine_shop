<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\User;
use App\Helpers\Helper;
use Hash;
use Response;
use Validator;
use Auth;


class UserProfilesController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {

        $option['gender'] = $this->user->getGenderOption();
        $option['permission'] = $this->user->getPermissionOption();

        return view('frontend.user.userProfile', compact(['option']));
    }

    public function editUserInformations(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|min:4|max:30',
            'address' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()
            ->route('frontend.user.profiles')
            ->withErrors($validator);
        }

        $user = User::find(Auth::user()->id);

        $user->fill($request->all());
        $user->save();

        return redirect()->route('frontend.user.profiles');
    }

    public function showUploadAvatar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if( $request->hasFile('image_upload') ) {
            Helper::deleteFile($user->avatar);

            $nameFile = $request->image_upload->hashName();
            $path = $request->file('image_upload')->store(User::PATH_AVATAR, 'uploads');
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->route('frontend.user.profiles');
    }
    public function userChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:4|max:30',
            'confirm_password' => 'required|same:new_password|min:4|max:30',
            ]);

        $user = User::find(Auth::user()->id);

        if ($validator->fails()) {
            $messages = $validator->messages();
            $data['error']['status'] = true;
            $data['error']['old_password'] = $messages->first('old_password');
            $data['error']['new_password'] = $messages->first('new_password');
            $data['error']['confirm_password'] = $messages->first('confirm_password');

            return Response::json($data);
        }

        $data['error']['status'] = false;
        if (!Hash::check($request->old_password, $user->password)) {
            $data['error']['status'] = true;
            $data['error']['old_password'] = __('Old password not correct!');
        } else {
            $user->password = bcrypt($request->new_password);
            $user->save();
            $data['message'] = __('Change password successfully!');
        }

        return Response::json($data);
    }
    public function profileDiffUser($user_id)
    {
        $userProfiles = User::find($user_id);
        $option['gender'] = $this->user->getGenderOption();
        $option['permission'] = $this->user->getPermissionOption();
        
        if(Auth::check())
        {
            if($userProfiles->id == Auth::user()->id)
            {
                return redirect()->route('frontend.user.profiles');
            }
        }
        return view('frontend.user.userProfile',compact([
            'userProfiles',
            'option'
        ]));
    }
}
