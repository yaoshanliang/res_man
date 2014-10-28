<html lang="zh-cn">
<head>
<meta charset="utf-8">
<script type="text/javascript">
	$(document).ready(function(){
		$(":submit").click(function()
		{
			var data = 
			{
				id: $("#inputID").val(),
				identifier: $("#inputNumber").val(),
				order: $("#inputOrder").val()
			};
			$.post("<?=site_url('copyrightmanage/cr_add')?>",data);
			window.location="<?=site_url('copyrgihtmanage/index')?>";
		});
	});

</script>
</head>
	<body>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">人员名单</h4>
	</div>
	<div class="modal-body">
	    <form class="form-horizontal" role="form">
	    <div class="form-group">
		    <label for="inputID" class="col-sm-2 control-label">人员编号</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputID" placeholder="Person">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputNumber" class="col-sm-2 control-label">著作权编号</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputNumber" placeholder="Number">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputOrder" class="col-sm-2 control-label">次序</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputOrder" placeholder="Order">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">确认</button>
		    </div>
		  </div>
		</form>
	</div>
	</body>

</html>

