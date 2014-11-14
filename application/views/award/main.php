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
    <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $("#refresh_list").click(function()
      {
        $.get("<?=site_url('awardmanage/show')?>",function(data,status){
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
        if($("#currentMode").text()!=2)
        {
          alert("权限错误");
          return;
        }
        var data = {
          achievement: $("#inputAchievement").val(),
          name: $("#inputName").val(),
          time: $("#inputTime").val(),
          level: $("#inputLevel").val()
        };
        $.post("<?=site_url('awardmanage/add')?>",data,function(res,status)
          {
            alert(res);
          });
        // 刷新一次数据
        $("#refresh_list").click(); 
        return true;
      });

      $("#back").click(function()
      {
        history.back();
      });
    });
    </script>
  </head>
  <body>
    <?php $this->load->view('template/navbar') ?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">获奖情况信息维护</h3>
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
            <input type="text" name="from" value="<?=site_url('awardmanage/index')?>" hidden>
          </form>
        </div>
      </div>
      <hr/>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" data-toggle="modal" data-target="#addModal">添加信息</a>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">添加信息</h4>
                </div>
                <div class="modal-body">
                      <form class="form-horizontal">
                          <div class="form-group">
                            <label for="inputAchievement" class="col-sm-3 control-label">成果名称</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputAchievement">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">获奖名称</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputName">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputTime" class="col-sm-3 control-label">获奖时间</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputTime">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="inputLevel" class="col-sm-3 control-label">获奖级别</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputLevel">
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

    <?php $this->load->view('template/footer') ?>
  </body>
</html>