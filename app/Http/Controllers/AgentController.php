<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Agent;

class AgentController extends Controller
{
    public function index()
    {
      $agents = Agent::all();
      return view('agent.list',compact('agents'));
    }
    public function create()
    {
      return view('agent.create');
    }

    public function store(Request $request)
    {
      $validator = \Validator::make($request->all(),[
          'name' => 'required',
          'phone_number' => 'numeric|unique:agents'
      ]);

      if($validator->fails())
        return redirect::back()->withErrors($validator)->withInput();

        $agent = new Agent;
        $agent->name = $request->name;
        $agent->phone_number = $request->phone_number;
        $agent->save();

        return redirect('/agent');
    }

    public function destroy($id)
    {
      $agent = Agent::find($id);
      $agent->delete();

      return redirect('/');
    }
}
