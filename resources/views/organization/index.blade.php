@extends('app')
@section('title', 'หน่วยงาน')
@section('topic', 'หน่วยงาน')

@section('content')
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="add">เพิ่มหน่วยงาน</button>
	<table>
		<?php foreach($organization as $key=>$value){ ?>
			<tr class="table-parent" id="catparent-<?php echo $value['ID'] ?>">
				<th>
					<div style="float: left;"><?php echo $value['name']; ?></div>
					<a onclick="return confirm('Are you sure ?')" style="float:right" href="{{ url('/organization/delete') }}/<?php echo $value['ID'] ?>" >&nbsp;<i class="fa fa-trash" aria-hidden="true"></i>  ลบ</a>
					<a style="float:right" data-toggle="modal" data-target="#exampleModal" data-whatever="edit-<?php echo $value['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>

				</th>
				<?php foreach($organization[$key]['child'] as $key2=>$value2){ ?>
					<tr class="table-child catparent-<?php echo $value['ID'] ?>">
						<td>
							<div style="float: left;"><?php echo $value2['name']; ?></div>
							<a onclick="return confirm('Are you sure ?')" style="float:right" href="{{ url('/organization/delete') }}/<?php echo $value2['ID'] ?>" >&nbsp;<i class="fa fa-trash" aria-hidden="true"></i>  ลบ</a>
							<a style="float:right" data-toggle="modal" data-target="#exampleModal" data-whatever="edit-<?php echo $value2['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>
						</td>
					</tr>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('url' => 'organization/save','files'=>true)) !!}
        	<?php echo Form::text('ID','', array('style' => 'display:none')); ?>
	          <div class="form-group">
	            <label for="recipient-name" class="control-label">ชื่อ</label>
	            <input type="text" class="form-control tab-pane fade in active" name="name" id="name" placeholder="ชื่อหน่วยงาน" required>
	          </div>
	         
			<div style="clear:both"><br>
	          <!-- <div class="form-group">
				<label class="col-form-label" for="parentID">หมวดหมู่หลัก:</label>
				<div>
					<select class="form-control province" id="parentID" name="parentID">
						<option value="0">ไม่มีหมวดหมู่</option>
						<?php foreach($organization as $key=>$value){?>
						<option value="<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></option>
					<?php } ?>
					</select>
				</div>
			</div> -->

      </div>
      <div class="modal-footer">
      	{!! Form::submit('Send', ['class' => 'btn btn-large btn-primary'])!!}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	var i = 0;
	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		if(recipient == 'add'){
			modal.find('.modal-title').text('เพิ่มหน่วยงาน')
		}else{
			modal.find('.modal-title').text('แก้ไขหน่วยงาน')
			var catid = recipient.split("-");
			i = 22;
			$.ajax({
			    url: "{{ url('/organization/getorganization') }}",
			    type: "post",
			    data: {'catid':catid[1]},
			    success: function(data){
			    	modal.find(".modal-body input[name='ID']").val(data[0]['ID'])
			      	modal.find('.modal-body #name').val(data[0]['name'])
			      	// modal.find('.modal-body #parentID').val(data[0]['parentID'])
			      	
			    }
			});
		}

	});

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
.modal-backdrop.in{
	z-index: 1000;
}
</style>
@endsection
