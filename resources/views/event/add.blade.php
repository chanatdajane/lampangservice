@extends('app')
@section('title', 'EVENT FEED')
@section('topic', 'EVENT FEED')

@section('content')
{!! Form::open(array('url' => 'event/save','files'=>true)) !!}

		<div class="form-group">
			<label for="name">ชื่อข่าว</label>
			<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#name_tha">ไทย</a></li>
				  <li><a data-toggle="tab" href="#name_eng">อังกฤษ</a></li>
				  <li><a data-toggle="tab" href="#name_cha">จีน</a></li>
				</ul>
			<div class="tab-content" style="padding: 0px;">
				<input class="form-control tab-pane fade in active" type="text" placeholder="ชื่อข่าว(ไทย)" id="name_tha" name="name_tha" required>
				<input class="form-control tab-pane fade" type="text" placeholder="ชื่อข่าว(อังกฤษ)" id="name_eng" name="name_eng">
				<input class="form-control tab-pane fade" type="text" placeholder="ชื่อข่าว(จีน)" id="name_cha" name="name_cha">
			</div>
		</div>
		<div class="form-group col-xs-6">
			<label class="control-label">ภาพประกอบ</label>
			<input id="cover" name="cover" type="file" class="file" data-show-upload="false" data-show-caption="true" required>
		</div><div style="clear:both"><br>
		<div class="form-group col-xs-4">
			<label class="control-label">โลโก้</label>
			<input id="logo" name="logo" type="file" class="file" data-show-upload="false" data-show-caption="true" required>
		</div><div style="clear:both"><br>

		<div class="form-group">
			<label for="description">รายละเอียด</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#detail_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#detail_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#detail_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="detail_tha" name="detail_tha" placeholder="รายละเอียด(ไทย)" rows="3" required></textarea>
			    <textarea class="form-control tab-pane fade" id="detail_eng" name="detail_eng" placeholder="รายละเอียด(อังกฤษ)" rows="3"></textarea>
			    <textarea class="form-control tab-pane fade" id="detail_cha" name="detail_cha" placeholder="รายละเอียด(จีน)" rows="3"></textarea>
			</div>
		</div>

		<div class="form-group">
		  	<label>วันที่</label></br>
		  	<label class="col-xs-1 col-form-label">เริ่ม</label>
		  	<div class="col-xs-4">
		  		<input class="form-control" type="date" name="startdate" required>
		  	</div>
		  	<label class="col-xs-1 col-form-label">สิ้นสุด</label>
		  	<div class="col-xs-4">
		  		<input class="form-control" type="date" name="enddate" required>
		  	</div>
		</div>
		<div style="clear:both"><br>

		<div class="form-group">
		  	<label for="tel">เบอร์โทร</label>
		  	<input class="form-control" type="tel" placeholder="Telephone" name="tel" required>
		</div>
		<div class="form-group">
		  	<label for="facebook">Facebook</label>
		  	<input class="form-control" type="text" placeholder="Facebook" name="facebook">
		</div>
		<div style="clear:both"><br>

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
					<select class="form-control province"  id="province-1" name="provinceID">
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

		<div style="clear:both"><br>

		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/event') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	
</script>
@endsection