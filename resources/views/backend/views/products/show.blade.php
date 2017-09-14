@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
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
        <li><a href="{{ route('stocks.index') }}">Stocks</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Stocks Management</h2>
	          </div>
	          <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('stocks.create') }}"><span class="glyphicon glyphicon-plus"></span> Create New Stocks</a>
	          </div>
            </div>
            @if ($message = Session::get('success'))
		       <div class="alert alert-success">
			      <p>{{ $message }}</p>
		       </div>
	        @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="stocks" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>No</th>
                    <th>Name</th>
	                  <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Color</th>
				            <th width="280px">Action</th>
	                </tr>
                </thead>
          <tbody> 
          @forelse ($stocks s $stock)
					<tr>
						<td>{{ $product->id }}</td>
            <td>{{ $stock->name }}</td>
				    <td><span>$</span>{{ $sproduct->price }}</td>
            <td>{{ $stock->qty }}</td>
            <td>
              <img src="{{ asset('uploads/products/' . $stock->image) }}" style="width:50px, height:50px;" alt="">
            </td>
            <td>{{ $stock->size->name }}</td>
            <td>
               @if ($stock->color->name )
               <p style="color:{{ $stock->color->name  }};">{{ $stock->color->name }}</p>
               @endif
            </td> 
						<td>
							<a class="btn btn-primary" href="{{ route('stocks.edit', $stock->id) }}">Edit</a>
							{!! Form::open(['method' => 'DELETE', 'route' => ['stocks.destroy', $stock->id], 'style'=>'display:inline', 'id' => 'delete-stock']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
				        	{!! Form::close() !!}
						</td>
					</tr>
          @empty
             <p>No stock vailable!</p>
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
                    text: "You want to delete this stock?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        self.parent("#delete-stock").submit();
                        swal("Deleted!","Stock deleted", "success");
                    }
                    else{
                        swal("cancelled","Your stock are safe", "error");
                    }
                });
      });
</script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#stocks').DataTable({
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
