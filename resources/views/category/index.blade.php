@extends('app')
@section('title', 'CATEGORY')
@section('topic', 'CATEGORY')

@section('content')
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="add">เพิ่มหมวดหมู่</button>
	<table>
		<?php foreach($category as $key=>$value){ ?>
			<tr class="table-parent" id="catparent-<?php echo $value['ID'] ?>">
				<th>
					<div style="float: left;"><?php echo $value['name']; ?></div>
					<a onclick="return confirm('Are you sure ?')" style="float:right" href="{{ url('/category/delete') }}/<?php echo $value['ID'] ?>" >&nbsp;<i class="fa fa-trash" aria-hidden="true"></i>  ลบ</a>
					<a style="float:right" data-toggle="modal" data-target="#exampleModal" data-whatever="edit-<?php echo $value['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>

				</th>
				<?php foreach($category[$key]['child'] as $key2=>$value2){ ?>
					<tr class="table-child catparent-<?php echo $value['ID'] ?>">
						<td>
							<div style="float: left;"><?php echo $value2['name']; ?></div>
							<a onclick="return confirm('Are you sure ?')" style="float:right" href="{{ url('/category/delete') }}/<?php echo $value2['ID'] ?>" >&nbsp;<i class="fa fa-trash" aria-hidden="true"></i>  ลบ</a>
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
        {!! Form::open(array('url' => 'category/save','files'=>true)) !!}
        	<?php echo Form::text('ID','', array('style' => 'display:none')); ?>
	          <div class="form-group">
	            <label for="recipient-name" class="control-label">ชื่อ</label>
	            <ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#name_tha">ไทย</a></li>
				  <li><a data-toggle="tab" href="#name_eng">อังกฤษ</a></li>
				  <li><a data-toggle="tab" href="#name_cha">จีน</a></li>
				</ul>
				<div class="tab-content" style="padding: 0px;">
		            <input type="text" class="form-control tab-pane fade in active" name="name_tha" id="name_tha" placeholder="ชื่อ(ไทย)" required>
		            <input type="text" class="form-control tab-pane fade" name="name_eng" id="name_eng" placeholder="ชื่อ(อังกฤษ)">
		            <input type="text" class="form-control tab-pane fade" name="name_cha" id="name_cha" placeholder="ชื่อ(จีน)">
		        </div>
	          </div>
	          <div class="form-group col-xs-6" id="piccolorclass">
				<label class="control-label">โลโก้สี</label>
				<input id="piccolor" name="piccolor" type="file" class="file" data-show-upload="false" data-show-caption="true" required>
			</div><div style="clear:both"><br>
			<div class="form-group col-xs-6" id="picblackclass">
				<label class="control-label">โลโก้ขาวดำ</label>
				<input id="picblack" name="picblack" type="file" class="file" data-show-upload="false" data-show-caption="true" required>
			</div><div style="clear:both"><br>
	          <div class="form-group">
				<label class="col-form-label" for="parentID">หมวดหมู่หลัก:</label>
				<div>
					<select class="form-control province" id="parentID" name="parentID">
						<option value="0">ไม่มีหมวดหมู่</option>
						<?php foreach($category as $key=>$value){?>
						<option value="<?php echo $value['ID'] ?>"><?php echo $value['name'] ?></option>
					<?php } ?>
					</select>
				</div>
			</div>

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
			modal.find('.modal-title').text('เพิ่มหมวดหมู่')
		}else{
			modal.find('.modal-title').text('แก้ไขหมวดหมู่')
			var catid = recipient.split("-");
			i = 22;
			var pathimg = "<?php echo URL::to('/'); ?>/uploads/category/"+i+"/black.png";
			console.log(pathimg);
			$.ajax({
			    url: "{{ url('/category/getcategory') }}",
			    type: "post",
			    data: {'catid':catid[1]},
			    success: function(data){
			    	modal.find(".modal-body input[name='ID']").val(data[0]['ID'])
			      	modal.find('.modal-body #name_tha').val(data[0]['name_tha'])
			      	modal.find('.modal-body #name_eng').val(data[0]['name_eng'])
			      	modal.find('.modal-body #name_cha').val(data[0]['name_cha'])
			      	modal.find('.modal-body #parentID').val(data[0]['parentID'])
			      	modal.find('.modal-body #picblackclass').html('<label class="control-label">โลโก้ขาวดำ</label><input id="picblack" name="picblack" type="file" class="file" data-show-upload="false" data-show-caption="true">')
			      	modal.find('.modal-body #piccolorclass').html('<label class="control-label">โลโก้สี</label><input id="piccolor" name="piccolor" type="file" class="file" data-show-upload="false" data-show-caption="true">')
			      	var catid = data[0]['ID'];
					var catblack = data[0]['picblack'];
					var pathimgblack = "<?php echo URL::to('/'); ?>/uploads/category/"+catid+"/"+catblack;
					var catcolor = data[0]['piccolor'];
					var pathimgcolor = "<?php echo URL::to('/'); ?>/uploads/category/"+catid+"/"+catcolor;
					console.log(pathimgcolor);
				    $("#picblack").fileinput({
				        initialPreview: [
				          pathimgblack,
				        ],
				        initialPreviewAsData: true,
				        initialPreviewConfig: [
				            {caption: 'catblack', size: 930321, width: "120px", key: 1}
				        ],
				        // deleteUrl: "{{ url('/place/deleteimg') }}",
				        autoReplace: true,
				        overwriteInitial: true,
				        maxFileSize: 100,
				        initialCaption: 'catblack',
				    });
				    $("#piccolor").fileinput({
				        initialPreview: [
				            pathimgcolor
				        ],
				        initialPreviewAsData: true,
				        initialPreviewConfig: [
				            {caption: catcolor, size: 930321, width: "120px", key: 1}
				        ],
				        // deleteUrl: "{{ url('/place/deleteimg') }}",
				        autoReplace: true,
				        overwriteInitial: true,
				        maxFileSize: 100,
				        initialCaption: catcolor,
				    });
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
