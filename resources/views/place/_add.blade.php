@extends('app')
@section('title', 'Manage place')
@section('topic', 'จัดการสถานที่')

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
			<input id="cover" name="cover" type="file" class="file" data-show-upload="false" data-show-caption="true" required>
		</div><div style="clear:both"><br>
		<div class="form-group">
		  	<label for="shortdes">รายละเอียดโดยย่อ</label>
		  	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#shortdes_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#shortdes_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#shortdes_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			  	<input class="form-control tab-pane fade in active" type="text" placeholder="รายละเอียดโดยย่อ(ไทย)" id="shortdes_tha" name="shortdes_tha" required>
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
		  	<label>เวลาทำการ</label></br>
		  	<label class="col-xs-1 col-form-label">เปิด</label>
		  	<div class="col-xs-4">
		  		<input class="form-control" type="time" name="opentime" required>
		  	</div>
		  	<label class="col-xs-1 col-form-label">ปิด</label>
		  	<div class="col-xs-4">
		  		<input class="form-control" type="time" name="closetime" required>
		  	</div>
		</div>
		<div style="clear:both"><br>

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
		  	<input class="form-control" type="email" placeholder="Enter email" name="email" required>
		</div>

		<div class="form-group">
		  	<label for="tel">เบอร์โทร</label>
		  	<input class="form-control" type="tel" placeholder="Telephone" name="tel" required>
		</div>

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
		  	<label>พิกัดในGoogle Map</label></br>
		  	<label class="col-xs-1 col-form-label">ละติจูด</label>
		  	<div class="col-xs-2">
		  		<input class="form-control" type="text" name="lat" required>
		  	</div>
		  	<label class="col-xs-1 col-form-label">ลองติจูด</label>
		  	<div class="col-xs-2">
		  		<input class="form-control" type="text" name="lng" required>
		  	</div>
		</div><div style="clear:both"><br>

		<?php foreach($category as $key=>$value){ ?>
		<div class="form-group col-xs-4 col-form-label">
		    <label><?php echo $value['name']; ?></label>
		    <?php foreach($category[$key]['child'] as $key2=>$value2){ ?>
			    <div>
				  <input type="checkbox" class="custom-control-input" name="category[]" value="<?php echo $value2['ID']  ?>">
				  <span class="custom-control-indicator"></span>
				  <span class="custom-control-description"><?php echo $value2['name']; ?></span>
				</div>
			<?php } ?>
		 </div>
		 <?php } ?>

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
			    <textarea class="form-control tab-pane fade in active" id="interview_tha" name="interview_tha" placeholder="บทสัมภาษณ์(ไทย)" rows="3" required></textarea>
			    <textarea class="form-control tab-pane fade" id="interview_eng" name="interview_eng" placeholder="บทสัมภาษณ์(อังกฤษ)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="interview_cha" name="interview_cha" placeholder="บทสัมภาษณ์(จีน)" rows="3"></textarea>
			</div>
		</div>

		<div class="form-group">
			<input type="checkbox" class="custom-control-input" name="recommend" value="1">
			<span class="custom-control-indicator"></span>
			<span class="custom-control-description">สถานที่แนะนำ</span>
		</div>

		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send') !!}
		<a href="{{ url('/place') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	$("#gallery").fileinput({
        uploadUrl:  "{{ url('/place/galleryupload') }}",
        maxFilePreviewSize: 10240
    });
</script>
@endsection