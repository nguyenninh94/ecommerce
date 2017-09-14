@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Discount
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('discounts.index') }}">Discount</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Discount Management</h2>
	          </div>
	          <div class="pull-right">
	            <a class="btn btn-success" href="{{route('discounts.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New Discount</a>
	          </div>
            </div>
            @if ($message = Session::get('success'))
		       <div class="alert alert-success">
			      <p>{{ $message }}</p>
		       </div>
	        @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="discounts" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>No</th>
				            <th>Name</th>
	                  <th>Value</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
				            <th width="280px">Action</th>
	                </tr>
                </thead>
                <tbody> 
				    @forelse ($discounts as $key => $discount)
					<tr>
						<td>{{ $discount->id }}</td>
						<td>{{ $discount->name }}</td>
				    <td>{{ $discount->value }} <span>%</span></td>
            <td>
              @if ($discount->status == 'active')
                 <p class="btn btn-success">{{ $discount->status }}</p>
              @else
                 <p class="btn btn-danger">{{ $discount->status }}}</p>
              @endif
            </td>
            <td>1 hour ago</td>
            <td>30 minutes ago</td>
						<td>
							<a class="btn btn-primary" href="{{route('discounts.edit', $discount->id)}}">Edit</a>
							{!! Form::open(['method' => 'DELETE', 'route' => ['discounts.destroy', $discount->id], 'style'=>'display:inline', 'id' => 'delete-discount']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
				        	{!! Form::close() !!}
						</td>
					</tr>
					@empty
					   <td colspan="4">No Discount</td>
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
                    text: "You want to delete this discount?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        self.parent("#delete-discount").submit();
                        swal("Deleted!","Discount deleted", "success");
                    }
                    else{
                        swal("cancelled","Your discount are safe", "error");
                    }
                });
      });
</script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#discounts').DataTable({
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

