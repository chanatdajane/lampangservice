@extends('app')
@section('title', 'ฟอร์มคำร้อง')
@section('topic', 'ฟอร์มคำร้อง')
@section('content')

				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" requestsholder="Search">
					</div>
				</form>
				<a href="{{ url('/requests/add') }}" class="btn btn-primary">เพิ่มฟอร์มคำร้อง</a>
				<?php if(count($requests) > 0){ ?>
				<table>
					<tr>
					    <th>ID</th>
					    <th>ชื่อ</th> 
					    <th>หน่วยงาน</th>
					    <th>เพิ่มโดย</th>
					    <th></th>
					    <th></th>
					  </tr>
					  <?php $i = 1; ?>
					  <?php foreach($requests as $key => $value) { ?>
					  <tr>
					    <td><?php echo $i ?></td>
					    <td><?php echo $value['name'] ?></td> 
					    <td><?php echo $value['organization'] ?></td>
					    <td><?php echo $value['user'] ?></td> 
					    <td style="text-align:center;"><a href="{{ url('/requests/edit') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>
					    <td style="text-align:center;"><a onclick="return confirm('Are you sure ?')" href="{{ url('/requests/delete') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a></td>
					  </tr>
					  <?php $i++;} ?>
				</table>
				<?php }else{ ?>
					
				<?php } ?> 

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
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

@endsection
