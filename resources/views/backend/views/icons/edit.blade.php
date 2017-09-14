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
        <li><a href="{{ route('sliders.index') }}">Icons</a></li>
        <li class="active">Update </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Icons Update</h2>
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
            {!! Form::model($icon, ['files' => true, 'method' => 'PATCH', 'route' => ['icons.update', $icon->id]]) !!}
                <div class="panel-body">
                  <div class="form-horizontal">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                           <label for="title" class="control-label col-md-2">Title</label>
                           <div class="col-md-9">
                             {!! Form::text('title', null, ['class' => 'form-control']) !!}
                           </div>  
                        </div>
                        <div class="form-group">
                           <label for="title" class="control-label col-md-2">Links</label>
                           <div class="col-md-9">
                             {!! Form::text('links', null, ['class' => 'form-control']) !!}
                           </div>  
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width:150px; height:150px;">
                            <?php $image = !is_null($icon->image) ? $icon->image : 'uploads/icons/default.png' ?>
                            {!! Html::image('/uploads/icons/' . $image, $icon->title, ['class' => 'media-object', 'width' => 150, 'height' => 150]) !!}
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