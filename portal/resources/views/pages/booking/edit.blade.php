@extends('templates.main')
@section('content')
<script src="{{URL::to('js/datepicker.min.js')}}"></script>
<script type="text/javascript">
            $(document).ready(function() {
              $('.datepicker').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
              })
            });
          </script>

  <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Booking <small>edit</small></h2>
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
                  <br />
                  {!! Form::model($booking, array('method' => 'PUT', 'route'=> array('booking.update', $booking->id),  'class'=>'form-horizontal')) !!} 
                    <div class="form-group @if ($errors->has('room_id')) has-error @endif">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Room Name</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="room_id" class="form-control">
                          <?php $room=DB::table('room')->get(); ?>
                          <option>Choose Room</option>
                          @foreach($room as $row)
                            <option value="{{$row->id}}" <?php echo ($row->id == $booking->room_id )? 'selected' : '' ; ?>>{{$row->name}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('room_id'))<span class="help-inline"> 
                        Rom field is required
                        </span>@endif
                      </div>
                    </div>
                    
                    <div class="form-group @if ($errors->has('start_date')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12 datepicker" name="start_date" value="{!!date('m/d/Y',$booking->start_date)!!}">
                        @if ($errors->has('start_date'))<span class="help-inline"> {!!$errors->first('start_date')!!}</span>@endif
                      </div>
                    </div>
                    <div class="form-group @if ($errors->has('start_time')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_time">Start Time
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="start_time" class="form-control">
                            <option>Choose Start Time</option>
                            <?php for ($i=1; $i <=24 ; $i++) { ?>
                                <option value="{{$i}}" <?php echo ($i==$booking->start_time)? 'selected':''; ?>>{{$i}}</option>
                           <?php } ?>
                        </select>
                        @if ($errors->has('start_time'))<span class="help-inline"> {!!$errors->first('start_time')!!}</span>@endif
                      </div>
                    </div>
                    <div class="form-group @if ($errors->has('end_date')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12 datepicker" for="End Date">End Date
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12 datepicker" name="end_date" value="{!!date('m/d/Y',$booking->end_date)!!}">
                        @if ($errors->has('end_date'))<span class="help-inline"> {!!$errors->first('end_date')!!}</span>@endif
                      </div>
                    </div>
                    <div class="form-group @if ($errors->has('end_time')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_time">End Time
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="end_time" class="form-control">
                            <option>Choose End Time</option>
                            <?php for ($i=1; $i <=24 ; $i++) { ?>
                                <option value="{{$i}}" <?php echo ($i==$booking->end_time)? 'selected':''; ?>>{{$i}}</option>
                           <?php } ?>
                        </select>
                        @if ($errors->has('end_time'))<span class="help-inline"> {!!$errors->first('end_time')!!}</span>@endif
                      </div>
                    </div>
                    <div class="form-group @if ($errors->has('purpose')) has-error @endif">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Purpose</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control col-md-7 col-xs-12" name="purpose">{{$booking->purpose}}</textarea>
                        @if ($errors->has('purpose'))<span class="help-inline"> {!!$errors->first('purpose')!!}</span>@endif
                      </div>
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                    </div>

                  {!!Form::close()!!}
                </div>
              </div>
        </div>
    </div>
@stop