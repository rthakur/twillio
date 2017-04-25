@extends('layouts.dashboard')
@section('content')
 <!-- Page content -->
 <div id="page-content-wrapper" class="">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Lead List</li>
      </ol>
     <div class="page-content inset">
         <div class="row">
                  <table class="table table-striped custab">
                  <thead>
                  <a href="/lead/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new Lead</a>
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  @if($leads)
                  @foreach($leads as $key=>$lead)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $lead->name }}</td>
                            <td class="text-center"><a href="/lead/delete/{{$lead->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                  @endforeach
                  @endif
                  </table>
         </div>
         </a>
     </div>
 </div>
@endsection
