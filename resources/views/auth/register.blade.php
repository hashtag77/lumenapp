@extends('products.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create an account</h2>
        </div>
    </div>
</div>
   
<form action="{{ url('/api/register') }}" method="POST">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <strong>Name:</strong>
        <input type="text" name="name" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <strong>Email:</strong>
        <input type="text" name="email" class="form-control" placeholder="Email">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <strong>Password:</strong>
        <input type="text" name="password" class="form-control" placeholder="Password">
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <strong>Confirm Password:</strong>
        <input type="text" name="password_confirmation" class="form-control" placeholder="Re-enter password">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection