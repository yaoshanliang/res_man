<table class="table table-striped table-hover">
         <tr>
          <td>人员</td>
          <td>次序</td>
          <td>时间</td>
        </tr>
      <?php foreach($award as $item): ?>
        <tr>
          <td>
          <?php
              $res = $this->db->where('id',$item->id)->get('person');
              echo $res->row()->name;
          ?></td>
          <td><?=$item->order?></td>
          <td><?=$item->time?></td>
        </tr>
      <?php endforeach; ?>
</table>