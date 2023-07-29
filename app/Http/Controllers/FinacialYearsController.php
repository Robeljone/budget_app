<?php

namespace App\Http\Controllers;

use App\Models\FinacialYears;
use Illuminate\Http\Request;

class FinacialYearsController extends Controller
{
    public function index(){
        $data = FinacialYears::query()->where('status','=',1)->get();
        return view('admin.financial.financial_year', ['page' => 'Financial Year','data' => $data, 'script' => 'financial_year.js']);
    }
    public function save_financial_year(Request $request)
    {
        FinacialYears::query()->create([
            'financial_year'=>$request->name,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>1,
            'cuid'=>1,
            'uuid'=>1
        ]);
    }
}
