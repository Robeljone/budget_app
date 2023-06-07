<?php

namespace App\Http\Controllers;

use App\Models\OrganizationSocialMediaAccount;
use App\Models\OrganizationSocialMediaAccountProprty;
use App\Models\SocialMediaProperty;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\ProfileSocialMedia;
use App\Models\SocialMediaType;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\LinesOfCode\LinesOfCode;
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
    public function add_account(Request $request)
    {
        try {
            $save_account = OrganizationSocialMediaAccount::query()->create([
                "social_media_type"=>$request->social_media,
                "organization"=>$request->organization,
                "social_media_manager"=>$request->account_manager,
                "social_media_account_name"=>$request->accountname,
                "status"=>1
            ]);
            if($save_account)
            {
                $res = SocialMediaProperty::query()->where('social_media_account_id','=',$request->social_media)->get();
                if ($res)
                {
                    foreach ($res as $key)
                    {
                        OrganizationSocialMediaAccountProprty::query()->create([
                            "organization_social_media_account_id"=>$save_account['id'],
                            "parameter"=>$key['property_name'],
                            "value"=>$request[$key['property_name']],
                            "status"=>"1"]);
                    }
                }

            }
            return Response::json( "Data Save", 200 );
        }
        catch (Exception $e)
        {
            return Response::json( "Error on save data", 400 );
        }
    }

    public function page_not_found(){
        return view('home.404', ['page' => 'Page not Found']);
    }
}
