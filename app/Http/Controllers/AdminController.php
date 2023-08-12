<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationSocialMediaAccount;
use App\Models\OrganizationSocialMediaAccountProprty;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Response;
use App\Models\Organizations;
use App\Models\User;

class AdminController extends Controller
{
    public function user_management(){
        $users = User::query()->get();
        $organizations = Organizations::query()->where('status','=',1)->get();
        return view('admin.setting.user_management',
            ['page' => 'User Management','script' => 'user_management.js', 'users' => $users,'organizations'=>$organizations]);
    }
    public function add_lead_type(Request $request){
        $newLeaderT = new LeaderType;
        $newLeaderT->name = $request->name;
        if($newLeaderT->save()){
            return Response::json( "Data Saved", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
    }

}
