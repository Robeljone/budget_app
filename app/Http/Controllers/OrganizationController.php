<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationSocialMediaAccount;
use App\Models\OrganizationSocialMediaAccountProprty;
use App\Models\SocialMedia;
use App\Models\SocialMediaProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Response;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socailMT = Organization::all();
        return view('admin.organization', ['page' => 'Organization Setting','script' => 'organization.js','socailMT' => $socailMT]);
    }


    public function new_post()
    {
        $account = OrganizationSocialMediaAccount::query()->where('status','=','1')->get();
        return view('admin.new_post', ['page' => 'New Post','script' => 'new_post.js','account'=>$account]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
         $res = Organization::query()->create([
             "organization_name"=>$request->name,
             "woreda"=>$request->woreda,
             "status"=>1
         ]);
         if ($res)
         {
             return Response::json( "Data Saved", 200 );
         }
            return Response::json( "someting went wrong", 400 );
        }catch (Exception $e)
        {
            return Response::json($e, 400 );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit_org(Request $request)
    {
        try {
            Log::debug($request);
//            $update_account = OrganizationSocialMediaAccount::query()->where('id','=',$request->account_id)->update([
//                "organization"=>$request->organization,
//                "social_media_manager"=>$request->account_manager,
//                "social_media_account_name"=>$request->accountname,
//            ]);
//            if($update_account)
//            {
//                $res = OrganizationSocialMediaAccountProprty::query()->where('organization_social_media_account_id','=',$request->account_id)->get();
//                if ($res)
//                {
//                    foreach ($res as $key)
//                    {
//                        OrganizationSocialMediaAccountProprty::query()->create([
//                            "organization_social_media_account_id"=>$update_account['id'],
//                            "parameter"=>$key['property_name'],
//                            "value"=>$request[$key['property_name']],
//                            "status"=>"1"]);
//                    }
//                }
//
//            }
            return Response::json( "Data Save", 200 );
        }
        catch (Exception $e)
        {
            return Response::json( "Error on save data", 400 );
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
