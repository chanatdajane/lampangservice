@extends('app')
@section('title', 'จัดการองค์ความรู้')
@section('topic', 'จัดการองค์ความรู้')

@section('content')
{!! Form::open(array('url' => 'knowledge/save','files'=>true)) !!}

		<div class="form-group">
		  	<label for="name">ชื่อ</label>
		  	<input class="form-control" type="text" placeholder="ชื่อกิจกรรม" name="name_tha">
		  	<input class="form-control" type="text" placeholder="ชื่อกิจกรรม" name="name_eng">
		</div>
		<div class="form-group">
		  	<label for="name">ลิ้งค์</label>
		  	<input class="form-control" type="text" placeholder="ลิ้งค์" name="link">
		</div>

		<div class="form-group">
			<label for="detail">รายละเอียด</label>
		    <textarea class="form-control" name="description_tha" placeholder="รายละเอียด" rows="3"></textarea>
		    <textarea class="form-control" name="description_eng" placeholder="รายละเอียด" rows="3"></textarea>
		</div>
		
		<div style="clear:both"><br>

		<!-- <button class="submitplace btn btn-primary">เพิ่มสถานที่</button> -->
		{!! Form::submit('Send') !!}
		<a href="{{ url('/knowledge') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	
</script>
@endsection