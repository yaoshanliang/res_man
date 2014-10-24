<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

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
          <td>institute</td>
          <td>content</td>
          <td>start</td>
          <td>end</td>
          <td>list</td>
        </tr>
      <?php foreach($learn as $item):?>
        <tr>
          <td><?=$item->institute?></td>
          <td><?=$item->content?></td>
          <td><?=$item->start?></td>
          <td><?=$item->end?></td>
          <td><?=$item->list?></td>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>

    <div>
      <form action="<?=site_url('learnmanage/add')?>" method="post">
        institute<input type="text" name="institute"><br/>
        content<input type="text" name="content"><br/>
        start<input type="text" name="start"><br/>
        end<input type="text" name="end"><br/>
        list<input type="text" name="list"><br/>
        <input type="submit">
      </form>
    </div>

    <div>
      <form action="<?=site_url('learnmanage/delete')?>" method="post">
        institute<input type="text" name="institute"><br/>
        content<input type="text" name="content"><br/>
        <input type="submit">
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>