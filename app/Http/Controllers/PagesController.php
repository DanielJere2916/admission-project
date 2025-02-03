<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function programpage()
    {
        return view('webpages.programs');
    }
    public function campuspage()
    {
        return view('webpages.campuses');
    }
    public function studentpage()
    {
        return view('webpages.studentlife');
    }
    public function researchpage()
    {
        return view('webpages.research');
    }
        public function contactpage()
    {
        return view('webpages.contact');
    }
}
