<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>科研成果管理平台</title>
    <link href="<?=base_url()?>assets/logo.ico" rel="shortcut icon">
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    	$("#refresh_list").click(function()
    	{
    		history.back();
    	});
    });
    </script>
  </head>
  <body>
    <?php $this->load->view('template/navbar') ?>
 	
    <div class="container">
      <div class="row">
        <h3 class="text-center"><?=$awardname?>获奖情况详细信息维护</h3>
      </div>
      <hr/>
    <div>
    <a class="btn btn-success" id="refresh_list"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
    <hr/>
    <h4 class="text text-success">您可以重新选择项目：</h4>
    <div class="row col-sm-offset-2" id="upload" >
        <form role="form" class="form" action="<?=site_url('awardmanage/pr_add')?>" method="post">
	        <div hidden>
	           <input type="text" class="form-control" name="number" value="<?=$number?>">
	        </div>
	      	<?php foreach($project as $item):?>
	      	<div class="checkbox">
			  <label>
			    <input name="select_project[]" type="checkbox" value="<?=$item->projectid?>">
			    <?=$item->name?>
			  </label>
			</div>
			<?php endforeach; ?>
	         <button type="submit" class="btn btn-default">确定</button>
        </form>
    </div>
   

    
<?php $this->load->view('template/footer') ?>
  </body>
</html>