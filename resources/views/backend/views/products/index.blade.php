@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
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
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Products Management</h2>
	          </div>
	          <div class="pull-right">
	            <a class="btn btn-success" href="{{route('products.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New Products</a>
	          </div>
            </div>
            @if ($message = Session::get('success'))
		       <div class="alert alert-success">
			      <p>{{ $message }}</p>
		       </div>
	        @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="products" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>No</th>
				            <th>Name</th>
	                  <th>Price</th>
                    <th>Date Begin Discount</th>
                    <th>Date End Discount</th>
                    <th>Categories</th>
                    <th>Brands</th>
                    <th>Discount</th>
                    <th>Created At</th>
                    <th>Updated At</th>
				            <th width="280px">Action</th>
	                </tr>
                </thead>
                <tbody> 
				    @forelse ($products as $key => $product)
					<tr>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
				    <td><span>$</span>{{ $product->price }}</td>
            <td>
              @if ($product->discount->value !== 0)
                <p style="color:red;font-weight: bold">{{ $product->date_begin_discount }}</p>
              @else
                <p style="color:red; font-weight: bold">Not Available</p>
              @endif
            </td>
            <td>
              @if ($product->discount->value !== 0)
                <p style="color:red;font-weight: bold">{{ $product->date_end_discount }}</p>
              @else
                <p style="color:red; font-weight: bold">Not Available</p>
              @endif
            </td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->brand->name }}</td>
            <td>{{ $product->discount->value }}<span>%</span></td>
            <td>1 hour ago</td>
            <td>30 minutes ago</td>
						<td>
							<a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Edit</a>
              <a class="btn btn-default" href="{{route('products.show', $product->id)}}">View</a>
							{!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id], 'style'=>'display:inline', 'id' => 'delete-product']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
				        	{!! Form::close() !!}
						</td>
					</tr>
					@empty
					   <td colspan="4">No Brand</td>
					@endforelse
				</tbody>	
              </table>
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

@section('script')
<script>
      $(document).on('click', '#delete-btn', function(e) {
         e.preventDefault();
         var self = $(this);
         swal({
                    title: "Are you sure?",
                    text: "You want to delete this product?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        self.parent("#delete-product").submit();
                        swal("Deleted!","Product deleted", "success");
                    }
                    else{
                        swal("cancelled","Your product are safe", "error");
                    }
                });
      });
</script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#product').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection

