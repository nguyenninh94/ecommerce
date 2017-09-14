@extends('backend.layouts.app')
@section('style')
   <style>
      .fileinput .thumbnail, .thumbnail img {
          border-radius: 50%;
      }
   </style>
@endsection

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Icons
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('icons.index') }}">Icons</a></li>
        <li class="active">Create </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Icons Create</h2>
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
           <div class="panel panel-default">
            {!! Form::open(array('route' => 'icons.store','method'=>'POST', 'role' => 'form', 'files' => true)) !!}
                <div class="panel-body">
                  <div class="form-horizontal">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                           <label for="title" class="control-label col-md-2">Title</label>
                           <div class="col-md-9">
                             {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                           </div>  
                        </div>
                        <div class="form-group">
                           <label for="links" class="control-label col-md-2">Links</label>
                           <div class="col-md-9">
                             {!! Form::text('links', null, ['class' => 'form-control', 'placeholder' => 'links']) !!}
                           </div>  
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width:150px; height:150px;">
                            <img src="http://placehold.it/150x150" alt="image">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                          <div class="text-center">
                            <span class="btn btn-default btn-file">
                              <span class="fileinput-new">Choose Image </span>
                              <span class="fileinput-exists">Change</span>
                              {!! Form::file('image') !!}
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>  
@endsection