<html lang="zh-cn">
<head>
<meta charset="utf-8">
<script type="text/javascript">
	$(document).ready(function(){
		$(":submit").click(function()
		{
			var data = 
			{
				projectid: $("#inputProjectid").val(),
				institute: $("#inputInstitue").val(),
				time: $("#inputTime").val(),
				others: $("#inputOthers").val()
			};
			$.post("<?=site_url('projectmanage/va_add')?>",data,function(data,status)
				{
					alert(data);
				});
			window.location="<?=site_url('projectmanage/index')?>";
		});
	});

</script>
</head>
	<body>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">鉴定验收</h4>
	</div>
	<div class="modal-body">
	    <form class="form-horizontal" role="form">
	      
	      <div class="form-group">
		    <label for="inputProjectid" class="col-sm-2 control-label">项目编号</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputProjectid" placeholder="Project ID">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputTime" class="col-sm-2 control-label">时间</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputTime" placeholder="Time">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputInstitute" class="col-sm-2 control-label">组织单位</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputInstitute" placeholder="Institute">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputOthers" class="col-sm-2 control-label">备注信息</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputOthers" placeholder="Others">
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

