@extends('app')
@section('title', 'EXPLORE')
@section('topic', 'EXPLORE')
@section('content')

				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<a href="{{ url('/place/add') }}" class="btn btn-primary">เพิ่มสถานที่</a>
				<?php if(count($place) > 0){ ?>
				<table>
					<tr>
					    <th>ID</th>
					    <th>ชื่อ</th> 
					    <th>ประเภท</th>
					    <th>เพิ่มโดย</th>
					    <th></th>
					    <th></th>
					  </tr>
					  <?php $i = 1; ?>
					  <?php foreach($place as $key => $value) { ?>
					  <tr>
					    <td><?php echo $i ?></td>
					    <td><?php echo $value['name'] ?></td> 
					    <td>
					    	<?php 
					    	if(!empty($placecate[$key])) {
					    		foreach($placecate[$key] as $key2=>$value2){ 
						    		echo $value2;
						    		if(!empty($placecate[$key][$key2+1]))
						    			echo ",";
						    	}
					    	}
					    	?>
					    </td>
					    <td><?php echo $value['user'] ?></td> 
					    <td style="text-align:center;"><a href="{{ url('/place/edit') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>
					    <td style="text-align:center;"><a onclick="return confirm('Are you sure ?')" href="{{ url('/place/delete') }}/<?php echo $value['ID'] ?>" ><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a></td>
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
