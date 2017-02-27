@extends('app')
@section('title', 'จัดการ Smart Signage')
@section('topic', 'จัดการ Smart Signage')

@section('content')
{!! Form::open(array('url' => 'smart/save','files'=>true)) !!}
	<?php echo Form::text('ID',$smart[0]['ID'], array('style' => 'display:none')); ?>
		<div class="form-group">
		  	<label for="name">ชื่อข่าว </label>
		  	<input class="form-control" type="text" placeholder="ชื่อ" name="name_tha" value="<?php echo $smart[0]['name_tha'] ?>">
		  	<input class="form-control" type="text" placeholder="ชื่อ" name="name_eng" value="<?php echo $smart[0]['name_eng'] ?>">
		</div>
		<div style="clear:both"><br>

		<div class="form-group">
			<label for="detail">รายละเอียด</label>
		    <textarea class="form-control" name="description_tha" placeholder="รายละเอียด" rows="3"><?php echo $smart[0]['description_tha'] ?></textarea>
		    <textarea class="form-control" name="description_eng" placeholder="รายละเอียด" rows="3"><?php echo $smart[0]['description_eng'] ?></textarea>
		</div>
		<div class="form-group">
				<label class="col-xs-1 col-form-label" for="provinceID">จังหวัด:</label>
				<div class="col-xs-4">
					<select class="form-control province"  id="province-1" name="provinceID">
						<option value="0">เลือกจังหวัด</option>
						<?php foreach($province as $key=>$value){?>
						<option <?php if($smart[0]['provinceID'] == $value['PROVINCE_ID']) echo 'selected'; ?> value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
					<?php } ?>
					</select>
				</div>
		</div><div style="clear:both"><br>
		
		<div class="form-group">
		  	<label for="facebook">Link</label>
		  	<input class="form-control" type="text" placeholder="Link" name="link">
		</div>
		<div style="clear:both"><br>

		 <div class="form-group">
			<label class="control-label">แกลลอรี่</label>
			<input id="gallery" name="gallery[]" type="file" multiple class="file">
			<div id="errorBlock" class="help-block"></div>
		</div><div style="clear:both"><br>

		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send') !!}
		<a href="{{ url('/smart') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
var pathgallery = [];
	<?php foreach($smartGallery as $key=>$value){ ?>
		pathgallery.push("<?php echo URL::to('/')."/uploads/smart/".$smart[0]['ID']."/gallery/".$value; ?>");
	<?php } ?>

		$("#gallery").fileinput({
	    	 initialPreview: 
	          pathgallery
	        ,
	        initialPreviewAsData: true,
	        uploadUrl:  "{{ url('/smart/galleryupload') }}",
	        maxFilePreviewSize: 10240
	    });
</script>
@endsection