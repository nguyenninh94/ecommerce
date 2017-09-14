@extends('backend.layouts.app')
@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ trans('app.brands') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</a></li>
        <li><a href="{{ route('permissions.index') }}">{{ trans('app.brands') }}</a></li>
        <li class="active">{{ trans('app.createSubmit') }} </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>{{ trans('app.brandCreate') }}</h2>
              </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('app.error') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- /.box-header -->

            {!! Form::open(array('route' => 'brands.store','method'=>'POST', 'role' => 'form')) !!}
                    <div class="form-group">
                        <label for="name">{{ trans('app.name') }}:</label>
                        {!! Form::text('name', null, array('placeholder' => "{{ trans('app.name') }}",'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="address"> {{ trans('app.address') }}:</label>
                        {!! Form::text('address', null, array('placeholder' => "{{ trans('app.address') }}",'class' => 'form-control')) !!}
                    </div>    
                    <div class="form-group">
                        <label for="phone"> {{ trans('app.phone') }}:</label>
                        {!! Form::text('phone', null, array('placeholder' => "{{ trans('app.phone') }}",'class' => 'form-control')) !!}
                    </div>   
                <div class="box-footer">
                   <button type="submit" class="btn btn-primary">{{ trans('app.createSubmit') }}</button>
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