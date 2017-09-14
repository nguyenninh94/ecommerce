@extends('backend.layouts.app')

@section('style')
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection
 
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
        <li class="active">Index</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
	            <h2>Categories Management</h2>
	          </div>
	          <div class="pull-right">
              @permission('category-create')
	            <a class="btn btn-success" href="{{route('categories.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New Categories</a>
              @endpermission
	          </div>
            </div>
            @if ($message = Session::get('success'))
		          <div class="alert alert-success">
			           <p>{{ $message }}</p>
		          </div>
	          @endif

            @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                 <p>{{ $message }}</p>
              </div>
            @endif

            <!-- /.box-header -->
            <div class="box-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
	                <tr>
                    <th>No</th>
				            <th>Name</th>
	                  <th>Slug</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
				            <th width="280px">Action</th>
	                </tr>
                </thead>
                <tbody> 
    				    @forelse ($categories as $key => $cat)
        					 <tr>
                    <td>{{ $cat->id }}</td>
        						<td>{{ $cat->name }}</td>
        				    <td>{{ $cat->slug }}</td>
                    <td>
                    @if ($cat->status == 'active')
                        <p class="btn btn-success">{{ $cat->status }}</p>
                    @else
                        <p class="btn btn-info">{{ $cat->status }}</p>
                    @endif
                    </td>
                    <td>1 hour ago</td>
                    <td>30 minutes ago</td>
        						<td>
                      @permission('category-update')
        							<a class="btn btn-primary" href="{{route('categories.edit', $cat->id)}}">Edit</a>
                      @endpermission
                      @permission('category-delete')
        							{!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $cat->id], 'style'=>'display:inline', 'id' => 'delete-category']) !!}
        				            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
        				        	{!! Form::close() !!}
                      @endpermission    
        						</td>
        					 </tr>
                    @if ($cat->children->count() > 0)
                     @foreach ($cat->children as $child)
                     <tr>
                      <td>{{ $child->id }}</td>
                      <td>--- {{ $child->name }}</td>
                      <td>{{ $child->slug }}</td>
                      <td>
                      @if ($child->status == 'active')
                        <p class="btn btn-success">{{ $child->status }}</p>
                      @else
                        <p class="btn btn-info">{{ $child->status }}</p>
                      @endif
                      </td>
                      <td>1 hour ago</td>
                      <td>30 minutes ago</td>
                      <td>
                        @permission('category-update')
                        <a class="btn btn-primary" href="{{route('categories.edit', $child->id)}}">Edit</a>
                        @endpermission
                        @permission('category-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $child->id], 'style'=>'display:inline', 'id' => 'delete-category']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
                        {!! Form::close() !!}
                        @endpermission
                      </td>
                     </tr>
                     @endforeach
                    @endif
    					  @empty
    					   <td colspan="6">No Categories</td>
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
                        self.parent("#delete-category").submit();
                        swal("Deleted!","Category deleted", "success");
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
    $('#categories').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection

