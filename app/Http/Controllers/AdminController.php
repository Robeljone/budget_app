<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Response;
use App\Models\LeaderType;
use App\Models\UserProfile;
use App\Models\SocialMediaType;
use App\Models\ProfileSocialMedia;
use App\Models\User;

class AdminController extends Controller
{
    public function leaders_type(){
        $leaderTs = LeaderType::get();
        return view('admin.lType', ['page' => 'leaders Type Setting','script' => 'leadertype.js','leaderTs' => $leaderTs]);
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
    public function leaders_profile(){
        $leaderTs = LeaderType::get();
        $socailMT = SocialMediaType::all();
        return view('admin.leaderPro', ['page' => 'leader Profile','script' => 'leaderpro.js','leaderTs' => $leaderTs,'socailMT' => $socailMT]);
    }
    public function add_lead(Request $request){
        $profile = new UserProfile;
        $profile->ownName = $request->oname;
        $profile->fatherName = $request->fname;
        $profile->gFatherName = $request->gfname;
        $profile->mobNum = $request->phone;
        $profile->address = $request->address;
        $profile->title = $request->title;
        $profile->district = $request->woreda;
        if($profile->save()){
            return Response::json( "Data Saved", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
    }
    public function lead_filter(Request $request){
        $profiles = UserProfile::where('title', '=',  $request->title)->where('district','=',$request->woreda)->get();
        return Response::json( $profiles , 200 );
    }
    public function leader_social_mideas(string $id){
        $profile = UserProfile::find($id);
        $socailMT = SocialMediaType::all();
        $socials = ProfileSocialMedia::select('profile_social_media.id','social_media_types.name','profile_social_media.link','social_media_types.icon','social_media_types.id AS tid')->where('pid', '=',$id)->join('social_media_types', 'profile_social_media.smtid', '=', 'social_media_types.id')->get();
        return view('admin.leaderSocial', ['page' => 'leader Profile','script' => 'leadersocial.js','socials' => $socials, 'profile' => $profile,'pid' => $id,'socailMT' => $socailMT]);
    }
    public function add_lead_social(Request $request){
        $social = new ProfileSocialMedia;
        $social->pid = $request->pid;
        $social->smtid = $request->stype;
        $social->link = $request->slink;
        if($social->save()){
            return Response::json( "Data Saved", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
    }

    public function org_profile()
    {
        $leaderTs = LeaderType::get();
        $socailMT = SocialMedia::query()->where('status','=',1)->get();
        $user = User::query()->where('userRoll','=',1)->get();
        return view('admin.organization_profile', ['page' => 'Organization Social Media Profile','script' => 'organizationprofile.js','leaderTs' => $leaderTs,'socailMT' => $socailMT,'user'=>$user]);
    }
}
