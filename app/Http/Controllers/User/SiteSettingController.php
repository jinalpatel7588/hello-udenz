<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function privacyPolicy()
    {
        return view('pages.user.profile.edit');
    }
    public function patientPrivacyPolicy()
    {
        return view('pages.user.profile.edit');
    }
    public function socialPolicy()
    {
        return view('pages.user.profile.edit');
    }
    public function dentistPrivacyPolicy()
    {
        return view('pages.user.profile.edit');
    }
    public function GdprTermsAndConditions()
    {
        return view('pages.user.profile.edit');
    }
    public function helloTermsAndConditions()
    {
        return view('pages.user.profile.edit');
    }
    public function EnvironmentalAndSocialPolicy()
    {
        return view('pages.user.profile.edit');
    }


}
