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
                    <div class="alert alert-success">
                                My Open Requests
                    </div>
                    <thead>
                    <option value="1">critical</option>
<option value="2">high</option>
<option value="3">medium</option>
<option value="4">low</option>
                        <tr>
                        	<th>No.</th>
    	                    <th>User Request</th>
    	                    <th>Type</th>
    	                    <th>Title</th>
    	                    <th>Start Date</th>
    	                    <th>Status</th>
                            <th>Service Category</th>
                            <th>Priority</th>
                            <th>Caller</th>
                        </tr>
                    </thead>
                    <tbody>
                       	<?php $i=0; ?>
                       	@foreach($open_request as $row)
                       		<tr>
	                         	<th>{{++$i}}</th>
                                <th>{{$row->ref}}</th>
                                <th>{{$row->finalclass}}</th>
                                <th>{{$row->title}}</th>
                                <th>{{$row->start_date}}</th>
                                <th>{{$row->status}}</th>
                                <th>{{$row->servicesubcategory_name}}</th>
                                <th>
                                <?php 
                                    if($row->priority==1){
                                        echo "critical";
                                    }else if($row->priority==2){
                                        echo "high";
                                    }else if($row->priority==3){
                                        echo "medium";
                                    }else{
                                        echo "low";
                                    }
                                ?>
                                    
                                </th>
                                <th>{{$row->caller_id_friendlyname}}</th>
	                       </tr>
                        @endforeach
                    </tbody>
                </table>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <div class="alert alert-success">
                                My Resolved Requests
                    </div>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User Request</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Service Category</th>
                            <th>Priority</th>
                            <th>Caller</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach($resolved_request as $row)
                            <tr>
                                <th>{{++$i}}</th>
                                <th>{{$row->ref}}</th>
                                <th>{{$row->finalclass}}</th>
                                <th>{{$row->title}}</th>
                                <th>{{$row->start_date}}</th>
                                <th>{{$row->status}}</th>
                                <th>{{$row->servicesubcategory_name}}</th>
                                <th>
                                    <?php 
                                    if($row->priority==1){
                                        echo "critical";
                                    }else if($row->priority==2){
                                        echo "high";
                                    }else if($row->priority==3){
                                        echo "medium";
                                    }else{
                                        echo "low";
                                    }
                                ?>
                                    
                                </th>
                                <th>{{$row->caller_id_friendlyname}}</th>
                           </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop