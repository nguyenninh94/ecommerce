@extends('backend.layouts.app')

@section('style')
  <link ref="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Products</a></li>
        <li class="active">Create </li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <h2>Products Create</h2>
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

            {!! Form::model($product, array('route' => ['products.update', $product->id],'method'=>'PATCH', 'role' => 'form')) !!}
                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="categories"> Categories:</label>
                              {!! Form::select('cat_id', $categories, null, array( 'class' => 'form-control', 'id' => 'category')) !!}
                           </div> 
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="brands"> Brands:</label>
                              {!! Form::select('brand_id', $brands, null, array('class' => 'form-control', 'id' => 'brand')) !!}
                           </div> 
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="discount"> Discount:</label>
                              {!! Form::select('discount_id', $discounts, null, array('class' => 'form-control', 'id' => 'discount')) !!}
                           </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="address"> Description:</label>
                        {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="address"> Introduce:</label>
                        {!! Form::textarea('introduce', null, array('placeholder' => 'Introduce','class' => 'form-control')) !!}
                    </div> 
                    <div class="form-group">
                        <label for="price"> Price:</label>
                        {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                    </div> 
                    <div class="form-group">
                        <label for="address"> Date Begin:</label>
                        {!! Form::date('date_begin_discount', null, array('placeholder' => 'Date Begin','class' => 'form-control')) !!}
                    </div> 
                    <div class="form-group">
                        <label for="address"> Date End:</label>
                        {!! Form::date('date_end_discount', null, array('placeholder' => 'Date End','class' => 'form-control')) !!}
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