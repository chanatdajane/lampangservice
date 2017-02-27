@extends('app')
@section('title', 'Smart Signage')
@section('topic', 'Smart Signage')
@section('content')
	
				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<a href="{{ url('/smart/add') }}" class="btn btn-primary">เพิ่ม Smart Signage</a>
				<table>
					<tr>
					    <th>ID</th>
					    <th>ชื่อ</th> 
					    <th></th>
					    <th></th>
					  </tr>
					  <?php $i = 1; ?>
					  <?php foreach($smart as $key => $value) { ?>
					  <tr>
					    <td><?php echo $i ?></td>
					    <td><?php echo $value['name'] ?></td> 
					    <td><a href="{{ url('/smart/edit') }}/<?php echo $value['ID'] ?>" >แก้ไข</a></td>
					    <td><a href="{{ url('/smart/delete') }}/<?php echo $value['ID'] ?>" >ลบ</a></td>
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
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

@endsection
