<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\ProfileSocialMedia;
use App\Models\SocialMediaType;
use Session;
use Response;

class HomeController extends Controller
{
    
    public function home(){
        return view('index', ['page' => 'Dashbord']);
    }
    public function myprofile(){
        $profile = UserProfile::where('id', '=', Session::get('pid', 'default'))->first();
        $socailM = ProfileSocialMedia::select('profile_social_media.id','social_media_types.name','profile_social_media.link','social_media_types.icon','social_media_types.id AS tid')->where('pid', '=',Session::get('pid', 'default'))->join('social_media_types', 'profile_social_media.smtid', '=', 'social_media_types.id')->get();
        $socailMT = SocialMediaType::all();
        return view('home.profile', ['page' => 'My Profile','profile' => $profile , 'socailM' => $socailM, 'script' => 'profile.js','socailMT' => $socailMT ]);
    }
    public function add_profile_social(Request $request){
        $slink = $request->slink;
        $stype = $request->stype;
        $newProfile = new ProfileSocialMedia;
        $newProfile->pid = Session::get('pid', 'default');
        $newProfile->smtid = $stype;
        $newProfile->link = $slink;
        if($newProfile->save()){
            return Response::json( "Data Saved", 200 );
        }else{
            return Response::json( "someting went wrong", 400 );
        }
       
        
    }
    public function changepass(){
        return view('home.pass', ['page' => 'Change Password']);
    }
    public function up_profile_social(Request $request){     
        $psmid = $request->psmid;
        $slink = $request->slink;
        $stype = $request->stype;
        $affected = ProfileSocialMedia::where('id', '=', $psmid)->update(['link' => $slink ,'smtid' => $stype]);
        if($affected){
            return Response::json( "Data Updated", 200 );
        }else{
            return Response::json( "Data is the same or someting went wrong", 400 );
        }
    }
    public function page_not_found(){
        return view('home.404', ['page' => 'Page not Found']);
    }
}
