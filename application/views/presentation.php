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
  <link href="<?=base_url()?>css/carpela.css" rel="stylesheet">
  <link href="<?=base_url()?>css/poster.css" rel="stylesheet">
  <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
  <script src="<?=base_url()?>js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
</head>
<body class="poster">
<div class="container">
  
  <nav class="navbar navbar-default navbar-fixed-top poster-navbar" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="<?=site_url('welcome/home')?>"><i class="fa fa-home fa-fw"></i>&nbsp;SRAMP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?=site_url('welcome/home')?>"><i class="fa fa-anchor"></i>&nbsp;首页</a></li>
            <li><a href="#"><i class="fa fa-search"></i>&nbsp;系统查询</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i>&nbsp;信息维护 <span class="caret"></span></a>
            </li>
            <li><a href="#"><i class="fa fa-file"></i>&nbsp;导出文件</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-key"></i>&nbsp;修改密码</a></li>
            <li><a href="#"><i class="fa fa-user"></i>&nbsp;注销</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  
  <h1 class="page-header poster-head">科研成果管理平台</h1>



<div class="row">
  <div class="col-xs-3 poster-frame">
    <div class="thumbnail">
      <img src="/assets/poster-main.png">
      <div class="caption">
        <h4>优雅的界面设计</h4>
        <p>让您在繁多的信息中也能够拥有清爽的体验</p>
      </div>
    </div>
  </div>
  
  <div class="col-xs-6">
  <h3 class="line1">还在为复杂繁琐的科研信息杂乱无章而烦恼吗？</h3>
  <h3 class="line2">还在为年终考核的各种报表而辛苦劳累吗？</h3>
  <h3 class="line3">还在为找不到一款好用的管理维护平台而发愁吗？</h3>
  <h3 class="line4">Just hand for me</h3>
  <h4 class="line5"><i class="fa fa-hand-o-right"></i> <a href="<?=site_url('welcome/home')?>">http://sramp.carpela-lg.com/index.php/welcome/home</a></h4>
  <h3 class="line6">to get a new vision, a new experience !</h3>
  </div>
  <div class="col-xs-3 poster-frame">
    <div class="thumbnail">
      <img src="/assets/poster-item3.png">
      <div class="caption">
        <h4>便捷的操作设计</h4>
        <p>让您从复杂的信息中亲身体验精简操作的魅力</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
 <div class="col-xs-2">
    
  </div>
<div class="col-xs-3 poster-frame">
    <div class="thumbnail">
      <img src="/assets/poster-item2.png">
      <div class="caption">
        <h4>丰富的功能设计</h4>
        <p>不仅能够维护信息，还提供各种丰富查询及报表功能</p>
      </div>
    </div>
  </div>
  
  <div class="col-xs-1"></div>
  
  <div class="col-xs-3 poster-frame">
    <div class="thumbnail">
      <img src="/assets/poster-item4.png">
      <div class="caption">
        <h4>优秀的细节设计</h4>
        <p>为丰富的功能和一流的用户体验保驾护航</p>
      </div>
    </div>
  </div>
  <div class="col-xs-3 notation">
    <h5>我们乐意做您最得意的信息管家，为你提供最精致的服务</h5>
    <h4>Copyright <i class="fa fa-copyright"></i> The-Traitorous-FC</h4>
    <p>Harbin Institute of Technology 2014</p>
  </div>
  
</div>

  <hr/>
</div>
</body>
</html>