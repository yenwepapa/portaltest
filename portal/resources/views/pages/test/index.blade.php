@extends('templates.main')
@section('content')
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Responsive example <small>Users</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                        <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                    <a href="{{URL::to('test_data/create')}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add New</button></a>
                </p>
                
                <br/>
                <?php if( Session::get('message') ){ ?>
				        <div class="alert alert-success">
					         	<?php echo Session::get('message'); ?>
				        </div>
				<?php } ?>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <span class="hide" id="delete_text">
                    <h4>Are you sure you want to Delete this Test Data ?</h4>
                        <h4>This action can't be undo. </h4>
                </span>
                  <thead>
                    <tr>
                    	<th>No.</th>
	                    <th>Name</th>
	                    <th>Mobile</th>
	                    <th>Address</th>
	                    <th>Introduction</th>
	                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                       	<?php $i=0; ?>
                       	@foreach($test_data as $row)
                       		<tr>
	                         	<td>{{++$i}}</td>
	                         	<td>{{$row->name}}</td>
	                         	<td>{{$row->mobile}}</td>
	                         	<td>{{$row->address}}</td>
	                         	<td>{{$row->introduction}}</td>
	                         	<td>
                                  <!--   <a href="{{ URL::to('test_data/'.$row->id.'/edit/') }}" class="btn btn-success blue tooltips" data-placement="bottom" data-original-title="Edit"><i class="fa fa-eye fa fa-white"></i></a> -->
                                    <a href="{{ URL::to('test_data/'.$row->id.'/edit/') }}" class="btn btn-primary blue tooltips" data-placement="bottom" data-original-title="Edit"><i class="fa fa-pencil fa fa-white"></i></a>

                  					{!! Form::open(array('method' => 'DELETE', 'route' => array('test_data.destroy', $row->id), 'style'=>'display: inline')) !!}
                                        <button type="button" class="btn btn-danger tooltips delete" value="x" data-placement="bottom" data-original-title="Delete" ><i class="fa fa-trash-o fa fa-white"></i></button>
                                    {!! Form::close() !!}
	                         	</td>
	                         </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop