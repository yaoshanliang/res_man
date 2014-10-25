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
      $("#refresh").click(function()
      {
        $.get("<?=site_url('personmanage/show')?>",function(data,status){
          $("#detail").html(data);
        });
      });
      $("#refresh").click();
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
    <div><a class="btn btn-default" id="refresh">刷新人员列表</a></div>
    <br/>
    <div id="detail">
    </div> 


    <h3>添加</h3>
    <form action="<?=site_url('personmanage/add')?>">
      编号<input type="text" name="id"><br/>
      姓名<input type="text" name="name"><br/>
      职务<input type="text" name="duties"><br/>
      <input type="submit">
    </form>
    <h3>修改</h3>
    <form action="<?=site_url('personmanage/modify')?>">
      编号<input type="text" name="id"><br/>
      姓名<input type="text" name="name"><br/>
      职务<input type="text" name="duties"><br/>
      <input type="submit">
    </form>
    <h3>删除</h3>
    <form action="<?=site_url('personmanage/delete')?>">
      编号<input type="text" name="id"><br/>
      <input type="submit">
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>