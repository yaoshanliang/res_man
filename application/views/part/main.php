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
          <td>name</td>
          <td>duty</td>
          <td>start</td>
          <td>end</td>
          <td>id</td>
        </tr>
      <?php foreach($part as $item):?>
        <tr>
          <td><?=$item->name?></td>
          <td><?=$item->duty?></td>
          <td><?=$item->start?></td>
          <td><?=$item->end?></td>
          <td><?=$item->id?></td>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>

    <div>
      <form action="<?=site_url('partmanage/add')?>" method="post">
        name<input type="text" name="name"><br/>
        duty<input type="text" name="duty"><br/>
        start<input type="text" name="start"><br/>
        end<input type="text" name="end"><br/>
        id<input type="text" name="id"><br/>
        <input type="submit">
      </form>
    </div>

    <div>
      <form action="<?=site_url('partmanage/delete')?>" method="post">
        name<input type="text" name="name"><br/>
        duty<input type="text" name="duty"><br/>
        id<input type="text" name="id"><br/>
        <input type="submit">
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>