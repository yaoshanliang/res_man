<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国际合作信息</title>
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $("table tr:gt(0)").click(function()
      {
          $(event.target).parent().children().html();
          // var data = { id: $(event.target).text() };
          // $.post("<?=site_url('coopeartionmanage/delete')?>",data,function(res,status)
          // {
          //   alert(res);
          // });
      });
    });
    </script>
  </head>
  <body>

      <table class="table table-striped table-hover">
        <tr>
          <td>类别</td>
          <td>人员清单</td>
          <td>人数</td>
          <td>来访／目的地</td>
          <td>目的</td>
          <td>链接</td>
          <td>新闻报道</td>
          <td>照片保留</td>
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

  </body>
</html>