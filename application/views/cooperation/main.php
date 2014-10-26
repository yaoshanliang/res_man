<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国际合作</title>
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
        $.get("<?=site_url('cooperationmanage/show')?>",function(data,status){
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
          var data = {
            category: $("#inputNewCategory").val(),
            number: $("#inputNewNumber").val(),
            place: $("#inputNewPlace").val(),
            purpose: $("#inputNewPurpose").val()
          };
          $.post("<?=site_url('cooperationmanage/delete')?>",data,function(res,status)
            {
              alert(res);
            }); 
        }else
        {
          var data = {
            category: $("#inputCategory").val(),
            list: $("#inputList").val(),
            number: $("#inputNumber").val(),
            place: $("#inputPlace").val(),
            purpose: $("#inputPurpose").val(),
            url: $("#inputURL").val(),
            news: $("#inputNews").val(),
            picture: $("#inputPicture").val()
          };
          $.post("<?=site_url('cooperationmanage/add')?>",data,function(res,status)
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
        <h3 class="text-center">国际合作信息维护</h3>
      </div>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" id="add_record">添加信息</a>
        <a class="btn btn-default" id="remove_record">删除记录</a>
    </div>
    <br/>
    <div class="row" id="record" hidden>
      <form class="form-horizontal col-sm-6 col-sm-offset-2" role="form" action="<?=site_url('cooperationmanage/add')?>" method="post">
        <div class="form-group">
          <label for="inputCategory" class="col-sm-3 control-label">类别</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputCategory" name="category" placeholder="Category">
          </div>
        </div>
        <div class="form-group">
          <label for="inputList" class="col-sm-3 control-label" name="list">人员列表</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputList" placeholder="List">
          </div>
        </div>
        <div class="form-group">
          <label for="inputNumber" class="col-sm-3 control-label" name="number">人数</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputNumber" placeholder="Number">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPlace" class="col-sm-3 control-label" name="place">来/出访地</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputPlace" placeholder="Place">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPurpose" class="col-sm-3 control-label" name="purpose">目的</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputPurpose" placeholder="Purpose">
          </div>
        </div>
         <div class="form-group">
          <label for="inputURL" class="col-sm-3 control-label" name="url">URL</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputURL" placeholder="URL">
          </div>
        </div>
         <div class="form-group">
          <label for="inputNews" class="col-sm-3 control-label" name="news">新闻报道否</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputNews" placeholder="News">
          </div>
        </div>
         <div class="form-group">
          <label for="inputPicture" class="col-sm-3 control-label" name="picture">照片保存否</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputPicture" placeholder="Picture">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">添加</button>
          </div>
        </div>
      </form>
    </div>
    <div id="remove" hidden>
         <form class="form-inline" role="form" action="<?=site_url('cooperationmanage/delete')?>" method="post">
            <div class="form-group">
              <label for="inputNewCategory" class="sr-only">类别</label>
              <input type="text" class="form-control" id="inputNewCategory" name="category" placeholder="Category">
          </div>
          <div class="form-group">
            <label for="inputNewNumber" class="sr-only" name="number">人数</label>
            <input type="text" class="form-control" id="inputNewNumber" placeholder="Number">
          </div>
          <div class="form-group">
            <label for="inputNewPurpose" class="sr-only" name="purpose">目的</label>
            <input type="text" class="form-control" id="inputNewPurpose" placeholder="Purpose">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">删除</button>
        </div>
    </div>
    <br/>
    <div id="detail">
    </div> 
  </body>
</html>