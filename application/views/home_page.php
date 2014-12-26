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
  <?php $this->load->view('template/navbar.php'); ?>

  <div class="container">
      <div class="row">
        <h3 class="text-center">简要信息总览</h3>
      </div>
       <div class="checkbox col-sm-offset-1">
          <label class="checkbox-inline">
            <input type="checkbox" value="person" checked> 人员信息
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="project" checked> 项目信息
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="cooperation" checked> 国际合作
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="patent"> 专利权
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="copyright"> 软件著作权
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="work"> 出版专著情况
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="part" checked> 学术兼职情况
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="learn" checked> 成员进修学习情况
          </label>
        </div>
      <br/>
      <div class="row">
        <div class="col-sm-4" id="person">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">人员信息</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <td>人员编号</td>
                  <td>姓名</td>
                </tr>
              <?php foreach($person as $item): ?>
                <tr>
                  <td><?=$item->id?></td>
                  <td><?=$item->name?></td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('personmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
        <!--第一大列结束  -->
        <div class="col-sm-4" id="project">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">项目列表 </h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                    <td>项目名称</td>
                    <td>项目来源</td>
                    <td>项目负责人</td>
                  </tr>
                <?php foreach($project as $item):?>
                  <tr>
                    <td><?=$item->name?></td>
                    <td><?=$item->source?></td>
                    <td><?=$item->principal?></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('projectmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
        <!-- 第二大列结束 -->
         <div class="col-sm-4" id="cooperation">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">国际合作</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <td>类别</td>
                  <td>名单</td>
                  <td>地方</td>
                  <td>目的</td>
                </tr>
              <?php foreach($cooperation as $item): ?>
                <tr>
                  <td><?=$item->category?></td>
                  <td><?=$item->list?></td>
                  <td><?=$item->place?></td>
                  <td><?=$item->purpose?></td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('cooperationmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
        <!-- 第三大列结束 -->
      </div> 
      <!-- 行结束 -->
      
      <div class="row">
        <div class="col-sm-4" id="patent" hidden>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">专利权</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
               <tr>
                <td>专利名</td>
                <td>专利权人</td>
                <td>时间</td>
              </tr>
            <?php foreach($patent as $item): ?>
              <tr>
                <td><?=$item->name?></td>
                <td><?=$item->person?></td>
                <td><?=$item->time?></td>
              </tr>
            <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('patentmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
      <!-- 结束第一大列 -->
      <!-- 开始第二大列 -->
        <div class="col-sm-4" id="copyright" hidden>
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">软件著作权</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <td>软件著作权名</td>
                  <td>著作权人</td>
                  <td>时间</td>
                </tr>
              <?php foreach($copyright as $item): ?>
                <tr>
                  <td><?=$item->name?></td>
                  <td><?=$item->person?></td>
                  <td><?=$item->time?></td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('copyrightmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
      <!-- 开始第三大列 -->
        <div class="col-sm-4" id="work" hidden>
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">出版专著情况</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <td>专著名</td>
                  <td>出版商</td>
                  <td>著者表</td>
                </tr>
              <?php foreach($work as $item): ?>
                <tr>
                  <td><?=$item->name?></td>
                  <td><?=$item->publisher?></td>
                  <td><?=$item->personlist?></td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('workmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
      <!-- 开始第一大列 -->
        <div class="col-sm-4" id="part">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">学术组织兼职情况</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                 <tr>
                    <td>组织名</td>
                    <td>职责</td>
                    <td>兼职人</td>
                  </tr>
                <?php foreach($part as $item): ?>
                  <tr>
                    <td><?=$item->name?></td>
                    <td><?=$item->duty?></td>
                    <td><?=$item->id?></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('partmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
      <!-- 开始第二大列 -->
        <div class="col-sm-4" id="learn">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">成员进修学习情况</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <td>学习机构</td>
                  <td>学习内容</td>
                  <td>人员编号</td>
                </tr>
              <?php foreach($learn as $item): ?>
                <tr>
                  <td><?=$item->institute?></td>
                  <td><?=$item->content?></td>
                  <td><?=$item->person?></td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
            <div class="panel-footer">
              <a href="<?=site_url('learnmanage/index')?>">维护</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="back_top">
    <div class="back_top_arrow"></div>
    <div class="back_top_stick"></div>
  </div>
  <?php $this->load->view('template/footer.php'); ?>
  </body>
</html>