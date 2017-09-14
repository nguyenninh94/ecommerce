@extends('backend.layouts.app')

@section('style')
  <link ref="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stocks
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Stock </a></li>
        <li class="active">Update </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Stock Create</h2>
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

            {!! Form::model($stock, array('route' => ['stocks.update', $stock->id],'method'=>'POST', 'role' => 'form')) !!}
                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="product"> Product:</label>
                              {!! Form::select('product_id', $products, null, array('placeholder' => 'Select Product', 'class' => 'form-control', 'id' => 'product')) !!}
                           </div> 
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="color"> Color:</label>
                              {!! Form::select('color_id', $colors, null, array('placeholder' => 'Select Color', 'class' => 'form-control', 'id' => 'color')) !!}
                           </div> 
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="discount"> Sizes:</label>
                              {!! Form::select('size_id', $sizes, null, array('placeholder' => 'Select Size', 'class' => 'form-control', 'id' => 'size')) !!}
                           </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                           <label for="title" class="control-label col-md-2">Quantity</label>
                           <div class="col-md-9">
                             {!! Form::text('qty', null, ['class' => 'form-control', 'placeholder' => 'qty']) !!}
                           </div>  
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width:150px; height:150px;">
                            <?php $image = !is_null($stock->image) ? $stock->image : 'uploads/products/default.png' ?>
                            {!! Html::image('/uploads/products/' . $image, $stock->product->name, ['class' => 'media-object', 'width' => 150, 'height' => 150]) !!}
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                          <div class="text-center">
                            <span class="btn-file">
                              <span class="fileinput-new btn btn-success ">Choose Image </span>
                              <span class="fileinput-exists btn btn-info ">Change</span>
                              {!! Form::file('image') !!}
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                        </div>
                      </div>
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

@section('script')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
   <script>
     /*$('#category').select2({
        placeholder : 'Select Categories',
        allowClear: true
     });

     $('#brand').select2({
        placeholder : 'Select Brands',
        allowClear: true
     });

     $('#discount').select2({
        placeholder : 'Select Discount',
        allowClear: true
     });*/
   </script>
@endsection