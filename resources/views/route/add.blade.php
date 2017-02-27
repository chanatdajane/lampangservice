@extends('app')
@section('title', 'Manage route')
@section('topic', 'Manage route')

@section('content')
{!! Form::open(array('url' => 'route/save','files'=>true)) !!}
	<div class="form-group">
		<label for="name">ชื่อเส้นทาง</label>
		<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#name_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#name_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#name_cha">จีน</a></li>
			</ul>
		<div class="tab-content" style="padding: 0px;">
			<input class="form-control tab-pane fade in active" type="text" placeholder="ชื่อเส้นทาง(ไทย)" id="name_tha" name="name_tha">
			<input class="form-control tab-pane fade" type="text" placeholder="ชื่อเส้นทาง(อังกฤษ)" id="name_eng" name="name_eng">
			<input class="form-control tab-pane fade" type="text" placeholder="ชื่อเส้นทาง(จีน)" id="name_cha" name="name_cha">
		</div>
	</div>
	<div class="form-group">
		<label for="description">รายละเอียดโดยย่อ</label>
		<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#description_tha">ไทย</a></li>
			  <li><a data-toggle="tab" href="#description_eng">อังกฤษ</a></li>
			  <li><a data-toggle="tab" href="#description_cha">จีน</a></li>
		</ul>
		<div class="tab-content" style="padding: 0px;">
			<input class="form-control tab-pane fade in active" type="text" placeholder="รายละเอียดโดยย่อ(ไทย)" id="description_tha" name="description_tha">
			<input class="form-control tab-pane fade" type="text" placeholder="รายละเอียดโดยย่อ(อังกฤษ)" id="description_eng" name="description_eng">
			<input class="form-control tab-pane fade" type="text" placeholder="รายละเอียดโดยย่อ(จีน)" id="description_cha" name="description_cha">
		</div>
	</div>
	<div class="form-group col-xs-6">
		<label class="control-label">ภาพประกอบ</label>
		<input id="pic" name="pic" type="file" class="file" data-show-upload="false" data-show-caption="true">
	</div><div style="clear:both"><br>

	<div class="form-group">
		<label>เริ่มต้น</label></br>
			<label class="col-xs-1 col-form-label" for="startProvinceID">จังหวัด:</label>
			<div class="col-xs-4">
				<select class="form-control province" id="province-1" name="startProvinceID">
					<option value="0">เลือกจังหวัด</option>
					<?php foreach($province as $key=>$value){?>
						<option value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>

			<label class="col-xs-1 col-form-label" for="startAmphurID">อำเภอ:</label>
			<div class="col-xs-4">
				<select class="form-control amphur" id="amphur-1" name="startAmphurID">
				    <option value="0"></option>
				</select>
			</div>
	</div><div style="clear:both"><br>

	<div class="form-group">
		<label>สิ้นสุด</label></br>
			<label class="col-xs-1 col-form-label" for="endProvinceID">จังหวัด:</label>
			<div class="col-xs-4">
				<select class="form-control province" id="province-2" name="endProvinceID">
					<option value="0">เลือกจังหวัด</option>
					<?php foreach($province as $key=>$value){?>
						<option value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
					<?php } ?>
				</select>
			</div>

			<label class="col-xs-1 col-form-label" for="endAmphurID">อำเภอ:</label>
			<div class="col-xs-4">
				<select class="form-control amphur" id="amphur-2" name="endAmphurID">
				    <option value="0"></option>
				</select>
			</div>
	</div><div style="clear:both"><br>

	<div class="select-place col-xs-6" style="padding: 20px;font-weight: bold;"> สถานที่ทั้งหมด
		<div style="clear:both"><br>
		<input type="text" class="form-control" placeholder="Search" id="search">
		<div style="clear:both"><br>
		<div class="form-group">
				<label class="col-xs-2 col-form-label" for="provinceID">จังหวัด:</label>
				<div class="col-xs-9">
					<select class="form-control province"  id="province-3">
						<option value="0">เลือกจังหวัด</option>
						<?php foreach($province as $key=>$value){?>
							<option value="<?php echo $value['PROVINCE_ID'] ?>"><?php echo $value['PROVINCE_NAME'] ?></option>
						<?php } ?>
					</select>
				</div>

				<label class="col-xs-2 col-form-label" for="amphurID">อำเภอ:</label>
				<div class="col-xs-9">
					<select class="form-control amphur" id="amphur-3">
					    <option value="0"></option>
					</select>
				</div>
		</div><div style="clear:both"><br>

		<div class="dragplace connectedSortable">
			<?php foreach($place as $key=>$value){ ?>
				<div class="select-place-list" id="list-place-<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></div>
			<?php } ?>
		</div>
		<?php echo Form::text('routelist','', array('style' => 'display:none')); ?>
	</div>
	<div style="clear:both"><br>
	</div></div></div></div>

	<div class="add-route col-xs-5 connectedSortable" style="padding: 20px;font-weight: bold;"> เส้นทาง
	</div>
	<div style="clear:both"><br>

	{!!Form::submit('Send', ['class' => 'btn btn-large btn-primary'])!!}
	<a href="{{ url('/route') }}" class="btn btn-danger">Cancel</a>
{!! Form::close() !!}

<script type="text/javascript">
	$( ".add-route, .select-place .dragplace" ).sortable({
      connectWith: ".connectedSortable",
      stop: function( event, ui ) {
      	var placelist = [];
      	var addroutechild = $('.add-route').children();
      	$.each( addroutechild, function( key, value ) {
      		var placeid = value.id.split("-");
      		placelist.push(placeid[2]);
      	});
      	console.log(placelist);
		$('input[name="routelist"]').val(placelist);
      }
    }).disableSelection();


	// $( ".select-place-list" ).draggable({ revert: "invalid" });
	// $( ".add-route-list" ).droppable({ 
	// 	drop: function( event, ui) {
 //        	$( this )
 //          		.addClass( "selectedaaaaaa" )
 //          	$('#'+event.originalEvent.target.id).css('left:100px;right;200px')
 //      	}
 //  	});
  // 	$( ".select-place" ).droppable({ 
		// drop: function( event, ui ) {
  //       $( this )
  //         .removeClass( "selectedaaaaaa" )
  //     	}
  // 	});
  	$('#province-3').change(function(){   
			$.ajax({
			    url: "{{ url('/route/getplace') }}",
			    type: "post",
			    data: {'provinceid':$(this).val(),'amphurid':0,'name':$('#search').val()},
			    success: function(data){
			       var html = '';
			       console.log(data);
			        $.each( data, function( key, value ) {

			        	html += '<div class="select-place-list" id="list-place-'+value.ID+'">'+value.name+'</div>';
			        });
			       $('.dragplace').html(html);
			    }
			});
	});      
	$('#amphur-3').change(function(){   
			$.ajax({
			    url: "{{ url('/route/getplace') }}",
			    type: "post",
			    data: {'provinceid':$('#province-3').val(),'amphurid':$(this).val(),'name':$('#search').val()},
			    success: function(data){
			       var html = '';
			        $.each( data, function( key, value ) {
			        	html += '<div class="select-place-list" id="list-place-'+value.ID+'">'+value.name+'</div>';
			        });
			       $('.dragplace').html(html);
			    }
			});
	});      
	$('#search').keyup(function(){
		$.ajax({
			    url: "{{ url('/route/getplace') }}",
			    type: "post",
			    data: {'provinceid':$('#province-3').val(),'amphurid':$('#amphur-3').val(),'name':$(this).val()},
			    success: function(data){
			       var html = '';
			        $.each( data, function( key, value ) {
			        	html += '<div class="select-place-list" id="list-place-'+value.ID+'">'+value.name+'</div>';
			        });
			       $('.dragplace').html(html);
			    }
		});
	});
</script>

<style>
.add-route,.select-place {
    border-style: solid;
    margin-right: 10px;
    min-height: 250px
}
.add-route div {
	border-style: dotted;
    background-color: #fff;
    padding: 10px;
    margin: 10px;
    text-align: center;
}
.dragplace{
	min-height: 150px;
}
.dragplace div {
    background-color: #dddddd;
    padding: 10px;
    margin: 10px;
    text-align: center;
}

</style>

@endsection