<script type="text/javascript">
$(document).ready(function()
{
  $("table tr:gt(0)").click(function()
  {
    var index = $(event.target).index(); //列索引
    if(index == 0)
    {
      var data = {
            name: $(event.target).text()
          };
      $.post("<?=site_url('workmanage/delete')?>",data,function(res,status)
      {
        $("#refresh_list").click();
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
      var data={ name: opid, publisher: result, which: 'publisher' };
    }else if(index==2)
    {
      var data={ name: opid, publishdate: result, which: 'publishdate' };
    }else
    {
      var data={ name: opid, personlist: result, which: 'personlist'};
    }
    $.post("<?=site_url('workmanage/modify')?>",data,function(res,status)
    {
      $("#refresh_list").click();
      alert(res);
    });
  });
});
</script>

<table class="table table-striped table-hover">
  <tr>
    <td>专著名称</td>
    <td>出版商</td>
    <td>出版时间</td>
    <td>人员列表</td>
  </tr>
<?php foreach($work as $item): ?>
  <tr>
    <td><?=$item->name?></td>
    <td><?=$item->publisher?></td>
    <td><?=$item->publishdate?></td>
    <td><?=$item->personlist?></td>
  </tr>
<?php endforeach; ?>
</table>
