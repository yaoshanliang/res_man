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
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">导出文件</h3>
      </div>
      <hr/>
    <div>
    <form class="form-inline" role="form" action="<?=site_url('export/do_export')?>" method="post">
          <div class="form-group">
            <label for="inputType" class="sr-only">类别</label>
            <input type="text" class="form-control" id="inputType" name="type" placeholder="类型">
          </div>
          <div class="form-group">
            <label for="inputFilename" class="sr-only">类别</label>
            <input type="text" class="form-control" id="inputFilename" name="filename" placeholder="文件名">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">导出</button>
        </div>
        </form>

    <?php $this->load->view('template/footer') ?>
  </body>
</html>