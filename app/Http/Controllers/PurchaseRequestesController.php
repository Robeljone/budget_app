<?php

namespace App\Http\Controllers;

use App\Models\JobSections;
use App\Models\Organizations;
use App\Models\PurchaseRequestes;
use Illuminate\Http\Request;

class PurchaseRequestesController extends Controller
{
    public function index(Request $request)
    {
        $data = JobSections::query()->where('status','=',1)->get();
        $organizations = Organizations::query()->where('status','=',1)->get();
        return view('admin.purchase.index', ['page' => 'Purchase Request','data' => $data, 'script' => 'jobs_section.js']);
    }

}
