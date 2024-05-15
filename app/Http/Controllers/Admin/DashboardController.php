<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class DashboardController extends AdminController
{
    public function index(Request $request)
    {
        return view('admin.dashboard');
    }

    public function changeLanguage(Request $request)
    {
        if (! in_array($request->language, array_keys(config('admin.languages_name')))) {

            $notification = [
                'msg' => 'This operation cannot be performed',
                'status' => 0,
            ];
    
            return redirect()->route('dashboard.index')
                            ->with($notification);
        }

        $lang = $request->language ?? config('app.locale');

        App::setLocale($lang);
        session()->put('language', $lang);

        $notification = [
            'msg' => 'Language Changed successfully !!!',
            'status' => 1,
        ];

        return redirect()->back()->with($notification);
    }
}
