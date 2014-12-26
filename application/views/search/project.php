<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>科研成果管理平台</title>
    <link href="<?=base_url()?>assets/logo.ico" rel="shortcut icon">
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/carpela.css" rel="stylesheet">
    <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $("#back").click(function()
      {
        history.back();
      });

      $(window).scroll(function() {
        if($(window).scrollTop() > 100) {
          $('div.back_top').show();
        } else {
          $('div.back_top').hide();
        }
      });

      $('div.back_top').click(function() {
        $('html, body').animate({scrollTop: 0}, 500);
      });
    });
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">有关于<?=$project->name?>的信息</h3>
      </div>
      <div class="col-md-1">
        <a class="btn btn-success" id="back"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
      </div>
      <br>
      <hr/>

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h4 class="text-center">项目的基本信息</h4></div>
        <div class="panel-body">
          <p>下面是<?=$project->name?>的基本信息，您可以<a href="<?=site_url('projectmanage/index')?>">管理和维护</a></p>
        </div>
        <table class="table table-striped table-hover">
             <tr>
              <td>项目名称</td>
              <td>项目来源</td>
              <td>项目等级</td>
              <td>负责人</td>
              <td>开始时间</td>
              <td>结束时间</td>
              <td>合同额</td>
              <td>货币种类</td>
              <td>合同号</td>
              <td>经费卡号</td>
              <td>经费到款</td>
              <td>人员名单</td>
            </tr>
            <tr>
              <td><?=$project->name?></td>
              <td><?php
              $res = $this->db->where('number',$project->source)->get('source')->row()->name;
              echo $res;
              ?></td>
              <td><?=$project->type?></td>
              <td><?php
              echo $this->db->where('id',$project->principal)->get('person')->row()->name;
              ?></td>
              <td><?=$project->start?></td>
              <td><?=$project->end?></td>
              <td><?=$project->money?></td>
              <td><?=$project->currency?></td>
              <td><?=$project->contract?></td>
              <td><?=$project->credit?></td>
              <td>
                <?php 
                // 获取人员名单 restrinct: <9
                $res = $this->db->where('projectid',$project->projectid)->get('funds')->result();
                $str = "";
                foreach($res as $item2)
                {
                    $str .= $item2->payoff.",";
                }
                echo rtrim($str,',');
                ?>
              </td>
              <td>
                <?php 
                // 获取人员名单 restrinct: <9
                $res = $this->db->where('projectid',$project->projectid)->order_by('order')->get('projectlist')->result();
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
          </table>
      </div>
  
        <div class="panel panel-default">
          <div class="panel-heading"><h4 class="text-center">参与的鉴定验收</h4></div>
          <div class="panel-body">
            <p>下面是<?=$project->name?>所参与的鉴定验收，您可以<a href="<?=site_url('validationmanage/index')?>">管理和维护</a></p>
          </div>
        <table class="table table-striped table-hover">
          <tr>
            <td>成果名称</td>
            <td>鉴定机构</td>
            <td>鉴定时间</td>
            <td>项目列表</td>
            <td>人员名单</td>
          </tr>
        <?php foreach($validation as $item):?>
          <tr>
            <td><?=$item->achievement?></td>
            <td><?=$item->institute?></td>
            <td><?=$item->time?></td>
            <td><?php
            $res = $this->db->where('identifier',$item->number)->get('validationprojectlist')->result();
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
            $res = $this->db->where('identifier',$item->number)->order_by('order')->get('validationlist')->result();
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
        </div>

        <div class="panel panel-default">
          <div class="panel-heading"><h4 class="text-center">获奖情况</h4></div>
          <div class="panel-body">
            <p>下面是<?=$project->name?>的获奖情况，您可以<a href="<?=site_url('awardmanage/index')?>">管理和维护</a></p>
          </div>
          <table class="table table-striped table-hover">
            <tr>
              <td>成果名称</td>
              <td>获奖名称</td>
              <td>获奖时间</td>
              <td>奖项级别</td>
              <td>项目列表</td>
              <td>人员名单</td>
            </tr>
          <?php foreach($award as $item):?>
            <tr>
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
        </div>
      <div class="back_top">
    <div class="back_top_arrow"></div>
    <div class="back_top_stick"></div>
  </div>
    <?php $this->load->view('template/footer') ?>
    </div>
  </body>
</html>