<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $("[type='submit']").click(function(){
        if(!$("#inputNewPassword").val()||!$("#inputOldPassword").val()||!$("#inputTwicePassword").val()||!$("#inputEmail").val())
        {
          alert("输入数据不完全!");
          return false;
        }
        if($("#inputNewPassword").val() != $("#inputTwicePassword").val())
        {
          alert("两输入密次码不一致!");
          return false;
        }else
        return true;
      });
      if($("#msg").text()==0)
      {
        $("#msg").html("密码修改成功");
        $("#log").show();
      }else if($("#msg").text()==1)
      {
        $("#msg").html("密码修改失败");
        $("#log").show();
      }
    });
    </script>
  </head>
  <body>
    <div class="container">
      <br/>
      <br/>
      <div class="row text-center">
          <img src="<?=base_url()?>assets/icon.png" alt="log" class="img-circle" />
      </div>
      <br/>
      
      <div class="alert alert-info alert-dismissible" role="alert" hidden id="log">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <p id="msg"><?=$msg?></p>
      </div>
      <br/>
      <div class="col-sm-6 col-sm-offset-4">
        <form class="form-horizontal" role="form" action="<?=base_url()?>index.php/adminmanage/modify" method="post">
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-5">
              <input type="email" class="form-control" id="inputEmail" name="user" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputOldPassword" class="col-sm-2 control-label">原密码</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" id="inputOldPassword" name="oldpassword" placeholder="Old Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" id="inputNewPassword" name="newpassword" placeholder="New Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTwicePassword" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" id="inputTwicePassword" placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">修改</button>
              <a href="<?=site_url('welcome/index')?>" class="btn btn-default">返回首页</a>
            </div>
          </div>
        </form>
        </div>
    </div>

  </body>
</html>