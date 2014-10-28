<script type="text/javascript">
$(document).ready(function()
{
  $("table tr:gt(0)").click(function()
  {
    var index = $(event.target).index(); //列索引
    if(index==0)
    {
      var data = { number: $(event.target).text() };
      $.post("<?=site_url('learnmanage/delete')?>",data,function(res,status)
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
      var data={ number: opid, institute: result, which: 'institute' };
    }else if(index == 2)
    {
      var data={ number: opid, content: result, which: 'content' };
    }else if(index == 3)
    {
      var data={ number: opid, start: result, which: 'start' };
    }
    else if(index == 4)
    {
      var data={ number: opid, end: result, which: 'end' };
    }else
    {
      var data={ number: opid, list: result, which: 'list' };
    }

    $.post("<?=site_url('learnmanage/modify')?>",data,function(res,status)
    {
      $("#refresh_list").click();
      alert(res);
    });
  });
});
</script>
  

<table class="table table-striped table-hover">
  <tr>
    <td>编号</td>
    <td>机构</td>
    <td>学习内容</td>
    <td>开始时间</td>
    <td>结束时间</td>
    <td>人员列表</td>
  </tr>
<?php foreach($learn as $item):?>
  <tr>
    <td><?=$item->number?></td>
    <td><?=$item->institute?></td>
    <td><?=$item->content?></td>
    <td><?=$item->start?></td>
    <td><?=$item->end?></td>
    <td><?=$item->list?></td>
  </tr>
<?php endforeach; ?>
</table>