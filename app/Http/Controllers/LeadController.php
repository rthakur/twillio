<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Lead;
use App\Agent;
use App\LeadAgent;
use Twilio;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['agents'] = Agent::all();
        $data['leads'] = Lead::all();
        return view ('lead/list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('lead.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = \Validator::make($request->all(),[
          'name' => 'required|unique:leads',
          'phone_number' => 'required',
      ]);

      if($validator->fails())
        return redirect::back()->withErrors($validator)->withInput();

        $lead = new Lead;
        $lead->name = $request->name;
        $lead->phone_number = $request->phone_number;
        $lead->save();

        return redirect('/lead');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::find($id);
        $lead->delete();
        return redirect::back();

    }

    public function AssignLead(Request $request)
    {
	    $lead = Lead::find($request->leadId);
      if(! $request->message || !$lead) return back();

        $assignlead = LeadAgent::firstOrNew(['lead_id' => $request->leadId,'agent_id' => $request->agentId]);
        $assignlead->message = $request->message;
        $assignlead->type = 0;

        try{
          $assignlead->status = 1;
          $assignlead->save();
          Twilio::message($lead->phone_number, $request->message);
          return redirect::back()->with('success','Message successfully Sent!');
        }catch(\Exception $e){
          return redirect::back()->with('error',$e->getMessage());
        }
    }
}
