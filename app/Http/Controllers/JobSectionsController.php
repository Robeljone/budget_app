<?php

namespace App\Http\Controllers;

use App\Models\BudgetAllocations;
use App\Models\JobSections;
use App\Models\Organizations;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Session;
use Response;
use Illuminate\Support\Facades\Log;

class JobSectionsController extends Controller
{
    public function index(){
        $data = JobSections::query()->where('status','=',1)
            ->with(['organ'])
            ->get();
        $organizations = Organizations::query()
            ->where('status','=',1)
            ->get();
        return view('admin.jobsection.index', ['page' => 'Job Section','data' => $data,'organization' => $organizations, 'script' => 'jobs_section.js']);
    }

    public function add_organization(Request $request):JsonResponse
    {
        $newOrgannization = JobSections::query()->create([
            "organization_name"=>$request->name,
            "status"=>1,
            "cuid"=>1,
        ]);
        if($newOrgannization->save()){
            return Response::json( "Data Saved", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
    }
    public function edit_organization(Request $request,$id):JsonResponse
    {
        $newOrgannization = JobSections::query()->where('id','=',$id)->update([
            "organization_name"=>$request->name,
            "status"=>1,
            "uuid"=>1,
        ]);
        if($newOrgannization->save()){
            return Response::json( "Data Edited", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
    }
    public function create_job_section(Request $request):JsonResponse
    {
        $balance = BudgetAllocations::query()->where('organization_id','=',$request->orga)->get();
        if ($request->budget>$balance[0]->budget_amount)
        {
            return Response::json( "Can't Allocate this amount of Money", 400 );
        }
        else
        {
            $buget_codes = JobSections::query()
                ->where('organization_id','=',$request->orga)
                ->where('budget_code','like','%'.$balance[0]->budget_code.'%')
                ->orderByDesc('budget_code')
                ->get()->toArray();
            if(count($buget_codes)>0)
            {
                $increment = substr($buget_codes[0]['budget_code'],'-4');
                $final_ref = $balance[0]->budget_code.'_'.str_pad((int)$increment+1,'4','0',STR_PAD_LEFT);
                $save = JobSections::query()->create([
                    "organization_id"=>$request->orga,
                    "allocated_budget"=>$request->budget,
                    "budget_code"=>$final_ref,
                    "job_section_name"=>$request->job,
                    "cuid"=>1,
                    "uuid"=>1,
                    "status"=>1
                ]);
                $remaing_balance = $balance[0]->budget_amount-$request->budget;
                BudgetAllocations::query()->where('organization_id','=',$request->orga)->update([
                    "budget_amount"=>$remaing_balance
                ]);
            }
            else
            {
                $num ="0001";
                $final_refrence = substr($balance[0]->budget_code, 0, 3).'_'.$num;
                $save = JobSections::query()->create([
                    "organization_id"=>$request->orga,
                    "allocated_budget"=>$request->budget,
                    "budget_code"=>$final_refrence,
                    "job_section_name"=>$request->job,
                    "cuid"=>1,
                    "uuid"=>1,
                    "status"=>1
                ]);
                $remaing_balance = $balance[0]->budget_amount-$request->budget;
                BudgetAllocations::query()->where('organization_id','=',$request->orga)->update([
                    "budget_amount"=>$remaing_balance
                ]);
            }
            return Response::json( "Budget Allocated success", 200 );
        }
    }
}
