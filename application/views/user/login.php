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
  </head>
  <body class="tour-warp">
    <div class="container">
      <br/>
      <br/>
      <h1 class="page-header">科研成果管理平台</h1>
      <br/>
      <br/>
      <div class="col-sm-6 col-sm-offset-7">
        <form class="form-horizontal" role="form" action="<?=base_url()?>index.php/welcome/login" method="post">
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-5">
              <input type="email" class="form-control" id="inputEmail" name="user" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputCaptcha" class="col-sm-2 control-label">验证码</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputCaptcha" placeholder="Captcha" name="captcha">
            </div>
          </div>
          <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-5">
             <?=$image?>
          </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">登录</button>
            </div>
          </div>
        </form>
        </div>
    </div>
    <?php $this->load->view("template/footer") ?>
  </body>
</html>