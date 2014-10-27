<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>软件著作权信息</title>
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
          $.post("<?=site_url('copyrightmanage/delete')?>",data,function(res,status)
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
          <td>编号</td>
          <td>著作权名称</td>
          <td>著作权编号</td>
          <td>著作权人</td>
          <td>颁发机构</td>
          <td>时间</td>
        </tr>
      <?php foreach($patent as $item): ?>
        <tr>
          <td><?=$item->number?></td>
          <td><?=$item->name?></td>
          <td><?=$item->register?></td>
          <td>
          <?php 
          // 获取人员名单 restrinct: <9
          $res = $this->db->where('identifier',$item->number)->get('patentlist');
          $str = "";
          foreach($res->result() as $item2)
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
          <td><?=$item->institute?></td>
          <td><?=$item->time?></td>
        </tr>
      <?php endforeach; ?>
      </table>

  </body>
</html>