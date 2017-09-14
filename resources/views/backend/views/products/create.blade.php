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

            {!! Form::open(array('route' => 'products.store','method'=>'POST', 'role' => 'form')) !!}
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
                        {!! Form::textarea('introduce', null, array('placeholder' => 'Introduce','class' => 'form-control introduce')) !!}
                    </div> 
                    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                    <script>
                      var editor_config = {
                        path_absolute : "/",
                        selector: "textarea.introduce",
                        plugins: [
                          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                          "searchreplace wordcount visualblocks visualchars code fullscreen",
                          "insertdatetime media nonbreaking save table contextmenu directionality",
                          "emoticons template paste textcolor colorpicker textpattern"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                        relative_urls: false,
                        file_browser_callback : function(field_name, url, type, win) {
                          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                          if (type == 'image') {
                            cmsURL = cmsURL + "&type=Images";
                          } else {
                            cmsURL = cmsURL + "&type=Files";
                          }

                          tinyMCE.activeEditor.windowManager.open({
                            file : cmsURL,
                            title : 'Filemanager',
                            width : x * 0.8,
                            height : y * 0.8,
                            resizable : "yes",
                            close_previous : "no"
                          });
                        }
                      };

                      tinymce.init(editor_config);
                    </script>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <label for="price"> Price:</label>
                               {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                            </div> 
                        </div>                       
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="material"> Material:</label>
                              {!! Form::text('material', null, array('placeholder' => 'Material','class' => 'form-control')) !!}
                          </div>
                        </div>
                     </div>   
                    <div class="row" id="date">
                        <div class="col-md-6">
                            <div class="form-group">
                               <label for="address"> Date Begin:</label>
                               {!! Form::date('date_begin_discount', null, array('placeholder' => 'Date Begin','class' => 'form-control')) !!}
                            </div>
                        </div>                       
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="address"> Date End:</label>
                               {!! Form::date('date_end_discount', null, array('placeholder' => 'Date End','class' => 'form-control')) !!}
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
     $(function() {
        $('#discount').click(function() {
           var discount = $('#discount').val();
           if (discount == 8) {
              $('#date').hide();
           }
        });
     });
   </script>
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