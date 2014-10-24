<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>人员信息管理</title>

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
    <div>
      <table>
        <caption>所有人员信息</caption>
        <tr>
          <td>编号</td>
          <td>姓名</td>
          <td>职务</td>
        </tr>
      <?php foreach($person as $item): ?>
        <tr>
          <td><?=$item->id?></td>
          <td><?=$item->name?></td>
          <td><?=$item->duties?></td>
        </tr>
      <?php endforeach; ?>
      </table>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>