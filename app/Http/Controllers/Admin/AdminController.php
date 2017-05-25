<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Helpers\Helper;
use App\InforWebsite;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function setup(Request $request)
    {
        $setup = InforWebsite::where('position', InforWebsite::POSITION_MAIN)->first();
        if (!$setup) {
            $setup = new InforWebsite;
        }

        if ($request->isMethod('get')) {
            return view('admin.dashboard.setup', ['setup' => $setup]);
        }

        if ($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'slogan' => 'required|max:255',
                'logo' => 'image',
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin.setup')
                    ->withErrors($validator)
                    ->withInput($request->input);
            }

            $setup->fill($request->except(['logo']));
            $setup->position = InforWebsite::POSITION_MAIN;

            $linkKeywords = is_array($request->keyword) ? $request->keyword : [];
            $linkValues = is_array($request->link) ? $request->link : [];
            $linkCommucications = [];

            foreach ($linkKeywords as $key => $linkKeyword) {
                $linkCommucications[$linkKeyword] = $linkValues[$key];
            }
            $setup->link_communications = json_encode($linkCommucications);

            if ($request->hasFile('logo')) {
                Helper::deleteFile($setup->logo);
                $request->logo->hashName();
                $path = $request->file('logo')->store('uploads/logos/', 'uploads');
                $setup->logo = $path;
            }

            try {
                $setup->save();
                $message = __('Save successfully!');
                Helper::addMessageFlashSession(__('Success'), $message, 'success');
            } catch (Exception $e){
                Helper::addMessageFlashSession(__('Error'), $e->getMessage(), 'danger');
            }
        }
        
        return redirect()->route('admin.setup');
    }
}
