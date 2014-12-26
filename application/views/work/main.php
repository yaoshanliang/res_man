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
    $(document).ready(function(){

      $("#refresh_list").click(function()
      {
        $.get("<?=site_url('workmanage/show')?>",function(data,status){
          $("#detail").html(data);
        });
      });

      $("#refresh_list").click();

      $("#selectMode").children().eq($("#currentMode").text()).attr("selected","selected");
      $("#selectMode").change(function()
      {
        $("#modeControl").submit();
      });

      $("#addRecord").click(function()
      {
        if($("#currentMode").text() != 2)
        {
          alert("权限错误");
          return;
        }
        var data = {
          name: $("#inputName").val(),
          publisher: $("#inputPublisher").val(),
          publishdate: $("#inputPublishdate").val(),
          personlist: $("#inputPersonlist").val()
        };
        $.post("<?=site_url('workmanage/add')?>",data,function(res,status)
          {
            alert(res);
          });
        // 刷新一次数据
        $("#refresh_list").click(); 
        return true;
      });

      if($("#currentMode").text() !=2)
      {
        $("#addForm").attr('disabled',true);
      }

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

      $("#back").click(function()
      {
        history.back();
      });
    });
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">出版专著信息维护</h3>
        <p hidden id="currentMode"><?php echo $this->session->userdata('mode')?></p>
        <div class="col-md-1">
        <a class="btn btn-success" id="back"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
        </div>
        <div class="col-md-1 col-md-offset-10 text-right">
          <form action="<?=site_url('modecontroller/changemode')?>" method="post" id="modeControl">
            <select class="form-control" name="mode" id="selectMode">
              <option value="0">查询</option>
              <option value="1">维护</option>
              <option value="2">管理</option>
            </select>
            <input type="text" name="from" value="<?=site_url('workmanage/index')?>" hidden>
          </form>
        </div>
      </div>
      <hr/>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" data-toggle="modal" id="addForm" data-target="#addModal">添加信息</a>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">添加人员信息</h4>
                </div>
                <div class="modal-body">
                      <form class="form-horizontal">
                          <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">名称</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPublisher" class="col-sm-3 control-label">出版商</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputPublisher" placeholder="Publisher">
                            </div>
                            
                          </div>
                          <div class="form-group">
                            <label for="inputPublishdate" class="col-sm-3 control-label">出版日期</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputPublishdate" placeholder="Publishdate">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="inputPersonlist" class="col-sm-3 control-label">人员名单</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputPersonlist" placeholder="Person List">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-2">
                              <button type="submit" id="addRecord" class="btn btn-default">添加</button>
                            </div>
                          </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
    </div>
    <br/>
    <div id="detail">
    </div> 
    <div class="back_top">
      <div class="back_top_arrow"></div>
      <div class="back_top_stick"></div>
    </div>
    <?php $this->load->view('template/footer') ?>
  </body>
</html>