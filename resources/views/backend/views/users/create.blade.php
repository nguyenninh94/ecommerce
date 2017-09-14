@extends('backend.layouts.app')
@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users.index') }}">Users</a></li>
        <li class="active">Create </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Users Create</h2>
              </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- /.box-header -->

            {!! Form::open(array('route' => 'users.store','method'=>'POST', 'role' => 'form')) !!}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="display name">Email:</label>
                        {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>    
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        {!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Password Confirmation:</label>
                        {!! Form::password('password_confirmation', null, array('placeholder' => 'Password confirmation','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        {!! Form::checkbox('gender', 0) !!}Female
                        {!! Form::checkbox('gender', 1) !!}Male
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <br/>
                        @foreach($roles as $value)
                             <label>{{ Form::checkbox('role[]', $value->id, false) }}
                            {{ $value->name }}</label>
                             <br/>
                        @endforeach
                   </div>
                   <div class="box-footer">
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
            {!! Form::close() !!}
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>  
@endsection