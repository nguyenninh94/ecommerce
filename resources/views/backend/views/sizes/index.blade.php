@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sizes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('sizes.index') }}">Sizes</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Sizes Management</h2>
	          </div>
	          <div class="pull-right">
	            <a class="btn btn-success" href="{{route('sizes.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New Sizes</a>
	          </div>
            </div>
            @if ($message = Session::get('success'))
		       <div class="alert alert-success">
			      <p>{{ $message }}</p>
		       </div>
	        @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="sizes" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>No</th>
				            <th>Name</th>
	                  <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
				            <th width="280px">Action</th>
	                </tr>
                </thead>
                <tbody> 
				    @forelse ($sizes as $key => $size)
					<tr>
						<td>{{ $size->id }}</td>
						<td>{{ $size->name }}</td>
				    <td>
               @if ($size->status == 'active')
                  <p class="btn btn-success">{{ $size->status }}</p>
               @else
                  <p class="btn btn-danger">{{ $size->status }}</p>
               @endif    
            </td>
            <td>1 hour ago</td>
            <td>30 minutes ago</td>
						<td>
							<a class="btn btn-primary" href="{{route('sizes.edit', $size->id)}}">Edit</a>
							{!! Form::open(['method' => 'DELETE', 'route' => ['sizes.destroy', $size->id], 'style'=>'display:inline', 'id' => 'delete-size']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
				        	{!! Form::close() !!}
						</td>
					</tr>
					@empty
					   <td colspan="4">No Size</td>
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
                    text: "You want to delete this role?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        self.parent("#delete-size").submit();
                        swal("Deleted!","Size deleted", "success");
                    }
                    else{
                        swal("cancelled","Your size are safe", "error");
                    }
                });
      });
</script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#sizes').DataTable({
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

