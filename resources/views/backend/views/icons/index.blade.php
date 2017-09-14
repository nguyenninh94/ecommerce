@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Icons
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">ICons</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Icons Management</h2>
	          </div>
	          <div class="pull-right">
	            <a class="btn btn-success" href="{{route('icons.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New Icons</a>
	          </div>
            </div>
            @if ($message = Session::get('success'))
		       <div class="alert alert-success">
			      <p>{{ $message }}</p>
		       </div>
	        @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="icons" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>No</th>
				            <th>Title</th>
                    <th>Links</th>
				            <th>Image</th>
				            <th width="280px">Action</th>
	                </tr>
                </thead>
                <tbody> 
				    @forelse ($icons as $key => $icon)
					<tr>
						<td>{{ $icon->id }}</td>
						<td>{{ $icon->title }}</td>
            <td>{{ $icon->links }}</td>
						<td><img src="{{ url('/uploads/icons/' . $icon->image) }}" style="width:50%; height: 50%;"></td>
						<td>
							<a class="btn btn-primary" href="{{route('icons.edit', $icon->id)}}">Edit</a>
							{!! Form::open(['method' => 'DELETE', 'route' => ['icons.destroy', $icon->id], 'style'=>'display:inline', 'id' => 'delete-icon']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
				        	{!! Form::close() !!}
						</td>
					</tr>
					@empty
					   <td colspan="4">No Icon</td>
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
                        self.parent("#delete-icon").submit();
                        swal("Deleted!","Icon deleted", "success");
                    }
                    else{
                        swal("cancelled","Your role are safe", "error");
                    }
                });
      });
</script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#icons').DataTable({
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

