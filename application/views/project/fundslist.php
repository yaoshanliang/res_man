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
        <h3 class="text-center">项目<?=$project->name?>详细信息维护</h3>
      </div>
      <hr/>
    <div>
    <a class="btn btn-success" id="refresh_list"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
    <hr/>
    <h4 class="text text-success">您可以为名单制定新的顺序(1-9)：</h4>
    <div class="row col-sm-offset-2" id="upload" >
        <form role="form" class="form-horizontal" action="<?=site_url('projectmanage/new_funds')?>" method="post">
	        <div hidden>
	           <input type="text" class="form-control" name="number" value="<?=$number?>">
	        </div>
	      	<?php 
                $a = intval($project->start);
                $b = intval($project->end);
                for($i = $a;$i<$b+1;$i++):
            ?>
	      	
			  <div class="form-group">
			    <label class="col-sm-2 control-label"><?=$i?>
				</label>
			    <div class="col-sm-2">
			      <input type="text" name="<?=$i?>" class="form-control" placeholder="金额">
			    </div>
                <div class="col-sm-2">
                  <input type="text" name="<?=$i?>_others" class="form-control" placeholder="备注">
                </div>
			  </div>
			 
			<?php endfor; ?>
	         <button type="submit" class="col-sm-offset-2 btn btn-default">确定</button>
        </form>
    </div>
   

    
<?php $this->load->view('template/footer') ?>
  </body>
</html>