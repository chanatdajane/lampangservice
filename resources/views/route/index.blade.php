@extends('app')
@section('title', 'Home')
@section('topic', 'ROUTE')

@section('content')
<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<a href="{{ url('/route/add') }}" class="btn btn-primary">เพิ่มเส้นทาง</a>
				<?php if(count($route) > 0){ ?>
				<table>
					<tr>
					    <th>ID</th>
					    <th>ชื่อ</th> 
					    <th>ต้นทาง</th>
					    <th>ปลายทาง</th>
					    <th>เพิ่มโดย</th>
					    <th>คำอธิบายย่อ</th>
					    <th></th>
					    <th></th>
					  </tr>
					  <?php $i = 1; ?>
					  <?php foreach($route as $key => $value) { ?>
					  <tr>
					    <td><?php echo $i ?></td>
					    <td><?php echo $value['name'] ?></td> 
					    <td><?php echo $value['startprovince'] ?></td> 
					    <td><?php echo $value['endprovince'] ?></td> 
					    <td><?php echo $value['user'] ?></td> 
					    <td><?php echo $value['description'] ?></td> 
					    <td style="text-align:center;"><a href="{{ url('/route/edit') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>
					    <td style="text-align:center;"><a onclick="return confirm('Are you sure ?')" href="{{ url('/route/delete') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a></td>
					  </tr>
					  <?php $i++;} ?>
				</table>
				<?php }else{ ?>
					
				<?php } ?> 

<script type="text/javascript">
	$('.table-parent').click(function(){
		$("."+this.id).toggle();
	});
</script>

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

th {
    background-color: #dddddd;
}
.table-child{
	display: none;
}
td{
	padding-left: 30px;
}
</style>
@endsection
