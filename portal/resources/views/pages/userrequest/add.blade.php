@extends('templates.main')
@section('content')

	<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Test Data <small>create new</small></h2>
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
                  {!!Form::open(array('url'=>'/test_data', 'class'=>'form-horizontal form-label-left'))!!}
                  {{csrf_token()}};

                   <div class="form-group @if ($errors->has('name')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Service</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control service_id" name="service_id" rel="{{URL::to('userrequest/get_service_sub_cat')}}">
                          <option>Choose Service</option>
                          @foreach($service as $row)
                          <?php $service_data=DB::table('service')->where('id',$row->service_id)->first(); ?>
                              <option value="{{$row->service_id}}">{{$service_data->name}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('name'))<span class="help-inline"> {!!$errors->first('name')!!}</span>@endif
                      </div>
                    </div>

                    <div class="form-group @if ($errors->has('sub_id')) has-error @endif sub_id">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Service Sub Category</label>
                            * </span>
                      </label>
                      <div class="col-md-4">
                          <select name="sub_id" class="form-control" id="sub_id">
                              <option value="">Select Service Sub Category</option>
                          </select>
                          @foreach($errors->get('sub_id') as $error)
                                  <span class="help-inline"> {{ "Service Sub category name is required." }}</span>
                          @endforeach
                      </div>
                    </div>

                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="name">
                        @if ($errors->has('name'))<span class="help-inline"> {!!$errors->first('name')!!}</span>@endif
                      </div>
                    </div>
                    <div class="form-group @if ($errors->has('mobile')) has-error @endif">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mobile
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="mobile" class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('mobile'))<span class="help-inline"> {!!$errors->first('mobile')!!}</span>@endif
                      </div>
                    </div>
                    <div class="form-group @if ($errors->has('address')) has-error @endif">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control col-md-7 col-xs-12" name="address"></textarea>
                        @if ($errors->has('address'))<span class="help-inline"> {!!$errors->first('address')!!}</span>@endif
                      </div>
                    </div>

                    <div class="form-group @if ($errors->has('introduction')) has-error @endif">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Introduction</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control col-md-7 col-xs-12" name="introduction"></textarea>
                      </div>
                    </div>
                   
                    <!-- <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                      </div>
                    </div> -->
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  {!!Form::close()!!}
                </div>
              </div>
        </div>
    </div>
<script type="text/javascript">
  $(function(){
    var token = $('meta[name="token"]').attr('content');
    alert(token);
      $('.service_id').change(function(){
        $('sub_id').css('display','');
        var service_id=$(this).val();
          $.post($(this).attr('rel'),{token,token,service_id,service_id},function(data){
            var service_obj=$.parseJSON(data);
            var select="";
            for(var i=0;i<category_obj.length;i++)  {
              select+=  "<option value="+service_obj[i]['id']+">"+service_obj[i]['name']+"</option>";
            } 
            $('#sub_id').html(select);
          })
      })
  })
</script>
@stop