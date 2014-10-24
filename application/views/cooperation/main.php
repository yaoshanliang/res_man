<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国际合作</title>

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
          <td>category</td>
          <td>list</td>
          <td>number</td>
          <td>place</td>
          <td>purpose</td>
          <td>url</td>
          <td>news</td>
          <td>picture</td>
        </tr>
      <?php foreach($cooperation as $item):?>
        <tr>
          <td><?=$item->category?></td>
          <td><?=$item->list?></td>
          <td><?=$item->number?></td>
          <td><?=$item->place?></td>
          <td><?=$item->purpose?></td>
          <td><?=$item->url?></td>
          <td><?=$item->news?></td>
          <td><?=$item->picture?></td>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>
    
    <div>
      <form action="<?=site_url('cooperationmanage/add')?>" method="post">
        category<input type="text" name="category"><br/>
        list<input type="text" name="list"><br/>
        number<input type="text" name="number"><br/>
        place<input type="text" name="place"><br/>
        purpose<input type="text" name="purpose"><br/>
        url<input type="text" name="url"><br/>
        news<input type="text" name="news"><br/>
        picture<input type="text" name="picture"><br/>
        <input type="submit">
      </form>
    </div>

    <div>
      <form action="<?=site_url('cooperationmanage/delete')?>" method="post">
        category<input type="text" name="category"><br/>
        purpose<input type="text" name="purpose"><br/>
        place<input type="text" name="place"><br/>
        <input type="submit">
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>