@extends('backend.layouts.app')
@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="active">Create </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Roles Create</h2>
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

            {!! Form::open(array('route' => 'roles.store','method'=>'POST', 'role' => 'form')) !!}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="display name">Display Name:</label>
                        {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                    </div>    
                    <div class="form-group">
                        <label for="description">Description:</label>
                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                    </div>
                    <div class="form-group">
                        <label for="permission">Permission:</label>
                        <br/>
                        @foreach($permissions as $value)
                             <label>{{ Form::checkbox('permission[]', $value->id, false) }}
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