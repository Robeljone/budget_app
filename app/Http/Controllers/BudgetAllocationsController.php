<?php

namespace App\Http\Controllers;

use App\Models\BudgetAllocations;
use App\Models\FinacialYears;
use App\Models\Organizations;
use Illuminate\Support\Facades\Log;
use Session;
use Response;
use Illuminate\Http\Request;

class BudgetAllocationsController extends Controller
{
    //
    public function index(){
        $data = BudgetAllocations::query()->where('status','=',1)
            ->with(['financial','organization'])
            ->get();
        $financial_year = FinacialYears::query()->where('status','=',1)->get();
        $organizations = Organizations::query()->where('status','=',1)->get();
        return view('admin.financial.budget_allocation', ['page' => 'Budget Allocation',
            'data' => $data,
            'financial_year'=>$financial_year,
            'organization'=>$organizations,
            'script' => 'budget_allocation.js']);
    }
    public function add_budget_allocation(Request $request)
    {
        try {
            $check = BudgetAllocations::query()
                ->where('financial_year','=',$request->f_year)
                ->where('organization_id','=',$request->organization)
                ->get()->toArray();
           if (count($check)>0)
           {
               return Response::json( "Budget Allocation Already Done", 400 );
           }
           else
           {
               $res = BudgetAllocations::query()->create([
                   'financial_year'=>$request->f_year,
                   'budget_amount'=>$request->amount,
                   'organization_id'=>$request->organization,
                   'budget_code'=>$request->budget_code,
                   'status'=>1,
                   'cuid'=>1,
                   'uuid'=>1
               ]);
               return Response::json( "Data Saved", 200 );
           }
        }
        catch (Exception $e)
        {
            Log::debug($e);
            return Response::json( "something went wrong", 400 );
        }
    }
}
