<script type="text/javascript">
    $(document).ready(function()
    {
      $("table tr:gt(0) td:lt(7)").click(function()
      {
        var index = $(event.target).index(); //列索引
        if(index == 6)
        {
          //修改人员名单
          $("#addListBtn").click();
          // alert("you failed!");
          return;
        }
        if(index==0)
        {
          var data = { number: $(event.target).text() };
          $.post("<?=site_url('patentmanage/delete')?>",data,function(res,status)
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
      });
    });
    </script>


<table class="table table-striped table-hover">
   <tr>
    <td>编号</td>
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
    <td><?=$item->number?></td>
    <td><?=$item->name?></td>
    <td><?=$item->register?></td>
    <td><?=$item->person?></td>
    <td><?=$item->institute?></td>
    <td><?=$item->time?></td>
    <td>
    <?php 
    // 获取人员名单 restrinct: <9
    $res = $this->db->where('identifier',$item->number)->get('patentlist')->result();
    $str = "";
    foreach($res as $item2)
    {
      for($i=0;$i<10;$i++)
      {
        if($i == $item2->order)
        {
          $res = $this->db->where('id',$item2->id)->get('person');
          $str .= $res->row()->name.",";
        }
      }
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