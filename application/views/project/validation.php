<table class="table table-striped table-hover">
         <tr>
          <td>鉴定验收时间</td>
          <td>组织机构</td>
          <td>备注信息</td>
        </tr>
      <?php foreach($validation as $item): ?>
        <tr>
          <td><?=$item->time?></td>
          <td><?=$item->institute?></td>
          <td><?=$item->others?></td>
        </tr>
      <?php endforeach; ?>
</table>