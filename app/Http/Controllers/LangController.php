<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $lang = $request->language;
        $language = config('app.locale');

        switch ($lang) {
            case 'en':
                $language = 'en';
                break;

            default:
                $language = 'vi';
                break;
        }

        Session::put('locale', $language);

        return redirect()->back();
    }
}
