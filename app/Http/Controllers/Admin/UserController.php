<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use App\Helpers\Helper;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $users = $this->user->all();
        $data['users'] = $users;
        return view('admin.user.user-list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.user-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'display_name' => 'required|max:255',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'avatar'    => 'image',
        ]);
       
        $validator->after(function ($validator) {
            $dataRequest = $validator->getData();
            $currentUser = User::where('email', $dataRequest['email'])->first();
            if ($currentUser) {
                $validator->errors()->add('email', __('Sorry, this email already exists!'));
            }
        });

        if ($validator->fails()) {
            return redirect('admin/users/create')
                        ->withErrors($validator)
                        ->withInput($request->input);
        }

        $user = $this->user;
        $user->fill($request->except(['password', 'avatar']));
        $user->password = bcrypt($request->password);
        
        if ($request->hasFile('avatar')) {
            $nameFile = $request->avatar->hashName();
            $path = $request->file('avatar')->store(User::PATH_AVATAR, 'uploads');
            $user->avatar = $path;
        }

        try {
            $user->save();
            $message = __('Add new user :name successfully!', ['name' => $user->display_name]);
            Helper::addMessageFlashSession(__('Success'), $message, 'success');
        } catch (Exception $e){
            Helper::addMessageFlashSession(__('Error'), $e->getMessage(), 'danger');
            return redirect('admin/users/create')->withInput($request->input);
        }

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!$user) return redirect()->route('users.index');
        return view('admin.user.user-detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.user-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|max:255',
            'confirm_password' => 'same:password',
            'avatar'    => 'image',
        ]);
       
        if ($validator->fails()) {
            return redirect('admin/users/'. $user->id .'/edit')
                        ->withErrors($validator)
                        ->withInput($request->input);
        }

        $user->fill($request->except(['password', 'email', 'avatar']));
        if ($request->password){
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            Helper::deleteFile($user->avatar);

            $nameFile = $request->avatar->hashName();
            $path = $request->file('avatar')->store(User::PATH_AVATAR, 'uploads');
            $user->avatar = $path;
        }

        try {
            $user->save();
            $message = __('Edit user :name successfully!', ['name' => $user->display_name]);
            Helper::addMessageFlashSession(__('Success'), $message, 'success');
        } catch (Exception $e){
            Helper::addMessageFlashSession(__('Error'), $e->getMessage(), 'danger');
            return redirect('admin/users/'. $user->id .'/edit')->withInput($request->input);
        }

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user){
            try {
                $user->delete();
                $message = __('Delete user :name successfully!', ['name' => $user->display_name]);
                Helper::deleteFile($user->avatar);
                Helper::addMessageFlashSession(__('Success'), $message, 'success');
            } catch (Exception $e) {
                Helper::addMessageFlashSession(__('Error'), $e->getMessage(), 'danger');
            }
        }
        return redirect()->route('users.index');
    }
}
