@extends('layouts.dashboard')
@section('content')
 <!-- Page content -->
 <div id="page-content-wrapper" class="">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Agent List</li>
      </ol>
     <div class="page-content inset">
         <div class="row">
                  <table class="table table-striped custab">
                  <thead>
                  <a href="/agent/create" class="btn btn-primary pull-right">Add new Agent</a>
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Phone Number</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  @if($agents)
                  @foreach($agents as $key=>$agent)
                          <tr>
                              <td>{{ ++$key }}</td>
                              <td>{{ $agent->name }}</td>
                              <td>{{ $agent->phone_number }}</td>
                              <td class="text-center"><a href="/agent/delete/{{$agent->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                          </tr>
                  @endforeach
                  @endif
                  </table>
         </div>
         </a>
     </div>
 </div>
@endsection
