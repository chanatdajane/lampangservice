@extends('app')
@section('title', 'Manage EXPLORE')
@section('topic', 'Manage EXPLORE')

@section('content')
{!! Form::open(array('url' => 'request/save','files'=>true)) !!}
		<?php echo Form::text('ID',$request[0]['ID'], array('style' => 'display:none')); ?>
		<div class="form-group">
		  	<label for="request-name">ชื่อสถานที่</label>
		  	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#name_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#name_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#name_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			  	<input class="form-control tab-pane fade in active" type="text" id="name_tha" requestholder="ชื่อสถานที่(ไทย)" name="name_tha" value="<?php echo $request[0]['name_tha'] ?>">
			  	<input class="form-control tab-pane fade" type="text" id="name_eng" requestholder="ชื่อสถานที่(อังกฤษ)" name="name_eng" value="<?php echo $request[0]['name_eng'] ?>">
			  	<input class="form-control tab-pane fade" type="text" requestholder="ชื่อสถานที่(จีน)" id="name_cha" name="name_cha" value="<?php echo $request[0]['name_cha'] ?>">
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
			  	<input class="form-control tab-pane fade in active" type="text" requestholder="รายละเอียดโดยย่อ(ไทย)" id="shortdes_tha" name="shortdes_tha" value="<?php echo $request[0]['shortdes_tha'] ?>">
			  	<input class="form-control tab-pane fade" type="text" requestholder="รายละเอียดโดยย่อ(อังกฤษ)" id="shortdes_eng" name="shortdes_eng" value="<?php echo $request[0]['shortdes_eng'] ?>">
			  	<input class="form-control tab-pane fade" type="text" requestholder="รายละเอียดโดยย่อ(จีน)" id="shortdes_cha" name="shortdes_cha" value="<?php echo $request[0]['shortdes_cha'] ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="request-description">รายละเอียด</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#description_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#description_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#description_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="description_tha" name="description_tha" requestholder="รายละเอียด(ไทย)" rows="3"><?php echo $request[0]['description_tha'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="description_eng" name="description_eng" requestholder="รายละเอียด(อังกฤษ)" rows="3"><?php echo $request[0]['description_eng'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="description_cha" name="description_cha" requestholder="รายละเอียด(จีน)" rows="3"><?php echo $request[0]['description_cha'] ?></textarea>
			</div>
		</div>

		<div class="form-group">
			<input type="checkbox" class="custom-control-input" name="recommend" <?php if($request[0]['recommend'] == 1) echo "checked" ?>>
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
			    <textarea class="form-control tab-pane fade in active" id="recommendtxt_tha" name="recommendtxt_tha" requestholder="แนะนำ(ไทย)" rows="3"><?php echo $request[0]['recommendtxt_tha'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="recommendtxt_eng" name="recommendtxt_eng" requestholder="แนะนำ(อังกฤษ)" rows="3"><?php echo $request[0]['recommendtxt_eng'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="recommendtxt_cha" name="recommendtxt_cha" requestholder="แนะนำ(จีน)" rows="3"><?php echo $request[0]['recommendtxt_cha'] ?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-1 col-form-label" for="provinceID">จังหวัด:</label>
			<div class="col-xs-4">
				<select class="form-control province"  id="province-1" name="provinceID">
					<option value="0">เลือกจังหวัด</option>
					<?php foreach($province as $key=>$value){?>
						<option <?php if($request[0]['provinceID'] == $value['PROVINCE_ID']) echo 'selected'; ?> value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>

			<label class="col-xs-1 col-form-label" for="amphurID">อำเภอ:</label>
			<div class="col-xs-4">
				<select class="form-control amphur" id="amphur-1" name="amphurID">
					<option value="0"></option>
				    <?php foreach($amphur as $key=>$value){?>
						<option <?php if($request[0]['amphurID'] == $value['AMPHUR_ID']) echo 'selected'; ?> value="<?php echo $value['AMPHUR_ID'] ?>"><?php echo $value['AMPHUR_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div><div style="clear:both"><br>

		<div class="form-group dayrange">
		  	<label>เวลาทำการ</label> </br>
		  	<?php foreach($requestTime as $key2=>$value2){ ?>
			  	<div class="dayrange_part">
			  	<label class="col-xs-1 col-form-label" for="startday" style="width: 10%;">
			  	<span class="glyphicon glyphicon-minus removeday" aria-hidden="true" style="padding-right: 10px;"></span>จากวัน</label>
			  	<div class="col-xs-2">
					<select class="form-control province" id="startday" name="startday[]">
						<option value="0">เลือกวัน</option>
						<?php foreach($day as $key=>$value){?>
							<option <?php if($value == $value2['startday']) echo 'selected'; ?> value="<?php echo $value ?>"><?php echo $value ?></option>
						<?php } ?>
					</select>
				</div>

				<label class="col-xs-1 col-form-label" for="endday">ถึงวัน</label>
			  	<div class="col-xs-2">
					<select class="form-control province" id="endday" name="endday[]">
						<option value="0">เลือกวัน</option>
						<?php foreach($day as $key=>$value){?>
							<option <?php if($value == $value2['endday']) echo 'selected'; ?> value="<?php echo $value ?>"><?php echo $value ?></option>
						<?php } ?>
					</select>
				</div>

				<label class="col-xs-1 col-form-label" for="starttime" style="width:5%;">เปิด:</label>
			  	<div class="col-xs-2">
					<input class="form-control" type="time" name="starttime[]" value="<?php echo $value2['starttime'] ?>">
				</div>

				<label class="col-xs-1 col-form-label" for="endtime" style="width:5%;">ปิด:</label>
			  	<div class="col-xs-2">
					<input class="form-control" type="time" name="endtime[]" value="<?php echo $value2['endtime'] ?>">
				</div>
				<br><br>
			</div>
			<?php } ?>
		</div>
		<div style="clear:both">
		<span class="glyphicon glyphicon-plus addmoreday" aria-hidden="true" style="text-align: right;width: 100%;padding-right: 6%;"></span>
		<div class="form-group col-xs-10">
		  	<input class="form-control" type="text" requestholder="ข้อมูลเพิ่มเติม" name="timeps" value="<?php echo $request[0]['timeps'] ?>">
		</div>
		<div style="clear:both"><br>


		<div class="form-group col-xs-5 col-form-label">
		    <label>สถานที่ละหมาด</label>
		    <div class="radio">
		      <label>
		        <input type="radio" name="prayer" value="1" <?php if($request[0]['prayer'] == 1) echo 'checked' ?>>
		        มี
		      </label>
		    </div>
		    <div class="radio">
		      <label>
		        <input type="radio" name="prayer" value="0" <?php if($request[0]['prayer'] == 0) echo 'checked' ?>>
		        ไม่มี
		      </label>
		    </div>
		 </div>

		 <div class="form-group col-xs-4 col-form-label">
		    <label>สถานที่จอดรถ</label>
		    <div class="radio">
		      <label>
		        <input type="radio" name="parking" value="1" <?php if($request[0]['parking'] == 1) echo 'checked' ?>>
		        มี
		      </label>
		    </div>
		    <div class="radio">
		      <label>
		        <input type="radio" name="parking" value="0" <?php if($request[0]['parking'] == 0) echo 'checked' ?>>
		        ไม่มี
		      </label>
		    </div>
		</div>
		<div style="clear:both">

		<div class="form-group">
		  	<label for="request-email">Email address</label>
		  	<input class="form-control" type="email" requestholder="Enter email" name="email" value="<?php echo $request[0]['email'] ?>">
		</div>

		<div style="clear:both"><br>
		<div class="form-group telrange">
		  	<label>เบอร์โทร</label> </br>
		  	<?php foreach($requesttel as $key=>$value){ ?>
		  	<div class="telrange_part">
			  	<label class="col-xs-1 col-form-label" for="tel"><span class="glyphicon glyphicon-minus removetel" aria-hidden="true" style="padding-right: 10px;"></span></label>
			  	<div class="col-xs-4">
					<input class="form-control telephone" type="tel" requestholder="เบอร์โทร" name="tel[]" value="<?php echo $value['tel'] ?>" required>
				</div>
			</div><br><br>
			<?php } ?>
			</div>
		</div>
		<div style="clear:both">
		<label class="col-xs-1 col-form-label" for="tel"><span class="glyphicon glyphicon-plus addmoretel" aria-hidden="true" style="padding-right: 10px;"></span></label>
		<div style="clear:both">

		<div class="form-group">
		  	<label for="request-website">เว็บไซต์</label>
		  	<input class="form-control" type="text" requestholder="Website" name="website" value="<?php echo $request[0]['website'] ?>">
		</div>

		<div class="form-group">
		  	<label for="request-facebook">Facebook</label>
		  	<input class="form-control" type="text" requestholder="Facebook" name="facebook" value="<?php echo $request[0]['facebook'] ?>">
		</div>

		<div class="form-group">
			<label for="request-address">ที่อยู่</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#address_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#address_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#address_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="address_tha" name="address_tha" requestholder="ที่อยู่(ไทย)" rows="3"><?php echo $request[0]['address_tha'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="address_eng" name="address_eng" requestholder="ที่อยู่(อังกฤษ)" rows="3"><?php echo $request[0]['address_eng'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="address_cha" name="address_cha" requestholder="ที่อยู่(จีน)" rows="3"><?php echo $request[0]['address_cha'] ?></textarea>
			</div>
		</div>

		<div class="form-group">
		  	<label>พิกัดในGoogle Map</label></br>
		  	<label class="col-xs-1 col-form-label">ละติจูด</label>
		  	<div class="col-xs-2">
		  		<input class="form-control" type="text" name="lat" value="<?php echo $request[0]['lat'] ?>">
		  	</div>
		  	<label class="col-xs-1 col-form-label">ลองติจูด</label>
		  	<div class="col-xs-2">
		  		<input class="form-control" type="text" name="lng" value="<?php echo $request[0]['lng'] ?>">
		  	</div>
		</div><div style="clear:both"><br>


		  <div class="form-group">
			<label class="control-label">TAG</label></br>
		    <?php foreach($category as $key=>$value){ ?>
			    <div class="form-group col-xs-4 col-form-label">
				  <input type="checkbox" class="custom-control-input" name="category[]" value="<?php echo $value['ID']  ?>" <?php if (in_array($value['ID'], $requestCategory)) echo 'checked'; ?>>
				  <span class="custom-control-indicator"></span>
				  <span class="custom-control-description"><?php echo $value['name']; ?></span>
				</div>
			<?php } ?>
		</div><div style="clear:both"><br>

		 <div class="form-group">
			<label for="request-interview">บทสัมภาษณ์</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#interview_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#interview_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#interview_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="interview_tha" name="interview_tha" requestholder="บทสัมภาษณ์(ไทย)" rows="3"><?php echo $request[0]['interview_tha'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="interview_eng" name="interview_eng" requestholder="บทสัมภาษณ์(อังกฤษ)" rows="3"><?php echo $request[0]['interview_eng'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="interview_cha" name="interview_cha" requestholder="บทสัมภาษณ์(จีน)" rows="3"><?php echo $request[0]['interview_cha'] ?></textarea>
			</div>
		</div>

		<div style="clear:both"><br>
		 <div class="form-group">
			<label class="control-label">แกลลอรี่</label>
			<input id="gallery" name="gallery[]" type="file" multiple class="file">
			<div id="errorBlock" class="help-block"></div>
		</div><div style="clear:both"><br>

		
		
		{!! Form::submit('Update', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/request') }}" class="btn btn-danger">Cancel</a>

{!! Form::close() !!}

<script type="text/javascript">
	var requestid = "<?php echo $request[0]['ID'] ?>";
	var requestimg = "<?php echo $request[0]['cover'] ?>";
	var pathimg = "<?php echo URL::to('/'); ?>/uploads/request/"+requestid+"/thumbnail.png";
	var pathgallery = [];
	<?php foreach($requestGallery as $key=>$value){ ?>
			pathgallery.push("<?php echo URL::to('/')."/uploads/request/".$request[0]['ID']."/gallery/".$value; ?>");
	<?php } ?>
	console.log(pathgallery);
    $("#cover").fileinput({
        initialPreview: [
            pathimg
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: requestimg, size: 930321, width: "120px", key: 1}
        ],
        // deleteUrl: "{{ url('/request/deleteimg') }}",
        autoRerequest: true,
        overwriteInitial: true,
        maxFileSize: 100,
        initialCaption: requestimg,
    });
    $("#gallery").fileinput({
    	 initialPreview: 
          pathgallery
        ,
        initialPreviewAsData: true,
        uploadUrl:  "{{ url('/request/galleryupload') }}",
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
    	$('.telrange').append('<div class="telrange_part"><label class="col-xs-1 col-form-label" for="tel"><span class="glyphicon glyphicon-minus removetel" aria-hidden="true" style="padding-right: 10px;"></span></label><div class="col-xs-4"><input class="form-control telephone" type="tel" requestholder="เบอร์โทร" name="tel[]" required></div><br><br></div>');
    	$('.removetel').click(function(){
	    	$(this).parent().parent().remove();
	    });
	    $( ".telephone" ).keyup(function() {
			var tel = $(this).val();
			tel = tel.rerequest(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, '$1-$2-$3');
			$(this).val(tel);
		});
    });
    $('.removetel').click(function(){
    	$(this).parent().parent().remove();
    });
    $( ".telephone" ).keyup(function() {
			var tel = $(this).val();
			tel = tel.rerequest(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, '$1-$2-$3');
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