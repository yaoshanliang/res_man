<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>人员信息</title>
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
        var index = $(event.target).index(); //列索引
        if(index==0)
        {
          var data = { id: $(event.target).text() };
          $.post("<?=site_url('personmanage/delete')?>",data,function(res,status)
          {
            alert(res);
          });
          return;
        }
        var colname = $(event.target).parent().parent().children().first().children().eq(index).html();//列名
        var value = $(event.target).text();
        var result = prompt("请输入新的"+colname+":",value);
        if(result == "" || result== null) //取消 输入为空 则不修改
          return;
        var opid = $(event.target).parent().children().first().html();
        if(index == 1)
        {
          var data={ id: opid, name: result };
        }else
        {
          var data={ id: opid, duties: result };
        }
        $.post("<?=site_url('personmanage/modify')?>",data,function(res,status)
        {
          alert(res);
        });
      });
    });
    </script>
  </head>
  <body>

      <table class="table table-striped table-hover">
        <tr>
          <td>编号(点击删除)</td>
          <td>姓名(点击修改)</td>
          <td>职务(点击修改)</td>
        </tr>
      <?php foreach($person as $item): ?>
        <tr>
          <td><?=$item->id?></td>
          <td><?=$item->name?></td>
          <td><?=$item->duties?></td>
        </tr>
      <?php endforeach; ?>
      </table>

  </body>
</html>