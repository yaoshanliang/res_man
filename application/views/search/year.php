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

      $("[type='checkbox']").click(function()
      {
        var obj = "#"+event.target.value;
        $(obj).toggle();
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
        <h3 class="text-center"><?=$year?>年发生的事</h3>
      </div>
      <div class="col-md-1">
        <a class="btn btn-success" id="back"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
      </div>
      <div class="checkbox col-sm-offset-2">
          <label class="checkbox-inline">
            <input type="checkbox" value="project" checked> 项目信息
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="cooperation" checked> 国际合作
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="learn" checked> 进修学习
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="part" checked> 学术兼职
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="patent" checked> 专利权
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="copyright" checked> 软件著作权
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="validation" checked> 鉴定验收
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="award" checked> 获奖情况
          </label>
        </div>
      <hr/>
  
    


      <div class="panel panel-default" id="project">
        <!-- Default panel contents -->
        <div class="panel-heading"><h4 class="text-center">相关项目</h4></div>
        <div class="panel-body">
          <p>下面是<?=$year?>年的项目，您可以<a href="<?=site_url('projectmanage/index')?>">管理和维护</a></p>
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
          <?php foreach($project as $item): ?>
            <tr>
              <td><?=$item->name?></td>
              <td><?php
              $res = $this->db->where('number',$item->source)->get('source')->row()->name;
              echo $res;
              ?></td>
              <td><?=$item->type?></td>
              <td><?php
              echo $this->db->where('id',$item->principal)->get('person')->row()->name;
              ?></td>
              <td><?=$item->start?></td>
              <td><?=$item->end?></td>
              <td><?=$item->money?></td>
              <td><?=$item->currency?></td>
              <td><?=$item->contract?></td>
              <td><?=$item->credit?></td>
              <td>
                <?php 
                // 获取人员名单 restrinct: <9
                $res = $this->db->where('projectid',$item->projectid)->get('funds')->result();
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
                $res = $this->db->where('projectid',$item->projectid)->order_by('order')->get('projectlist')->result();
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
  
      <div class="panel panel-default" id="cooperation">
        <div class="panel-heading"><h4 class="text-center">国际合作</h4></div>
        <div class="panel-body">
          <p>下面是<?=$year?>的国际合作，您可以<a href="<?=site_url('cooperationmanage/index')?>">管理和维护</a></p>
        </div>
        <table class="table table-striped table-hover">
          <tbody>
            <tr>
              <td hidden>编号</td>
              <td>类别</td>
              <td>人员清单</td>
              <td>人数</td>
              <td>开始时间</td>
              <td>结束时间</td>
              <td>来访／目的地</td>
              <td>访问目的</td>
              <td>报告名称</td>
              <td>链接</td>
              <td>新闻报道</td>
              <td>照片保留</td>
            </tr>
          <?php foreach($cooperation as $item):?>
            <tr>
              <td hidden><?=$item->id?></td>
              <td><?=$item->category?></td>
              <td><?=$item->list?></td>
              <td><?=$item->number?></td>
              <td><?=$item->start?></td>
              <td><?=$item->end?></td>
              <td><?=$item->place?></td>
              <td><?=$item->purpose?></td>
              <td><?=$item->report?></td>
              <td><?=$item->url?></td>
              <td><?=$item->news?></td>
              <td><?=$item->picture?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div>

        <div class="panel panel-default" id="learn">
          <div class="panel-heading"><h4 class="text-center">进修学习</h4></div>
          <div class="panel-body">
            <p>下面是<?=$year?>年的进修学习，您可以<a href="<?=site_url('learnmanage/index')?>">管理和维护</a></p>
          </div>
          <table class="table table-striped table-hover">
            <tr>
              <td hidden>编号</td>
              <td>机构</td>
              <td>学习内容</td>
              <td>开始时间</td>
              <td>结束时间</td>
              <td>人员</td>
            </tr>
          <?php foreach($learn as $item):?>
            <tr>
              <td hidden><?=$item->number?></td>
              <td><?=$item->institute?></td>
              <td><?=$item->content?></td>
              <td><?=$item->start?></td>
              <td><?=$item->end?></td>
              <td><?php
              $res = $this->db->where('id',$item->person)->get('person');
              echo $res->row()->name;
              ?></td>
            </tr>
          <?php endforeach; ?>
          </table>
        </div>

        <div class="panel panel-default" id="part">
          <div class="panel-heading"><h4 class="text-center">学术兼职</h4></div>
          <div class="panel-body">
            <p>下面是<?=$year?>年的学术兼职，您可以<a href="<?=site_url('partmanage/index')?>">管理和维护</a></p>
          </div>

          <table class="table table-striped table-hover">
           <tr>
              <td hidden>编号</td>
              <td>兼职学术组织</td>
              <td>职责</td>
              <td>开始时间</td>
              <td>结束时间</td>
              <td>兼职人员</td>
            </tr>
          <?php foreach($part as $item):?>
            <tr>
              <td hidden><?=$item->number?></td>
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
        </div>

        <div class="panel panel-default" id="patent">
          <div class="panel-heading"><h4 class="text-center">专利信息</h4></div>
          <div class="panel-body">
            <p>下面是<?=$year?>年获得的专利信息，您可以<a href="<?=site_url('patentmanage/index')?>">管理和维护</a></p>
          </div>
          <table class="table table-striped table-hover">
             <tr>
              <td hidden>编号</td>
              <td>名称</td>
              <td>专利权号</td>
              <td>专利权人</td>
              <td>授予单位</td>
              <td>授予时间</td>
              <td>人员名单</td>
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
            </tr>
          <?php endforeach; ?>
          </table>
        </div>

        <div class="panel panel-default" id="copyright">
          <div class="panel-heading"><h4 class="text-center">软件著作权</h4></div>
          <div class="panel-body">
            <p>下面是<?=$year?>年获得的软件著作权，您可以<a href="<?=site_url('copyrightmanage/index')?>">管理和维护</a></p>
          </div>
          <table class="table table-striped table-hover">
               <tr>
                <td>名称</td>
                <td>专利权号</td>
                <td>专利权人</td>
                <td>授予单位</td>
                <td>授予时间</td>
                <td>人员名单</td>
              </tr>
            <?php foreach($copyright as $item): ?>
              <tr>
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
                $res = $this->db->where('identifier',$item->number)->order_by('order')->get('copyrightlist')->result();
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

        <div class="panel panel-default" id="validation">
          <div class="panel-heading"><h4 class="text-center">鉴定验收</h4></div>
          <div class="panel-body">
            <p>下面是<?=$year?>年的鉴定验收，您可以<a href="<?=site_url('validationmanage/index')?>">管理和维护</a></p>
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

        <div class="panel panel-default" id="award">
          <div class="panel-heading"><h4 class="text-center">获奖情况</h4></div>
          <div class="panel-body">
            <p>下面是<?=$year?>年的获奖情况，您可以<a href="<?=site_url('awardmanage/index')?>">管理和维护</a></p>
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
        </div>
    <div class="back_top">
    <div class="back_top_arrow"></div>
    <div class="back_top_stick"></div>
  </div>
    <?php $this->load->view('template/footer') ?>
    
  </body>
</html>