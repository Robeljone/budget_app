<?php

namespace App\Http\Controllers;

use App\Models\JobSections;
use App\Models\Organizations;
use Illuminate\Http\Request;

class IndentRequestesController extends Controller
{
    public function index()
    {
        $data = JobSections::query()->where('status','=',1)->get();
        $organizations = Organizations::query()->where('status','=',1)->get();
        return view('admin.indents.index', ['page' => 'Indent Request','data' => $data, 'script' => 'jobs_section.js']);
    }
}
