<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国际合作</title>
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
        $.get("<?=site_url('partmanage/show')?>",function(data,status){
          $("#detail").html(data);
        });
      });

      $("#refresh_list").click();

      $("#remove_record").click(function()
      {
        $("#remove").slideToggle();
      });

      $(":submit").click(function()
      {
        $("#remove").hide();
        if($(event.target).text() == "删除")
        {
          var data = {
            number: $("#reinputNumber").val()
          };
          $.post("<?=site_url('partmanage/delete')?>",data,function(res,status)
            {
              alert(res);
            }); 
        }else
        {
          var data = {
            name: $("#inputName").val(),
            duty: $("#inputDuty").val(),
            start: $("#inputStart").val(),
            end: $("#inputEnd").val(),
            id: $("#inputPerson").val()
          };
          $.post("<?=site_url('partmanage/add')?>",data,function(res,status)
            {
              alert(res);
            });
        }
        // 刷新一次数据
        $("#refresh_list").click(); 
        return true;
      });
    });
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <br/>
      <br/>
      <div class="page-header">
        <h1>科研成果管理平台 <small>Scientific Research Achievement Manage Platform</small></h1>
      </div>
      <div class="row">
        <h3 class="text-center">国际合作信息维护</h3>
      </div>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" data-toggle="modal" data-target="#addModal">添加信息</a>
        <a class="btn btn-default" id="remove_record">删除记录</a>

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
                            <label for="inputName" class="col-sm-3 control-label">兼职学术组织</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputDuty" class="col-sm-3 control-label">职责</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputDuty" placeholder="Duty">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputStart" class="col-sm-3 control-label">开始时间</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputStart" placeholder="Start Time">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="inputEnd" class="col-sm-3 control-label">结束时间</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputEnd" placeholder="News reported">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPerson" class="col-sm-3 control-label" name="news">兼职人员</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputPerson" placeholder="Person ID">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-2">
                              <button type="submit" class="btn btn-default">添加</button>
                            </div>
                          </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
    </div>

    <br/>
    <div id="remove" hidden>
        <form class="form-inline">
          <div class="form-group">
            <label for="reinputNumber" class="sr-only">人数</label>
            <input type="text" class="form-control" id="reinputNumber" placeholder="Number">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">删除</button>
          </div>
        </form>
    </div>
    <br/>
    <div id="detail">
    </div> 

    <?php $this->load->view('template/footer') ?>
  </body>
</html>