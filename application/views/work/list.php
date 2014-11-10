<script type="text/javascript">
$(document).ready(function()
{
  $("table tr:gt(0)").click(function()
  {
    var index = $(event.target).index(); //列索引
    var current_mode = $("#currentMode").text();
    if(current_mode == 0)
    {
      return;
    }else if(current_mode == 2)
    {
      var data = {
            number: $(event.target).parent().children().first().html()
          };
      $.post("<?=site_url('workmanage/delete')?>",data,function(res,status)
      {
        $("#refresh_list").click();
        alert(res);
      });
      return;
    }else if(current_mode == 1)
    {
      var colname = $(event.target).parent().parent().children().first().children().eq(index).html();//列名
      var value = $(event.target).text();
      var result = prompt("请输入新的"+colname+":",value);
      if(result == "" || result== null) //取消 输入为空 则不修改
        return;
      var opid = $(event.target).parent().children().first().html();
      if(index == 1)
      {
        var data={ number: opid, name: result, which: 'name' };
      }else if(index==2)
      {
        var data={ number: opid, publisher: result, which: 'publisher' };
      }else if(index==3)
      {
        var data={ number: opid, publishdate: result, which: 'publishdate' };
      }else if(index ==4)
      {
        var data={ number: opid, personlist: result, which: 'personlist'};
      }
      $.post("<?=site_url('workmanage/modify')?>",data,function(res,status)
      {
        $("#refresh_list").click();
        alert(res);
      });
    }
  });
});
</script>

<table class="table table-striped table-hover">
  <tr>
    <td hidden>编号</td>
    <td>专著名称</td>
    <td>出版商</td>
    <td>出版时间</td>
    <td>人员列表</td>
  </tr>
<?php foreach($work as $item): ?>
  <tr>
    <td hidden><?=$item->number?></td>
    <td><?=$item->name?></td>
    <td><?=$item->publisher?></td>
    <td><?=$item->publishdate?></td>
    <td><?=$item->personlist?></td>
  </tr>
<?php endforeach; ?>
</table>
