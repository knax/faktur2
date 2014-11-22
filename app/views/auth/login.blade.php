@extends('layout.main')
@section('content')

<div class="row">
  <div class="col-md-12">
    <h2>Login</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form action="/login" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control"/>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control"/>
      </div>

      <button type="submit" class="btn btn-default pull-right">Submit</button>
    </form>
  </div>
</div>

@stop