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
				payoff: $("#inputPayoff").val(),
				year: $("#inputYear").val(),
				others: $("#inputOthers").val()
			};
			$.post("<?=site_url('projectmanage/fu_add')?>",data,function(data,status)
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
		<h4 class="modal-title" id="myModalLabel">经费情况</h4>
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
		    <label for="inputYear" class="col-sm-2 control-label">年份</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputYear" placeholder="Year">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPayoff" class="col-sm-2 control-label">支入</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputPayoff" placeholder="Payoff">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputOthers" class="col-sm-2 control-label">备注</label>
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

