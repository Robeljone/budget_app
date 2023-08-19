<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TelegramPushLink;
use App\Notice;
use Session;
use Response;
class OrganizationsController extends Controller
{
    use Notifiable;
    public function index(){
        $data = Organizations::query()->where('status','=',1)->get();
        return view('admin.setting.organization_setting', ['page' => 'Organizational Setting','data' => $data, 'script' => 'organization_setting.js']);
    }

    public function add_organization(Request $request):JsonResponse
    {
        $newOrgannization = Organizations::query()->create([
            "organization_name"=>$request->name,
            "status"=>1,
            "cuid"=>1,
        ]);
        if($newOrgannization->save()){
            $this->notify(new TelegramPushLink());
            return Response::json( "Data Saved", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
    }
    public function edit_organization(Request $request,$id):JsonResponse
    {
        $newOrgannization = Organizations::query()->where('id','=',$id)->update([
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
