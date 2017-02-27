@extends('app')
@section('title', 'USER')
@section('topic', 'USER')

@section('content')
	<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<a href="{{ url('/auth/register') }}" class="btn btn-primary">เพิ่มผู้ใช้</a>
				<table>
					<tr>
					    <th>ID</th>
					    <th>ชื่อ</th> 
					    <th>Role</th>
					    <th></th>
					    <th></th>
					  </tr>
					  <?php $i = 1; ?>
					  <?php foreach($user as $key => $value) { ?>
					  <tr>
					    <td><?php echo $i ?></td>
					    <td><?php echo $value['name'] ?></td> 
					    <td><?php
					    if($value['user_level'] == 0){
					    	echo 'Super Admin';
					    }else{
					    	echo 'Content Manager';
					    }
					    ?></td>
					    <td style="text-align:center;"><a href="{{ url('/auth/register') }}/<?php echo $value['id'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>
					    <td style="text-align:center;"><a onclick="return confirm('Are you sure ?')" href="{{ url('/user/delete') }}/<?php echo $value['id'] ?>" ><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a></td>
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
