@extends('app')
@section('title', 'EVENT FEED')
@section('topic', 'EVENT FEED')

@section('content')
{!! Form::open(array('url' => 'event/save','files'=>true)) !!}
		<?php echo Form::text('ID',$event[0]['ID'], array('style' => 'display:none')); ?>

		<div class="form-group">
			<label for="name">ชื่อข่าว</label>
			<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#name_tha">ไทย</a></li>
				  <li><a data-toggle="tab" href="#name_eng">อังกฤษ</a></li>
				  <li><a data-toggle="tab" href="#name_cha">จีน</a></li>
				</ul>
			<div class="tab-content" style="padding: 0px;">
				<input class="form-control tab-pane fade in active" type="text" placeholder="ชื่อข่าว(ไทย)" id="name_tha" name="name_tha" value="<?php echo $event[0]['name_tha'] ?>" required>
				<input class="form-control tab-pane fade" type="text" placeholder="ชื่อข่าว(อังกฤษ)" id="name_eng" name="name_eng" value="<?php echo $event[0]['name_eng'] ?>">
				<input class="form-control tab-pane fade" type="text" placeholder="ชื่อข่าว(จีน)" id="name_cha" name="name_cha" value="<?php echo $event[0]['name_cha'] ?>">
			</div>
		</div>
		<div class="form-group col-xs-6">
			<label class="control-label">ภาพประกอบ</label>
			<input id="cover" name="cover" type="file" class="file" data-show-upload="false" data-show-caption="true">
		</div><div style="clear:both"><br>
		<div class="form-group col-xs-4">
			<label class="control-label">โลโก้</label>
			<input id="logo" name="logo" type="file" class="file" data-show-upload="false" data-show-caption="true">
		</div><div style="clear:both"><br>

		<div class="form-group">
			<label for="description">รายละเอียด</label>
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#detail_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#detail_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#detail_cha">จีน</a></li>
			</ul>
			<div class="tab-content" style="padding: 0px;">
			    <textarea class="form-control tab-pane fade in active" id="detail_tha" name="detail_tha" placeholder="รายละเอียด(ไทย)" rows="3" required><?php echo $event[0]['detail_tha'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="detail_eng" name="detail_eng" placeholder="รายละเอียด(อังกฤษ)" rows="3"><?php echo $event[0]['detail_eng'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="detail_cha" name="detail_cha" placeholder="รายละเอียด(จีน)" rows="3"><?php echo $event[0]['detail_cha'] ?></textarea>
			</div>
		</div>

		<div class="form-group">
		  	<label>วันที่</label></br>
		  	<label class="col-xs-1 col-form-label">เริ่ม</label>
		  	<div class="col-xs-4">
		  		<input class="form-control" type="date" name="startdate" value="<?php echo $event[0]['startdate'] ?>" required>
		  	</div>
		  	<label class="col-xs-1 col-form-label">สิ้นสุด</label>
		  	<div class="col-xs-4">
		  		<input class="form-control" type="date" name="enddate" value="<?php echo $event[0]['enddate'] ?>" required>
		  	</div>
		</div>
		<div style="clear:both"><br>

		<div class="form-group">
		  	<label for="tel">เบอร์โทร</label>
		  	<input class="form-control" type="tel" placeholder="Telephone" name="tel" value="<?php echo $event[0]['tel'] ?>" required>
		</div>
		<div class="form-group">
		  	<label for="facebook">Facebook</label>
		  	<input class="form-control" type="text" placeholder="Facebook" name="facebook" value="<?php echo $event[0]['facebook'] ?>">
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
			    <textarea class="form-control tab-pane fade in active" id="address_tha" name="address_tha" placeholder="ที่อยู่(ไทย)" rows="3" required><?php echo $event[0]['address_tha'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="address_eng" name="address_eng" placeholder="ที่อยู่(อังกฤษ)" rows="3"><?php echo $event[0]['address_eng'] ?></textarea>
			    <textarea class="form-control tab-pane fade" id="address_cha" name="address_cha" placeholder="ที่อยู่(จีน)" rows="3"><?php echo $event[0]['address_cha'] ?></textarea>
			</div>
		</div>
		<div style="clear:both"><br>

		<div class="form-group">
			<label class="col-xs-1 col-form-label" for="provinceID">จังหวัด:</label>
			<div class="col-xs-4">
				<select class="form-control province"  id="province-1" name="provinceID">
					<option value="0">เลือกจังหวัด</option>
					<?php foreach($province as $key=>$value){?>
						<option <?php if($event[0]['provinceID'] == $value['PROVINCE_ID']) echo 'selected'; ?> value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>

			<label class="col-xs-1 col-form-label" for="amphurID">อำเภอ:</label>
			<div class="col-xs-4">
				<select class="form-control amphur" id="amphur-1" name="amphurID">
					<option value="0"></option>
				    <?php foreach($amphur as $key=>$value){?>
						<option <?php if($event[0]['amphurID'] == $value['AMPHUR_ID']) echo 'selected'; ?> value="<?php echo $value['AMPHUR_ID'] ?>"><?php echo $value['AMPHUR_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div><div style="clear:both"><br>

		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Update', ['class' => 'btn btn-large btn-primary'])!!}
		<a href="{{ url('/event') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	var eventid = "<?php echo $event[0]['ID'] ?>";
	var eventimg = "<?php echo $event[0]['cover'] ?>";
	var pathimg = "<?php echo URL::to('/'); ?>/uploads/event/"+eventid+"/thumbnail.png";
	var pathlogo = "<?php echo URL::to('/'); ?>/uploads/event/"+eventid+"/logo.png";

	 $("#cover").fileinput({
        initialPreview: [
            pathimg
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: eventimg, size: 930321, width: "120px", key: 1}
        ],
        // deleteUrl: "{{ url('/place/deleteimg') }}",
        autoReplace: true,
        overwriteInitial: true,
        maxFileSize: 100,
        initialCaption: eventimg,
    });
	  $("#logo").fileinput({
        initialPreview: [
            pathlogo
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: eventimg, size: 930321, width: "120px", key: 1}
        ],
        // deleteUrl: "{{ url('/place/deleteimg') }}",
        autoReplace: true,
        overwriteInitial: true,
        maxFileSize: 100,
        initialCaption: eventimg,
    });

</script>
@endsection