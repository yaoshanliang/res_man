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
    $(document).ready(function()
    {
      $("#back").click(function()
      {
        history.back();
      });
    });
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">系统查询</h3>
      </div>
      <div class="col-md-1">
        <a class="btn btn-success" id="back"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
      </div>
      <br>
      <hr/>

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="<?=site_url('search/index')?>">人员综合信息查询</a></li>
        <li role="presentation"><a href="<?=site_url('search/project')?>">项目信息查询</a></li>
        <li role="presentation"><a href="<?=site_url('search/year')?>">按年度查询</a></li>
        <li role="presentation"  class="active"><a href="<?=site_url('search/work')?>">计算工作量</a></li>
      </ul>
      <br/>
      
      <div class="alert alert-warning text-center" role="alert">
        <h4><?=$personname?>在<?=$year?>年科研工作量为：</h4>
      </div>
      <div class="col-md-6 col-md-offset-3">
      <ul class="list-group">
        <li class="list-group-item list-group-item-info">
          <span class="badge"><?=$project_score?></span>
          科研经费分值
        </li>
        <li class="list-group-item list-group-item-info">
          <span class="badge"><?=$patent_score?></span>
          专利分值
        </li>
      </ul>
      </div>
    </div>
    <?php $this->load->view('template/footer') ?>
    
  </body>
</html>