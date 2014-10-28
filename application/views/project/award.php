<table class="table table-striped table-hover">
         <tr>
          <td>人员</td>
          <td>次序</td>
          <td>时间</td>
        </tr>
      <?php foreach($award as $item): ?>
        <tr>
          <td><?=$item->id?></td>
          <td><?=$item->order?></td>
          <td><?=$item->time?></td>
        </tr>
      <?php endforeach; ?>
</table>