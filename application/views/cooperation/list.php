
    <script type="text/javascript">
    $(document).ready(function()
    {
      $("table tr:gt(0)").click(function()
      {
          var rec = $(event.target).parent().children();
          var data = {
            category: rec.eq(0).text(),
            number: rec.eq(2).text(),
            place: rec.eq(3).text(),
            purpose: rec.eq(4).text()
          };
          $.post("<?=site_url('cooperationmanage/delete')?>",data,function(res,status)
          {
            alert(res);
            $("$refresh_list").click();
          });
      });
    });
    </script>

      <table class="table table-striped table-hover">
        <tbody>
        <tr>
          <td>类别</td>
          <td>人员清单</td>
          <td>人数</td>
          <td>来访／目的地</td>
          <td>目的</td>
          <td>链接</td>
          <td>新闻报道</td>
          <td>照片保留</td>
        </tr>
      <?php foreach($cooperation as $item):?>
        <tr>
          <td><?=$item->category?></td>
          <td><?=$item->list?></td>
          <td><?=$item->number?></td>
          <td><?=$item->place?></td>
          <td><?=$item->purpose?></td>
          <td><?=$item->url?></td>
          <td><?=$item->news?></td>
          <td><?=$item->picture?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
        <tfoot>点击某行删除对应记录</tfoot>
      </table>
