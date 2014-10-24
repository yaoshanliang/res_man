<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>项目管理页面</title>

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
        <tr>
          <td>projectid</td>
          <td>name</td>
          <td>source</td>
          <td>level</td>
          <td>principal</td>
          <td>start</td>
          <td>end</td>
          <td>money</td>
          <td>currency</td>
          <td>contract</td>
          <td>credit</td>
          <td>type</td>
        </tr>
      <?php foreach($project as $item): ?>
        <tr>
          <td><?=$item->projectid?></td>
          <td><?=$item->name?></td>
          <td><?=$item->source?></td>
          <td><?=$item->level?></td>
          <td><?=$item->principal?></td>
          <td><?=$item->start?></td>
          <td><?=$item->end?></td>
          <td><?=$item->money?></td>
          <td><?=$item->currency?></td>
          <td><?=$item->contract?></td>
          <td><?=$item->credit?></td>
          <td><?=$item->type?></td>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>

    <div>
      <form action="<?=site_url('projectmanage/add')?>" method="post">
        name<input type="text" name="name"><br/>
        source<input type="text" name="source"><br/>
        level<input type="text" name="level"><br/>
        principal<input type="text" name="principal"><br/>
        start<input type="text" name="start"><br/>
        end<input type="text" name="end"><br/>
        money<input type="text" name="money"><br/>
        currency<input type="text" name="currency"><br/>
        contract<input type="text" name="contract"><br/>
        credit<input type="text" name="credit"><br/>
        type<input type="text" name="type"><br/>
        <input type="submit">
      </form>
    </div>

    <div>
      <form action="<?=site_url('projectmanage/modify')?>" method="post">
        projectid<input type="text" name="projectid"><br/>
        name<input type="text" name="name"><br/>
        source<input type="text" name="source"><br/>
        level<input type="text" name="level"><br/>
        principal<input type="text" name="principal"><br/>
        start<input type="text" name="start"><br/>
        end<input type="text" name="end"><br/>
        money<input type="text" name="money"><br/>
        currency<input type="text" name="currency"><br/>
        contract<input type="text" name="contract"><br/>
        credit<input type="text" name="credit"><br/>
        type<input type="text" name="type"><br/>
        <input type="submit">
      </form>
    </div>

    <div>
      <form action="<?=site_url('projectmanage/delete')?>">
        projectid<input type="text" name="projectid"><br/>
        <input type="submit">
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>