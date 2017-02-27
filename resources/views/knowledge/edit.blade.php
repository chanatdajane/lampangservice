@extends('app')
@section('title', 'จัดการข่าว')
@section('topic', 'จัดการข่าว')

@section('content')
{!! Form::open(array('url' => 'knowledge/save','files'=>true)) !!}
		<?php echo Form::text('ID',$knowledge[0]['ID'], array('style' => 'display:none')); ?>
		<div class="form-group">
		  	<label for="name">ชื่อข่าว</label>
		  	<input class="form-control" type="text" placeholder="ชื่อกิจกรรม" name="name_tha" value="<?php echo $knowledge[0]['name_tha'] ?>">
		  	<input class="form-control" type="text" placeholder="ชื่อกิจกรรม" name="name_eng" value="<?php echo $knowledge[0]['name_eng'] ?>">
		</div>
		<div class="form-group">
		  	<label for="name">ลิ้งค์</label>
		  	<input class="form-control" type="text" placeholder="ลิ้งค์" name="name_tha" value="<?php echo $knowledge[0]['link'] ?>">
		</div>
		<div class="form-group">
			<label for="detail">รายละเอียด</label>
		    <textarea class="form-control" name="description_tha" placeholder="รายละเอียด" rows="3"><?php echo $knowledge[0]['description_tha'] ?></textarea>
		    <textarea class="form-control" name="description_eng" placeholder="รายละเอียด" rows="3"><?php echo $knowledge[0]['description_eng'] ?></textarea>
		</div>
		
		<div style="clear:both"><br>

		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Update') !!}
		<a href="{{ url('/knowledge') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	var knowledgeid = "<?php echo $knowledge[0]['ID'] ?>";
	var knowledgeimg = "<?php echo $knowledge[0]['cover'] ?>";
	var pathimg = "<?php echo URL::to('/'); ?>/uploads/knowledge/"+knowledgeid+"/thumbnail.png";
	var pathlogo = "<?php echo URL::to('/'); ?>/uploads/knowledge/"+knowledgeid+"/logo.png";

	 $("#cover").fileinput({
        initialPreview: [
            pathimg
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: knowledgeimg, size: 930321, width: "120px", key: 1}
        ],
        // deleteUrl: "{{ url('/place/deleteimg') }}",
        autoReplace: true,
        overwriteInitial: true,
        maxFileSize: 100,
        initialCaption: knowledgeimg,
    });
	  $("#logo").fileinput({
        initialPreview: [
            pathlogo
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: knowledgeimg, size: 930321, width: "120px", key: 1}
        ],
        // deleteUrl: "{{ url('/place/deleteimg') }}",
        autoReplace: true,
        overwriteInitial: true,
        maxFileSize: 100,
        initialCaption: knowledgeimg,
    });

</script>
@endsection