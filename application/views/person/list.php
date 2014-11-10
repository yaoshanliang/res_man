<script type="text/javascript">
$(document).ready(function()
{
  $("table tr:gt(0)").click(function()
  {
    var index = $(event.target).index(); //列索引
    var current_mode = $("#currentMode").text();
    // alert(current_mode);
    if(current_mode == 0)
    {
      return;
    }else if(current_mode == 2)
    {
      var data = { id: $(event.target).parent().children().first().html() };
      // alert(data.id);
      $.post("<?=site_url('personmanage/delete')?>",data,function(res,status)
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
        var data={ id: opid, name: result, which:'name' };
      }else if(index == 2)
      {
        var data={ id: opid, duties: result, which:'duties' };
      }else if(index == 3)
      {
        var data={ id: opid, phonenumber: result, which:'phonenumber' };
      }else if(index == 4)
      {
        var data={ id: opid, email: result, which:'email' };
      }else
      {
        var data={ id: opid, position: result, which:'position' };
      }
      $.post("<?=site_url('personmanage/modify')?>",data,function(res,status)
      {
        alert(res);
        $("#refresh_list").click();
      });
    }
  });
});
</script>

<table class="table table-striped table-hover">
  <tr>
    <td hidden>编号</td>
    <td>姓名</td>
    <td>职务</td>
    <td>手机号码</td>
    <td>邮箱</td>
    <td>职称</td>
  </tr>
<?php foreach($person as $item): ?>
  <tr>
    <td hidden><?=$item->id?></td>
    <td><?=$item->name?></td>
    <td><?=$item->duties?></td>
    <td><?=$item->phonenumber?></td>
    <td><?=$item->email?></td>
    <td><?=$item->position?></td>
  </tr>
<?php endforeach; ?>
</table>