@extends('templates.main')
@section('content')
	<link href="{{URL::to('daycalendar/lib/fullcalendar.min.css')}}" rel='stylesheet' />
	<link href="{{URL::to('daycalendar/scheduler.min.css')}}" rel='stylesheet' />
	<script src="{{URL::to('daycalendar/lib/moment.min.js')}}"></script>
	<script src="{{URL::to('daycalendar/lib/fullcalendar.min.js')}}"></script>
	<script src="{{URL::to('daycalendar/scheduler.min.js')}}"></script>
	<script>

	$(function() { // document ready
		var booking=<?php echo $booking ?>;

		$('#calendar').fullCalendar({
			now: "<?php echo date('Y-m-d'); ?>",
			selectable: true,
			selectHelper: true,
			editable: true,
			aspectRatio: 1.8,
			scrollTime: '00:00',
			header: {
				left: 'today prev,next',
				center: 'title',
				right: 'timelineDay'
			},
			defaultView: 'timelineDay',
			
			resourceAreaWidth: '20%',
			resourceColumns: [
				
				{
					labelText: 'Room',
					field: 'title'
				}
			],
			// <?php echo "resources:" . $room . ",";  ?>
			// // <?php echo "events:" . $booking . ",";  ?>
			// events: [
			// { id: '1', resourceId: '1', start: '2016-05-07T02:00:00', end: '2016-05-07T07:00:00', title: 'event 1' },
			// // 	{"id":1,"resourceId":"1","start":"2016-05-25 11:00:00","end":"2016-05-25 16:00:00","title":"Moe from Demo from 11 to 16"},
			// // 	{"id":2,"resourceId":"1","start":"2016-05-25 18:00:00","end":"2016-05-25 20:00:00","title":"Moe from Demo from 18 to 20"}
			// // 	// { id: '1', resourceId: 'b', start: '2016-05-07 02:00:00', end: '2016-05-07 07:00:00', title: 'event 1' },
			// // 	// { id: '2', resourceId: 'c', start: '2016-05-07 05:00:00', end: '2016-05-07 22:00:00', title: 'event 2' },
			// // 	// { id: '4', resourceId: 'e', start: '2016-05-07 03:00:00', end: '2016-05-07 08:00:00', title: 'event 4' },
			// // 	// { id: '5', resourceId: 'f', start: '2016-05-07 00:30:00', end: '2016-05-07 02:30:00', title: 'event 5' }
			//  ]
			<?php echo "resources:" . $room . ",";  ?>
			<?php echo "events:" . $booking. ","; ?>
			select: function(start, end, jsEvent, view, resource) {
				window.location.href = "{{URL::to('booking/create')}}";
			},
			eventClick: function(calEvent, jsEvent, view) {

		        window.location.href = "{{URL::to('/booking')}}"+'/'+calEvent.id+'/edit';

		    }
			// events: [
			// {"id":1,"resourceId":"1","start":"2016-05-25T11:00:00","end":"2016-05-25T16:00:00","title":"Moe from Demo from 11 to 16"},
			// {"id":2,"resourceId":"1","start":"2016-05-25T18:00:00","end":"2016-05-25T20:00:00","title":"Moe from Demo from 18 to 20"}
			// {"id":2,"resourceId":"1","start":"2016-05-25 18:00:00","end":"2016-05-25 20:00:00","title":"Moe from Demo from 18 to 20"},
			// 	{ id: '1', resourceId: '1', start: '2016-05-07T02:00:00', end: '2016-05-07T07:00:00', title: 'event 1' },
			// 	{ id: '2', resourceId: '2', start: '2016-05-07T05:00:00', end: '2016-05-07T22:00:00', title: 'event 2' },
			// 	{ id: '3', resourceId: '3', start: '2016-05-06', end: '2016-05-08', title: 'event 3' },
			// 	{ id: '4', resourceId: '4', start: '2016-05-07T03:00:00', end: '2016-05-07T08:00:00', title: 'event 4' },
			// 	{ id: '5', resourceId: '4', start: '2016-05-07T00:30:00', end: '2016-05-07T02:30:00', title: 'event 5' }
			// ]

		});

	
	});

</script>
	<div class="">
        <div class="page-title">
            <div class="title_left">
            <?php //echo "resources:" . $room . ",";  ?> <br>
			<?php //echo "events:[" . $booking."]" ; die();?>
              <h3>
                                    Calendar
                                    <small>
                                        Click to add/edit events
                                    </small>
                                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Calendar Events <small>Sessions</small></h2>
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

                  <div id='calendar'></div>

                </div>
              </div>
            </div>
          </div>
        </div>
@stop