@extends('layouts.dashboard')
@section('content')
 <!-- Page content -->
 <div id="page-content-wrapper" class="">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Lead List</li>
      </ol>
     <div class="page-content inset">
       @if(Session::has('success'))
       <div class="alert alert-success">
        <strong>Success!</strong> {{ Session::get('success')}}
      </div>
      @endif
         <div class="row">
                  <table class="table table-striped custab">
                  <thead>
                  <a href="/lead/create" class="btn btn-primary pull-right">Add new Lead</a>
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
                            <td class="text-center"><button class="btn btn-success btn-sm assign-agent" data-toggle="modal" data-target="#myModal"  data-id="{{$lead->id}}"> Send Mail</button> | <a href="/lead/delete/{{$lead->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?');"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                  @endforeach
                  @endif
                  </table>
         </div>
         </a>
     </div>
 </div>
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Lead</h4>
      </div>
      <div class="modal-body">
        <form action="/lead/assign" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="leadId" id="leadId">
          <div class="form-group">
            <label for="sel1">Select Agent : </label>
            <select class="form-control" name="agentId">
              @foreach($agents as $agent)
              <option value="{{$agent->id}}">{{ $agent->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="Message">Message : </label>
            <textarea  name="message" class="form-control" maxlength="160"></textarea>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success">Send</button>
      </div>
    </form>
    </div>

  </div>
</div>
@endsection


@section('extra-scripts')
<script>
$('.assign-agent').click(function(){
  document.getElementById('leadId').value = $(this).data('id');
});
</script>
@endsection
