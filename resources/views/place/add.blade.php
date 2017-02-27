@extends('app')
@section('title', 'Manage EXPLORE')
@section('topic', 'Manage EXPLORE')

@section('content')
{!! Form::open(array('url' => 'place/save','files'=>true)) !!}
		<div class="form-group">
		  	<label for="name">ชื่อสถานที่</label>
		  	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#name_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#name_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#name_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			  	<input class="form-control tab-pane fade in active" type="text" placeholder="ชื่อสถานที่(ไทย)" id="name_tha" name="name_tha" required>
			  	<input class="form-control tab-pane fade" type="text" placeholder="ชื่อสถานที่(อังกฤษ)" id="name_eng" name="name_eng">
			  	<input class="form-control tab-pane fade" type="text" placeholder="ชื่อสถานที่(จีน)" id="name_cha" name="name_cha">
			</div>
		</div>
		<div class="form-group col-xs-6">
			<label class="control-label">ภาพประกอบ</label>
			<input id="cover" name="cover" type="file" class="file" data-show-upload="false" data-show-caption="true">
		</div><div style="clear:both"><br>
		<div class="form-group">
		  	<label for="shortdes">รายละเอียดโดยย่อ</label>
		  	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#shortdes_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#shortdes_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#shortdes_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			  	<input class="form-control tab-pane fade in active" type="text" placeholder="รายละเอียดโดยย่อ(ไทย)" id="shortdes_tha" name="shortdes_tha">
			  	<input class="form-control tab-pane fade" type="text" placeholder="รายละเอียดโดยย่อ(อังกฤษ)" id="shortdes_eng" name="shortdes_eng">
			  	<input class="form-control tab-pane fade" type="text" placeholder="รายละเอียดโดยย่อ(จีน)" id="shortdes_cha" name="shortdes_cha">
			</div>
		</div>
		<div class="form-group">
			<label for="description">รายละเอียด</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#description_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#description_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#description_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="description_tha" name="description_tha" placeholder="รายละเอียด(ไทย)" rows="3" required></textarea>
			    <textarea class="form-control tab-pane fade" id="description_eng" name="description_eng" placeholder="รายละเอียด(อังกฤษ)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="description_cha" name="description_cha" placeholder="รายละเอียด(จีน)" rows="3"></textarea>
			</div>
		</div>


		<div class="form-group">
			<input type="checkbox" class="custom-control-input" name="recommend" value="1">
			<span class="custom-control-indicator"></span>
			<span class="custom-control-description" style="font-weight: bold;font-size: larger;margin-left: 10px;">สถานที่แนะนำ</span>
		</div>
		<div class="form-group">
			<label for="recommendtxt">Recommend</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#recommendtxt_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#recommendtxt_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#recommendtxt_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="recommendtxt_tha" name="recommendtxt_tha" placeholder="แนะนำ(ไทย)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="recommendtxt_eng" name="recommendtxt_eng" placeholder="แนะนำ(อังกฤษ)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="recommendtxt_cha" name="recommendtxt_cha" placeholder="แนะนำ(จีน)" rows="3"></textarea>
			</div>
		</div>

		
		<div style="clear:both"><br>
		<div class="form-group dayrange">
		  	<label>เวลาทำการ</label> </br>
		  	<div class="dayrange_part">
			  	<label class="col-xs-1 col-form-label" for="startday" style="width: 10%;"><span class="glyphicon glyphicon-minus removeday" aria-hidden="true" style="padding-right: 10px;"></span>จากวัน</label>
			  	<div class="col-xs-2">
					<select class="form-control province" id="startday" name="startday[]">
						<option value="0">เลือกวัน</option>
						<?php foreach($day as $key=>$value){?>
							<option value="<?php echo $value ?>"><?php echo $value ?></option>
						<?php } ?>
					</select>
				</div>

				<label class="col-xs-1 col-form-label" for="endday">ถึงวัน</label>
			  	<div class="col-xs-2">
					<select class="form-control province" id="endday" name="endday[]">
						<option value="0">เลือกวัน</option>
						<?php foreach($day as $key=>$value){?>
							<option value="<?php echo $value ?>"><?php echo $value ?></option>
						<?php } ?>
					</select>
				</div>

				<label class="col-xs-1 col-form-label" for="starttime" style="width: 5%;">เปิด:</label>
			  	<div class="col-xs-2">
					<input class="form-control" type="time" name="starttime[]">
				</div>

				<label class="col-xs-1 col-form-label" for="endtime" style="width: 5%;">ปิด:</label>
			  	<div class="col-xs-2">
					<input class="form-control" type="time" name="endtime[]">
				</div>
				<br><br>
			</div>
		</div>
		<div style="clear:both">
		<span class="glyphicon glyphicon-plus addmoreday" aria-hidden="true" style="text-align: right;width: 100%;padding-right: 6%;"></span>
		<div style="clear:both"><br>

		<div class="form-group col-xs-10">
		  	<input class="form-control" type="text" placeholder="ข้อมูลเพิ่มเติม" name="timeps">
		</div>

		<div class="form-group col-xs-5 col-form-label">
		    <label>สถานที่ละหมาด</label>
		    <div class="radio">
		      <label>
		        <input type="radio" name="prayer" value="1" checked>
		        มี
		      </label>
		    </div>
		    <div class="radio">
		      <label>
		        <input type="radio" name="prayer" value="0">
		        ไม่มี
		      </label>
		    </div>
		 </div>

		 <div class="form-group col-xs-4 col-form-label">
		    <label>สถานที่จอดรถ</label>
		    <div class="radio">
		      <label>
		        <input type="radio" name="parking" value="1" checked>
		        มี
		      </label>
		    </div>
		    <div class="radio">
		      <label>
		        <input type="radio" name="parking" value="0">
		        ไม่มี
		      </label>
		    </div>
		</div>
		<div style="clear:both">

		<div class="form-group">
		  	<label for="email">Email address</label>
		  	<input class="form-control" type="email" placeholder="Enter email" name="email">
		</div>

		<div style="clear:both"><br>
		<div class="form-group telrange">
		  	<label>เบอร์โทร</label> </br>
		  	<div class="telrange_part">
			  	<label class="col-xs-1 col-form-label" for="tel"><span class="glyphicon glyphicon-minus removetel" aria-hidden="true" style="padding-right: 10px;"></span></label>
			  	<div class="col-xs-4">
					<input class="form-control telephone" type="tel" placeholder="เบอร์โทร" name="tel[]" required>
				</div>
			</div><br><br>
		</div>
		<div style="clear:both">
		<label class="col-xs-1 col-form-label" for="tel"><span class="glyphicon glyphicon-plus addmoretel" aria-hidden="true" style="padding-right: 10px;"></span></label>
		<div style="clear:both"><br>

		<div class="form-group">
		  	<label for="website">เว็บไซต์</label>
		  	<input class="form-control" type="text" placeholder="Website" name="website">
		</div>

		<div class="form-group">
		  	<label for="facebook">Facebook</label>
		  	<input class="form-control" type="text" placeholder="Facebook" name="facebook">
		</div>

		<div class="form-group">
			<label for="address">ที่อยู่</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#address_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#address_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#address_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="address_tha" name="address_tha" placeholder="ที่อยู่(ไทย)" rows="3" required></textarea>
			    <textarea class="form-control tab-pane fade" id="address_eng" name="address_eng" placeholder="ที่อยู่(อังกฤษ)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="address_cha" name="address_cha" placeholder="ที่อยู่(จีน)" rows="3"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-1 col-form-label" for="provinceID">จังหวัด:</label>
			<div class="col-xs-4">
				<select class="form-control province" id="province-1" name="provinceID">
					<option value="0">เลือกจังหวัด</option>
					<?php foreach($province as $key=>$value){?>
						<option value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>

			<label class="col-xs-1 col-form-label" for="amphurID">อำเภอ:</label>
			<div class="col-xs-4">
				<select class="form-control amphur" id="amphur-1" name="amphurID">
				    <option value="0"></option>
				</select>
			</div>
		</div><div style="clear:both"><br>

		<div class="form-group">
		  	<label>พิกัดในGoogle Map</label></br>
		  	<label class="col-xs-1 col-form-label">ละติจูด</label>
		  	<div class="col-xs-2">
		  		<input class="form-control" type="text" name="lat">
		  	</div>
		  	<label class="col-xs-1 col-form-label">ลองติจูด</label>
		  	<div class="col-xs-2">
		  		<input class="form-control" type="text" name="lng">
		  	</div>
		</div><div style="clear:both"><br>

		 <div class="form-group">
			<label class="control-label">TAG</label></br>
		    <?php foreach($category as $key=>$value){ ?>
			    <div class="form-group col-xs-4 col-form-label">
				  <input type="checkbox" class="custom-control-input" name="category[]" value="<?php echo $value['ID']  ?>">
				  <span class="custom-control-indicator"></span>
				  <span class="custom-control-description"><?php echo $value['name']; ?></span>
				</div>
			<?php } ?>
		</div>

		 <div style="clear:both"><br>
		 <div class="form-group">
			<label class="control-label">แกลลอรี่</label>
			<input id="gallery" name="gallery[]" type="file" multiple class="file">
			<div id="errorBlock" class="help-block"></div>
		</div><div style="clear:both"><br>

		<div class="form-group">
			<label for="interview">บทสัมภาษณ์</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#interview_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#interview_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#interview_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="interview_tha" name="interview_tha" placeholder="บทสัมภาษณ์(ไทย)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="interview_eng" name="interview_eng" placeholder="บทสัมภาษณ์(อังกฤษ)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="interview_cha" name="interview_cha" placeholder="บทสัมภาษณ์(จีน)" rows="3"></textarea>
			</div>
		</div>



		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/place') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	$("#gallery").fileinput({
        uploadUrl:  "{{ url('/place/galleryupload') }}",
        maxFilePreviewSize: 10240
    });

     $('.addmoreday').click(function(){
    	$('.dayrange').append('<div class="dayrange_part"><label class="col-xs-1 col-form-label" for="startday" style="width: 10%;"><span class="glyphicon glyphicon-minus removeday" aria-hidden="true" style="padding-right: 10px;"></span>จากวัน</label><div class="col-xs-2"><select class="form-control province" id="startday" name="startday[]"><option value="0">เลือกวัน</option><?php foreach($day as $key=>$value){?><option value="<?php echo $value ?>"><?php echo $value ?></option><?php } ?></select></div><label class="col-xs-1 col-form-label" for="endday">ถึงวัน</label><div class="col-xs-2"><select class="form-control province" id="endday" name="endday[]"><option value="0">เลือกวัน</option><?php foreach($day as $key=>$value){?><option value="<?php echo $value ?>"><?php echo $value ?></option><?php } ?></select></div><label class="col-xs-1 col-form-label" for="starttime" style="width: 5%;">เปิด:</label><div class="col-xs-2"><input class="form-control" type="time" name="starttime[]"></div><label class="col-xs-1 col-form-label" for="endtime" style="width: 5%;">ปิด:</label><div class="col-xs-2"><input class="form-control" type="time" name="endtime[]"></div><br><br></div>');
    	$('.removeday').click(function(){
	    	$(this).parent().parent().remove();
	    });
    });
    $('.removeday').click(function(){
    	$(this).parent().parent().remove();
    });

    $('.addmoretel').click(function(){
    	$('.telrange').append('<div class="telrange_part"><label class="col-xs-1 col-form-label" for="tel"><span class="glyphicon glyphicon-minus removetel" aria-hidden="true" style="padding-right: 10px;"></span></label><div class="col-xs-4"><input class="form-control telephone" type="tel" placeholder="เบอร์โทร" name="tel[]" required></div><br><br></div>');
    	$('.removetel').click(function(){
	    	$(this).parent().parent().remove();
	    });
	    $( ".telephone" ).keyup(function() {
			var tel = $(this).val();
			tel = tel.replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, '$1-$2-$3');
			$(this).val(tel);
		});
    });
    $('.removetel').click(function(){
    	$(this).parent().parent().remove();
    });

	$( ".telephone" ).keyup(function() {
		var tel = $(this).val();
		tel = tel.replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, '$1-$2-$3');
		$(this).val(tel);
	});


</script>
<style type="text/css">
	input[type=checkbox]
	{
	  zoom: 1.5;
	  margin-left: 5px;
	}

</style>
@endsection