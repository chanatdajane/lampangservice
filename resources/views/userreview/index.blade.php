@extends('app')
@section('title', 'Home')
@section('topic', 'รีวิวผู้ใช้')

@section('content')
<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<div class="form-group">
					<label class="col-xs-2 col-form-label" for="provinceID">เลือกสถานที่:</label>
					<div class="col-xs-4">
						<select class="form-control province" id="place" name="provinceID">
							<option value="0">ทั้งหมด</option>
							<?php foreach($place as $key=>$value){?>
								<option value="<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div><div style="clear:both"><br>
				<table class="userreviewdata" style="table-layout: fixed; width: 100%">
					<tr>
					    <th width="5%">ID</th>
					    <th width="30%">รีวิว</th>
					    <th width="20%">สถานที่</th>
					    <th width="15%">ผู้รีวิว</th>
					    <th width="20%"></th>
					    <th width="20%"></th>
					    <th width="10%"></th>
					</tr>
					<?php $i = 1; ?>
					<?php foreach($userreview as $key => $value) { ?>
					<tr id="review-<?php echo $value['ID'] ?>">
					    <td><?php echo $i ?></td>
					    <td style="word-wrap: break-word;" id="reviewdetail-<?php echo $value['ID'] ?>"><?php echo $value['detail'] ?></td> 
					    <td><?php echo $value['place'] ?></td> 
					    <td style="word-wrap: break-word;"><?php echo $value['user'] ?></td> 
					    <td><?php echo $value['approveval'] ?></td>
					    <td><a href="{{ url('/userreview/approve') }}/<?php echo $value['ID'] ?>" >
					    <?php 
					    if($value['approve'] == 0){
					    	echo 'อนุมัติ';
					    }else{
					    	echo 'ยกเลิกการอนุมัติ';
					    }
					    ?>
					    </a></td>
					    <td><a href="{{ url('/userreview/delete') }}/<?php echo $value['ID'] ?>" >ลบ</a></td>
					</tr>
					<?php $i++;} ?>
				</table>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    max-width: 20%;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<script type="text/javascript">
	function reviewmoredetail(id){
		$.ajax({
			url: "{{ url('/userreview/getFullreview') }}",
			type: "post",
			data: {'reviewid':id},
			success: function(data){
				// console.log(data);
				$('#reviewdetail-'+id).html(data);
			}
		});
	}

	$('#place').change(function(){
		var placeid = $(this).val();
		$.ajax({
			url: "{{ url('/userreview/getUserreview') }}",
			type: "post",
			data: {'placeid':placeid},
			success: function(data){
				var html = '';
				var i = 1;
				html = '<tr><th width="5%">ID</th><th width="30%">รีวิว</th><th width="20%">สถานที่</th><th width="15%">ผู้รีวิว</th><th width="20%"></th><th width="20%"></th><th width="10%"></th></tr>';
			    $.each( data, function( key, value ) {
			        html += '<tr><td>'+i+'</td><td style="word-wrap: break-word;" id="reviewdetail-'+value.ID+'">'+value.detail+'</td>';
			        html += '<td>'+value.place+'</td><td style="word-wrap: break-word;">'+value.user+'</td><td>'+value.approveval+'</td>';
			        html += '<td><a href="{{ url("/userreview/approve") }}/'+value.ID+'" >';
			        if(value.approve == 0) html += 'อนุมัติ';
			        else html += 'ยกเลิกการอนุมัติ';
			        html += '</a></td><td><a href="{{ url("/userreview/delete") }}/'+value.ID+'" >ลบ</a></td></tr>';
			        i++;
			    });
			    //html += '';
			    $('.userreviewdata').html(html);
			    $('.reviewmore').click(function(){
					var reviewmore = $(this).attr('id');
					var id = reviewmore.split("-");
					reviewmoredetail(id[1]);
				});
			}
		});      
	});
	$('.reviewmore').click(function(){
		var reviewmore = $(this).attr('id');
		var id = reviewmore.split("-");
		reviewmoredetail(id[1]);
	});
</script>
@endsection