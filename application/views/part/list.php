
    <script type="text/javascript">
    $(document).ready(function()
    {
      $("table tr:gt(0)").click(function()
      {
        var index = $(event.target).index(); //列索引
        if(index==0)
        {
          var data = { number: $(event.target).text() };
          $.post("<?=site_url('partmanage/delete')?>",data,function(res,status)
          {
            $("#refresh_list").click();
            alert(res);
          });
          return;
        }
        if(index == 5)
          return;
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
          var data={ number: opid, duty: result, which: 'duty' };
        }else if(index == 3)
        {
          var data={ number: opid, start: result, which: 'start' };
        }else if(index == 4)
        {
          var data={ number: opid, end: result, which: 'end' };
        }
        $.post("<?=site_url('partmanage/modify')?>",data,function(res,status)
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
          <td>兼职学术组织</td>
          <td>职责</td>
          <td>开始时间</td>
          <td>结束时间</td>
          <td>兼职人员</td>
        </tr>
      <?php foreach($part as $item):?>
        <tr>
          <td><?=$item->number?></td>
          <td><?=$item->name?></td>
          <td><?=$item->duty?></td>
          <td><?=$item->start?></td>
          <td><?=$item->end?></td>
          <td><?php
            $res = $this->db->where('id',$item->id)->get('person');
            echo $res->row()->name;
          ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>
