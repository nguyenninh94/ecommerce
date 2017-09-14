@extends('backend.layouts.app')
@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="active">Create </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Categories Create</h2>
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

            <form action="{{ route('categories.store') }}" role="form" method="POST">
              {{ csrf_field() }}
                  <div class="form-group">
                     <select name="parent_id" class="form-control">
                       <option value="0">Select Category</option>
                       @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @if ($category->children->count() > 0)
                               @foreach ($category->children as $child)
                                  <option value="{{ $child->id }}">--- {{ $child->name }}</option>
                               @endforeach
                           @endif
                       @endforeach
                     </select>
                  </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>  
                <div class="box-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>  
@endsection