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
        <li class="active">View</li>
      </ol>
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
              <h2>Roles Detail</h2>
            </div>
            <div class="pull-right">
              <a class="btn btn-success" href="{{route('roles.index')}}"><span class="glyphicon glyphicon-plus"></span> Back</a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <h3><strong>Name:</strong>
                    {{ $role->name }}</h3>
                 </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <h3><strong>Display Name:</strong>
                    {{ $role->display_name }}</h3>
                 </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <h3><strong>Description:</strong>
                    {{ $role->description }}</h3>
                 </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <h3><strong>Permissions:</strong>
                    @if (!empty($permissions))
                       @forelse ($permissions as $v)
                         <label class="label label-success">{{$v->name}}</label>
                       @empty
                         <label for="">Not Permission</label>   
                      @endforelse
                    @endif</h3>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>  
@endsection