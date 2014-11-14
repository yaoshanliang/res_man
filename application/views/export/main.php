<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>科研成果管理平台</title>
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
        <h3 class="text-center">导出文件</h3>
        <div class="col-md-1">
        <a class="btn btn-success" id="back"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
        </div>
      </div>
      <hr/>
    <div>
    <form class="form-horizontal" role="form" action="<?=site_url('export/do_export')?>" method="post">
          <div class="form-group">
            <label for="inputFilename" class="col-sm-offset-2 col-sm-2 control-label">文件名</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputFilename" name="filename" placeholder="File Name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
              <div class="radio">
                <label>
                  <input type="radio" name="type" value="excel" checked/> EXCEL
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="type" value="pdf" /> PDF 
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
              <button type="submit" class="btn btn-default">导出</button>
            </div>
        </div>
    </form>

    <?php $this->load->view('template/footer') ?>
  </body>
</html>