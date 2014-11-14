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
      var data = { number: $(event.target).parent().children().first().html() };
      $.post("<?=site_url('awardmanage/delete')?>",data,function(res,status)
      {
        $("#refresh_list").click();
        alert(res);
      });
      return;
    }else if(current_mode == 1)
    {
      if(index == 5) 
      {
        // 处理项目列表
        window.location="<?=site_url('awardmanage/projectlist')?>?number="+$(event.target).parent().children().first().html();
        return;
      }
      if(index == 6) 
      {
        // 处理人员名单
        window.location="<?=site_url('awardmanage/personlist')?>?number="+$(event.target).parent().children().first().html();
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
        var data={ number: opid, achievement: result, which: 'achievement' };
      }else if(index == 2)
      {
        var data={ number: opid, name: result, which: 'name' };
      }else if(index == 3)
      {
        var data={ number: opid, time: result, which: 'time' };
      }
      else if(index == 4)
      {
        var data={ number: opid, level: result, which: 'level' };
      }

      $.post("<?=site_url('awardmanage/modify')?>",data,function(res,status)
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
    <td>成果名称</td>
    <td>获奖名称</td>
    <td>获奖时间</td>
    <td>奖项级别</td>
    <td>项目列表</td>
    <td>人员名单</td>
  </tr>
<?php foreach($award as $item):?>
  <tr>
    <td hidden><?=$item->number?></td>
    <td><?=$item->achievement?></td>
    <td><?=$item->name?></td>
    <td><?=$item->time?></td>
    <td><?=$item->level?></td>
    <td><?php
    $res = $this->db->where('identifier',$item->number)->get('awardprojectlist')->result();
    $str = "";
    foreach($res as $item2)
    {
        $res = $this->db->where('projectid',$item2->projectid)->get('project');
        $str .= $res->row()->name.",";
    }
    echo rtrim($str,',');
    ?></td>
    <td>
     <?php 
    // 获取人员名单 restrinct: <9
    $res = $this->db->where('identifier',$item->number)->order_by('order')->get('awardlist')->result();
    $str = "";
    foreach($res as $item2)
    {
        $res = $this->db->where('id',$item2->id)->get('person');
        $str .= $res->row()->name.",";
    }
    echo rtrim($str,',');
    ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>