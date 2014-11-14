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
      $("#selectMode").children().eq($("#currentMode").text()).attr("selected","selected");
      $("#selectMode").change(function()
      {
        $("#modeControl").submit();
      });
    });
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">未来世界</h3>

        <p hidden id="currentMode"><?php echo $this->session->userdata('mode')?></p>
        <div class="col-md-1 col-md-offset-10 text-right">
          <form action="<?=site_url('modecontroller/changemode')?>" method="post" id="modeControl">
            <select class="form-control" name="mode" id="selectMode">
              <option value="0">查询</option>
              <option value="1">维护</option>
              <option value="2">管理</option>
            </select>
            <input type="text" name="from" value="<?=site_url('future/index')?>" hidden>
          </form>
        </div>

      </div>
      <hr/>
    <div>
    
    <?=$mode?>

    <?php $this->load->view('template/footer') ?>
  </body>
</html>