@extends('app')
@section('title', 'จัดการฟอร์มคำร้อง')
@section('topic', 'จัดการฟอร์มคำร้อง')

@section('content')
{!! Form::open(array('url' => 'requests/save','files'=>true)) !!}
		<div class="form-group">
		  	<label class="topic-head" for="name">ชื่อฟอร์มคำร้อง</label>
		  	<input class="form-control" type="text" requestholder="ชื่อคำร้อง" id="name" name="name" required>
		</div>

		<div style="clear:both"><br>

		<div style="clear:both"><br>
		<div class="form-group request_choice">
		  	<label class="topic-head">เอกสารประกอบคำขอ</label> </br>
		  	<div class="request_choice_part">
		  	<br>
			  	<label class="col-xs-1 col-form-label" for="request_choice"></label>
			  	<div class="col-xs-7">
			  		<label for="name">ชื่อเอกสาร</label>
					<input class="form-control" type="text" name="choice_name[0]">
				</div>
				<div class="col-xs-2">
					<label for="name">จำเป็น</label>
					<input class="form-control" type="radio" name="choice_required[0]" value="1" checked>
				</div>
				<div class="col-xs-2">
					<label for="name">ไม่จำเป็น</label>
					<input class="form-control" type="radio" name="choice_required[0]" value="0">
				</div>
			</div><br><br>
		</div>
		<div style="clear:both">
		<label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-plus addmorerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label>
		<div style="clear:both"><br>

		 <div class="form-group">
			<label class="control-label topic-head">หน่วยงาน</label></br>
		    <div class="col-xs-2">
					<select class="form-control province" id="organizationID" name="organizationID">
						<option value="0">เลือกหน่วยงาน</option>
						<?php foreach($organization as $key=>$value){?>
							<option value="<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></option>
						<?php } ?>
					</select>
				</div>
		</div>
		<div style="clear:both"><br>
		<div class="form-group">
			<label class="control-label topic-head">จำนวนวันก่อนหมดอายุ</label></br>
		    <div class="col-xs-2">
					<input class="form-control" type="text" requestholder="จำนวนวันก่อนหมดอายุ" id="expireday" name="expireday" required>
				</div> <label class="control-label">วัน</label></br>
		</div>
		<div style="clear:both"><br>
		<!-- <button class="submitrequest btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/requests') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	var i = 1;
    $('.addmorerequest_choice').click(function(){
    	$('.request_choice').append('<div class="request_choice_part"><label class="col-xs-1 col-form-label" for="request_choice"><span class="glyphicon glyphicon-minus removerequest_choice" aria-hidden="true" style="padding-right: 10px;"></span></label><div class="col-xs-7"><input class="form-control" type="text" name="choice_name['+i+']"></div><div class="col-xs-2"><input class="form-control" type="radio" name="choice_required['+i+']" value="1" checked></div><div class="col-xs-2"><input class="form-control" type="radio" name="choice_required['+i+']" value="0"></div></div><br><br>');
    	$('.removerequest_choice').click(function(){
	    	$(this).parent().parent().remove();
	    });
	    i++;
    });

    $('.removerequest_choice').click(function(){
    	$(this).parent().parent().remove();
    });


</script>
<style type="text/css">
	input[type=checkbox]
	{
	  zoom: 1.5;
	  margin-left: 5px;
	}
	.topic-head{
		font-weight: bold;
	}

</style>
@endsection