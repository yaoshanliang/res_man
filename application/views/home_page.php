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
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
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
          <a class="navbar-brand" href="#">SRAMP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">首页</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>

  <div class="container">
      <br/>
      <br/>
      <div class="page-header">
      <h1>科研成果管理平台 <small>Scientfific Research Achievement Manage Platform</small></h1>
      </div>
      <h3>信息总览</h3>
        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="主要信息概览">
        信息总览
        </button>
      <a href="<?=site_url('admin/modify')?>">管理账户信息</a>
      <hr/>
      <hr/>
  
      <div class="row" 

      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">人员信息</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover">
            <caption><a href="<?=site_url('personmanage/index')?>">人员信息</a></caption>
            <tr>
              <td>ID</td>
              <td>Name</td>
            </tr>
          <?php foreach($person as $item): ?>
            <tr>
              <td><?=$item->id?></td>
              <td><?=$item->name?></td>
            </tr>
          <?php endforeach; ?>
          </table>
        </div>
        <div class="panel-footer">
          Panel footer
        </div>
      </div>

      
      <hr/>
      <hr/>

      <div>
        <table>
        <caption><a href="<?=site_url('projectmanage/index')?>">项目列表</a></caption>
          <tr>
            <td>name</td>
            <td>source</td>
            <td>principal(ID)</td>
          </tr>
        <?php foreach($project as $item):?>
          <tr>
            <td><?=$item->name?></td>
            <td><?=$item->source?></td>
            <td><?=$item->principal?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>

      <hr>
      <hr>

      <div>
        <table>
          <caption><a href="<?=site_url('cooperationmanage/index')?>">国际合作</a></caption>
          <tr>
            <td>category</td>
            <td>list</td>
            <td>place</td>
            <td>purpose</td>
          </tr>
        <?php foreach($cooperation as $item): ?>
          <tr>
            <td><?=$item->category?></td>
            <td><?=$item->list?></td>
            <td><?=$item->place?></td>
            <td><?=$item->purpose?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>

      <hr>
      <hr>

      <div>
        <table>
          <caption><a href="<?=site_url('patentmanage/index')?>">专利权</a></caption>
          <tr>
            <td>name</td>
            <td>person</td>
            <td>time</td>
          </tr>
        <?php foreach($patent as $item): ?>
          <tr>
            <td><?=$item->name?></td>
            <td><?=$item->person?></td>
            <td><?=$item->time?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>

      <hr>
      <hr>

      <div>
        <table>
          <caption><a href="<?=site_url('copyrightmanage/index')?>">软件著作权</a></caption>
          <tr>
            <td>name</td>
            <td>person</td>
            <td>time</td>
          </tr>
        <?php foreach($copyright as $item): ?>
          <tr>
            <td><?=$item->name?></td>
            <td><?=$item->person?></td>
            <td><?=$item->time?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
      <hr>
      <hr>
      <div>
        <table>
          <caption><a href="<?=site_url('workmanage/index')?>">出版专著情况</a></caption>
          <tr>
            <td>name</td>
            <td>publisher</td>
            <td>personlist</td>
          </tr>
        <?php foreach($work as $item): ?>
          <tr>
            <td><?=$item->name?></td>
            <td><?=$item->publisher?></td>
            <td><?=$item->personlist?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
      <hr>
      <hr>
      <div>
        <table>
          <tr>
            <caption><a href="<?=site_url('partmanage/index')?>">学术组织兼职情况</a></caption>
            <td>name</td>
            <td>duty</td>
            <td>id</td>
          </tr>
        <?php foreach($part as $item): ?>
          <tr>
            <td><?=$item->name?></td>
            <td><?=$item->duty?></td>
            <td><?=$item->id?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
      <hr>
      <hr>
      <div>
        <table>
          <caption><a href="<?=site_url('learnmanage/index')?>">成员进修学习情况</a></caption>
          <tr>
            <td>institute</td>
            <td>content</td>
            <td>list</td>
          </tr>
        <?php foreach($learn as $item): ?>
          <tr>
            <td><?=$item->institute?></td>
            <td><?=$item->content?></td>
            <td><?=$item->list?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
  </div>
  </body>
</html>