<script type="text/javascript">
    $(document).ready(function()
    {
      $("table tr:gt(0)").click(function()
      {
        var index = $(event.target).index(); //列索引
        if(index == 7 || index==8) return;
        var current_mode = $("#currentMode").text();
        if(current_mode == 0)
        {
          return;
        }else if(current_mode == 2)
        {
          if($(event.target).text() == $(event.target).parent().children().last().html()) return;
          var data = { number: $(event.target).parent().children().first().html() };
          $.post("<?=site_url('patentmanage/delete')?>",data,function(res,status)
          {
            $("#refresh_list").click();
            alert(res);
          });
          return;
        }else if(current_mode == 1)
        {
          if(index == 6) 
          {
            // 处理人员名单
            window.location="<?=site_url('patentmanage/fileandlist')?>?number="+$(event.target).parent().children().first().html();
            return;
          }
          if(index == 7) 
          {
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
            var data={ number: opid, name: result, which: 'name' };
          }else if(index == 2)
          {
            var data={ number: opid, register: result, which: 'register' };
          }else if(index == 3)
          {
            var data={ number: opid, person: result, which: 'person' };
          }else if(index == 4)
          {
            var data={ number: opid, institute: result, which: 'institute' };
          }else if(index == 5)
          {
            var data={ number: opid, time: result, which: 'time' };
          }
          $.post("<?=site_url('patentmanage/modify')?>",data,function(res,status)
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
    <td>名称</td>
    <td>专利权号</td>
    <td>专利权人</td>
    <td>授予单位</td>
    <td>授予时间</td>
    <td>人员名单</td>
    <td>证明文件</td>
  </tr>
<?php foreach($patent as $item): ?>
  <tr>
    <td hidden><?=$item->number?></td>
    <td><?=$item->name?></td>
    <td><?=$item->register?></td>
    <td><?php
      $res = $this->db->where('id',$item->person)->get('person');
      echo $res->row()->name;
    ?></td>
    <td><?=$item->institute?></td>
    <td><?=$item->time?></td>
    <td>
    <?php 
    // 获取人员名单 restrinct: <9
    $res = $this->db->where('identifier',$item->number)->order_by('order')->get('patentlist')->result();
    $str = "";
    foreach($res as $item2)
    {
        $res = $this->db->where('id',$item2->id)->get('person');
        $str .= $res->row()->name.",";
    }
    echo rtrim($str,',');
    ?>
    </td>
    <td>
      <a href="<?=site_url('patentfile/file_download')?>?file=<?=$item->file?>&number=<?=$item->number?>"><?=$item->file?></a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<br>
<div id="fileandlist">
</div>
