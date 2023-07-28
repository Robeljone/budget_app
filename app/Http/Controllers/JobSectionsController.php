<?php

namespace App\Http\Controllers;

use App\Models\JobSections;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobSectionsController extends Controller
{
    public function index(){
        $data = JobSections::query()->where('status','=',1)->get();
        return view('admin.jobsection.index', ['page' => 'Job Section','data' => $data, 'script' => 'jobs_section.js']);
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
}
