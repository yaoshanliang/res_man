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
        <li role="presentation" class="active"><a href="<?=site_url('search/work')?>">计算工作量</a></li>
      </ul>
      <br/>
      <form role="form" class="form-horizontal" action="<?=site_url('search/aboutWork')?>" method="post">
        <div class="form-group">
          <label for="inputPerson" class="col-sm-2 control-label">人员名称</label>
          <div class="col-sm-8">
            <input type="text" name="person" class="form-control" id="inputPerson">
          </div>
        </div>
        <div class="form-group">
          <label for="inputYear" class="col-sm-2 control-label">年度</label>
          <div class="col-sm-8">
            <input type="text" name="year" class="form-control" id="inputYear">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-default">查询</button>
          </div>
        </div>
      </form>

    <?php $this->load->view('template/footer') ?>
    </div>
  </body>
</html>