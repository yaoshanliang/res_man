<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRAMP</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>XXX研究中心科研成果管理平台</h1>
    <h3>信息总览</h3>
    <a href="<?=site_url('admin/modify')?>">管理账户信息</a>
    <hr/>
    <hr/>
    <div>
      <table>
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
          <td>list/td>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>