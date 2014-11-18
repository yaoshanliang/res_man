<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link href="<?=base_url()?>assets/logo.ico" rel="shortcut icon">
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/carpela.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $.get("<?=site_url('welcome/getCaptcha')?>",function(res,status)
      {
        $("#captcha").html(res);
      });

      $("#captcha").click(function()
      {
        $.get("<?=site_url('welcome/getCaptcha')?>",function(res,status)
      {
        $("#captcha").html(res);
      });
      });
    });
    </script>
  </head>
  <body class="tour-warp">
    <div class="container">
      <!-- <img src="<?=base_url()?>assets/icon.png" alt="log" class="img-circle" /> -->
      <h1 class="page-header text-center">科研成果管理平台</h1>
      <br/>
      <div class="col-sm-3">
          <img src="<?=base_url()?>assets/tour_1.png" alt="项目管理"/>
          <br/>
          <h4>信息管理</h4>
          管理科研成果包括项目相关信息<br>
          让复杂混乱的信息变得简单清晰
      </div>
      <div class="col-sm-3">
          <img src="<?=base_url()?>assets/tour_4.png" alt="极致体验"/>
          <br/>
          <h4>极致体验</h4>
          三种操作模式，一切基于鼠标点击<br>
          让查询，修改，删除变得轻而易举
      </div>
      <div class="col-sm-4 col-sm-offset-1 login">
        <br>
        <br>
        <form class="form-horizontal" role="form" action="<?=base_url()?>index.php/welcome/login" method="post">
          <div class="form-group">
            <label for="inputEmail" class="col-sm-3 control-label">邮箱</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="inputEmail" name="user" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-3 control-label">密码</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputCaptcha" class="col-sm-3 control-label">验证码</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputCaptcha" placeholder="Captcha" name="captcha">
            </div>
          </div>
          <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-4" id="captcha">
          </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
              <button type="submit" class="btn btn-default">登录</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php $this->load->view("template/footer") ?>
  </body>
</html>