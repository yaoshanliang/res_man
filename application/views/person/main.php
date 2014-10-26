<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>人员信息管理</title>
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $("#refresh_list").click(function()
      {
        $.get("<?=site_url('personmanage/show')?>",function(data,status){
          $("#detail").html(data);
        });
      });

      $("#refresh_list").click();

      $("#add_record").click(function()
      {
        $("#remove").hide();
        $("#record").toggle();
      });

      $("#remove_record").click(function()
      {
        $("#record").hide();
        $("#remove").toggle();
      });

      $(":submit").click(function()
      {
        $("#record").hide();
        $("#remove").hide();
        if($(event.target).text() == "删除")
        {
          var data = { id: $("#reinputID").val() };
          $.post("<?=site_url('personmanage/delete')?>",data,function(res,status)
            {
              alert(res);
            }); 
        }else
        {
          var data = { id: $("inputID").val(), name: $("#inputName").val(), duties: $("#inputDuty").val() };
          $.post("<?=site_url('personmanage/add')?>",data,function(res,status)
            {
              alert(res);
            });
        }
        // 刷新一次数据 ---这段代码无效
        $("#refresh_list").click(); 
        return false;
      });
    });
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><i class="fa fa-home fa-fw"></i>&nbsp;SRAMP</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?=site_url('welcome/index')?>">首页</a></li>
              <li><a href="#">功能</a></li>
              <li class="dropdown">
                <a href="" class="dropdown-toggle active" data-toggle="dropdown">信息维护 <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?=site_url('personmanage/index')?>">人员信息</a></li>
                  <li><a href="<?=site_url('projectmanage/index')?>">项目信息</a></li>
                  <li><a href="<?=site_url('cooperationmanage/index')?>">国际合作信息</a></li>
                  <li class="divider"></li>
                  <li><a href="<?=site_url('learnmanage/index')?>">成员进修学习信息</a></li>
                  <li><a href="<?=site_url('partmanage/index')?>">学术组织兼职信息</a></li>
                  <li class="divider"></li>
                  <li><a href="<?=site_url('patentmanage/index')?>">专利权信息</a></li>
                  <li><a href="<?=site_url('copyrightmanage/index')?>">软件著作权信息</a></li>
                  <li><a href="<?=site_url('workmanage/index')?>">出版著作信息</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><i class="fa fa-user"></i>&nbsp; 用户</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <div class="container">
      <br/>
      <br/>
      <div class="page-header">
        <h1>科研成果管理平台 <small>Scientific Research Achievement Manage Platform</small></h1>
      </div>
      <div class="row">
        <h3 class="text-center">人员信息维护</h3>
      </div>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新人员列表</a>
        <a class="btn btn-default" id="add_record">添加人员信息</a>
        <a class="btn btn-default" id="remove_record">删除一条记录</a>
    </div>
    <br/>
    <div id="record" hidden>
      <form class="form-inline" role="form" action="<?=site_url('personmanage/add')?>" method="post">
        <div class="form-group">
          <label class="sr-only" for="inputName">姓名</label>
          <input type="text" name="name" class="form-control" id="inputName" placeholder="姓名">
        </div>
         <div class="form-group">
          <label class="sr-only" for="inputDuty">职务</label>
          <input type="text" name="duties" class="form-control" id="inputDuty" placeholder="职责">
        </div>
        <button type="submit" class="btn btn-default">添加</button>
      </form>
    </div>
    <div id="remove" hidden>
         <form class="form-inline" role="form" action="<?=site_url('personmanage/delete')?>" method="post">
          <div class="form-group">
            <label class="sr-only" for="reinputID">编号</label>
            <input type="text" name="id" class="form-control" id="reinputID" placeholder="编号">
          </div>
          <button type="submit" class="btn btn-default">删除</button>
        </form>
    </div>
    <br/>
    <div id="detail">
    </div> 

  </body>
</html>