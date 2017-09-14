@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Colors
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('colors.index') }}">Colors</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Colors Management</h2>
	          </div>
	          <div class="pull-right">
	            <a class="btn btn-success" href="{{route('colors.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New Colors</a>
	          </div>
            </div>
            @if ($message = Session::get('success'))
		       <div class="alert alert-success">
			      <p>{{ $message }}</p>
		       </div>
	        @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="colors" class="table table-bordered table-striped">
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
				    @forelse ($colors as $key => $color)
					<tr>
						<td>{{ $color->id }}</td>
						<td>{{ $color->name }}</td>
				    <td>
               @if ($color->status == 'active')
                  <p class="btn btn-success">{{ $color->status }}</p>
               @else
                  <p class="btn btn-danger">{{ $color->status }}</p>
               @endif    
            </td>
            <td>1 hour ago</td>
            <td>30 minutes ago</td>
						<td>
							<a class="btn btn-primary" href="{{route('colors.edit', $color->id)}}">Edit</a>
							{!! Form::open(['method' => 'DELETE', 'route' => ['colors.destroy', $color->id], 'style'=>'display:inline', 'id' => 'delete-color']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
				        	{!! Form::close() !!}
						</td>
					</tr>
					@empty
					   <td colspan="4">No Color</td>
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
                        self.parent("#delete-color").submit();
                        swal("Deleted!","Color deleted", "success");
                    }
                    else{
                        swal("cancelled","Your color are safe", "error");
                    }
                });
      });
</script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#colors').DataTable({
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

