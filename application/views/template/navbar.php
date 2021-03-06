<header>
  <div class="container-fluid">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><i class="fa fa-home fa-fw"></i>&nbsp;SRAMP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?=site_url('welcome/home')?>"><i class="fa fa-anchor"></i>&nbsp;首页</a></li>
            <li><a href="<?=site_url('search/index')?>"><i class="fa fa-search"></i>&nbsp;系统查询</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i>&nbsp;信息维护 <span class="caret"></span></a>
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
                <li class="divider"></li>
                <li><a href="<?=site_url('validationmanage/index')?>">鉴定验收信息</a></li>
                <li><a href="<?=site_url('awardmanage/index')?>">获奖情况信息</a></li>
              </ul>
            </li>
            <li><a href="<?=site_url('export/index')?>"><i class="fa fa-file"></i>&nbsp;导出文件</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=site_url('adminmanage/modify')?>"><i class="fa fa-key"></i>&nbsp;修改密码</a></li>
            <li><a href="<?=site_url('adminmanage/logout')?>"><i class="fa fa-user"></i>&nbsp;注销</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
</header>

<div class="container">
      <br/>
      <br/>
      <div class="page-header">
        <h1>科研成果管理平台 <small>Scientific Research Achievement Manage Platform</small></h1>
      </div>
</div>