@extends('backend.layouts.app')
@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sizes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('sizes.index') }}">Sizes</a></li>
        <li class="active">Create </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Sizes Update</h2>
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

            {!! Form::model($size, array('route' => ['sizes.update', $size->id],'method'=>'PATCH', 'role' => 'form')) !!}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      {!! Form::select('status', ['active' => 'Active', 'private' => 'Private'], null, ['placeholder' => 'Pick a Status...', 'class' => 'form-control']) !!}
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