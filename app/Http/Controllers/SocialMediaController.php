<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Models\SocialMediaProperty;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Log;
class SocialMediaController extends Controller
{
    //


    public function social_media()
    {
        $socailMT = SocialMedia::all();
        return view('admin.socialmedia', ['page' => 'Social Media','script' => 'socialmedia.js','socailMT' => $socailMT]);
    }
    public function social_media_property()
    {
        $socailMT = SocialMedia::query()
            ->where('status','=',1)
            ->get();
        $socialmediaproperty = SocialMediaProperty::query()->with(['social_media'])->get();
        return view('admin.socialmediaproperty', ['page' => 'Social Media Property', 'script' => 'socialmediaproperty.js', 'socailMT' => $socailMT, 'socialmediaproperty'=>$socialmediaproperty]);
    }

    public function add_social_media(Request $request)
    {
        try {
            $res = SocialMedia::query()->create([
                "account_name"=>$request->name,
                "status"=>1,
                "cuid"=>0
            ]);
            return Response::json( "Data Saved", 200 );
        }catch (Exception $e)
        {
            return Response::json( $e, 400 );
        }
    }

    public function add_social_media_property(Request $request)
    {
        try {
            $res = SocialMediaProperty::query()->create([
                "social_media_account_id"=>$request->account,
                "property_name"=>$request->property_name,
                "status"=>1,
                "cuid"=>0
            ]);
            return Response::json( "Data Saved", 200 );
        }catch (Exception $e)
        {
            return Response::json( $e, 400 );
        }
    }
    public function get_social_media_property($id)
    {
        try {
            $result = SocialMediaProperty::query()->where('social_media_account_id','=',$id)->get();
            if (count($result)>0)
            {
                return Response::json( $result, 200 );
            }
            else
            {
                return Response::json( [], 200 );
            }

        }catch (Exception $e)
        {
            return Response::json( [], 400 );
        }
    }
}
