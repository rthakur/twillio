@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Agent</a></li>
  <li class="breadcrumb-item active">create</li>
</ol>
<div class="page-content inset">
<form class="form-horizontal" action="/agent/store" method="post">
    {{  csrf_field() }}
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Name">Name</label>
      <div class="col-md-4">
      <input  name="name" type="text" placeholder="Name" class="form-control input-md">
      @if($errors->has('name'))
      <span>{{ $errors->first('name')}}</span>
      @endif
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Phone">Phone</label>
      <div class="col-md-4">
      <input  name="phone_number" type="text" placeholder="Phone" class="form-control input-md">
      @if($errors->has('phone_number'))
      <span>{{ $errors->first('phone_number')}}</span>
      @endif
      </div>
    </div>
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="create"></label>
      <div class="col-md-4">
        <button class="btn btn-success">Create</button>
      </div>
    </div>
</form>
</div>
@endsection
