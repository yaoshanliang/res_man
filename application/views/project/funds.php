<table class="table table-striped table-hover">
         <tr>
          <td>年份</td>
          <td>支入</td>
          <td>备注信息</td>
        </tr>
      <?php foreach($funds as $item): ?>
        <tr>
          <td><?=$item->year?></td>
          <td><?=$item->payoff?></td>
          <td><?=$item->others?></td>
        </tr>
      <?php endforeach; ?>
</table>