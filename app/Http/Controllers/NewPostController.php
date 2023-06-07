<?php

namespace App\Http\Controllers;
use App\Models\NewPost;
use App\Models\OrganizationSocialMediaAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Response;
class NewPostController extends Controller
{
    public function index()
    {
        $post = NewPost::query()
            ->where('status','=',1)
            ->with(['account','postedby','account.soc_media_type','account.orga_name'])
            ->get();
        $account = OrganizationSocialMediaAccount::query()->where('status','=','1')->get();
        return view('admin.new_post', ['page' => 'New Post','script' => 'new_post.js','account'=>$account,'post'=>$post]);
    }

    public function edit_post($id)
    {
        $post = NewPost::query()
            ->where('id','=',$id)
            ->get();
        Log::debug($post);
        $account = OrganizationSocialMediaAccount::query()->where('status','=','1')->get();
        return view('admin.edit_post', ['page' => 'New Post','script' => 'edit_post.js','account'=>$account,'post'=>$post]);
    }

    public function post_new(Request $request)
    {
        Log::debug($request);
//        $res = NewPost::query()->create([
//           "account_id"=>$request->account,
//            "title"=>$request->title,
//            "content"=>$request->cont,
//            "post_link"=>$request->link,
//            "posted_by"=>1,
//            "status"=>1
//        ]);
//        if ($res)
//        {
//            return Response::json( "Data Saved", 200 );
//        }
//        return Response::json( "someting went wrong", 400 );
    }
}
