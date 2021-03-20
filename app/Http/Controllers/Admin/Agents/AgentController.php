<?php

namespace App\Http\Controllers\Admin\Agents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function Agents()
    {
    	$agents = DB::table('users')->get();
    	return view('admin.agents.Agents',compact('agents'));
    }

    public function DeleteAgent($id)
    {
        $image = DB::table('users')->where('id',$id)->first();
        $agent_img = $image->image;
        unlink($agent_img);

        DB::table('users')->where('id',$id)->delete();
        $notification=array(
             'messege'=>'Agent Successfully Deleted',
             'alert-type'=>'error'
                   );
        return Redirect()->back()->with($notification);
    }

    public function ViewAgent($id)
    {
        $view = DB::table('users')->where('id',$id)->first();
        return view('admin.agents.ShowAgent',compact('view'));
    }


}
