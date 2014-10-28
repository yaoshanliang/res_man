<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>人员信息管理</title>
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
        $.get("<?=site_url('personmanage/show')?>",function(data,status){
          if(status=="success") $("#detail").html(data);
        });
      });
      $("#refresh_list").click();

      $("#removeRecord").click(function()
      {
        var data = { id: $("#reinputID").val() };
        $.post("<?=site_url('personmanage/delete')?>",data,function(res,status)
        {
          alert(res);
        }); 
        // 刷新一次数据 
        $("#refresh_list").click();
      });

      $("#addRecord").click(function()
      {
        var data = { id: $("inputID").val(), name: $("#inputName").val(), duties: $("#inputDuty").val() };
        $.post("<?=site_url('personmanage/add')?>",data,function(res,status)
        {
          alert(res);
        });
        // 刷新一次数据 
        $("#refresh_list").click();
      });
    });
    </script>
  </head>
  <body>
    <?php $this->load->view('template/navbar.php'); ?>

    <div class="container">
      <br/>
      <br/>
      <div class="page-header">
        <h1>科研成果管理平台 <small>Scientific Research Achievement Manage Platform</small></h1>
      </div>
      <div class="row">
        <h3 class="text-center">人员信息维护</h3>
      </div>
      <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" data-toggle="modal" data-target="#addModal">添加信息</a>
        <a class="btn btn-default" data-toggle="modal" data-target="#removeModal">删除记录</a>

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
                        <label for="inputName" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="inputName" placeholder="姓名">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputDuty" class="col-sm-2 control-label">职务</label>
                        <div class="col-sm-10">
                          <input type="text" name="duties" class="form-control" id="inputDuty" placeholder="职务">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                          <input type="submit" id="addRecord" class="btn btn-default"></input>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">删除人员信息</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="reinputID" class="col-sm-2 control-label">编号</label>
                      <div class="col-sm-10">
                        <input type="text" name="id" class="form-control" id="reinputID" placeholder="编号">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                          <button type="submit" id="removeRecord" class="btn btn-default">删除</button>
                        </div>
                    </div>
                  </form>
                </div>
                  
                </div>
              </div>
            </div>
          </div>

        <br/>
        <br/>
        <div id="detail">
        </div> 
      </div>
    <?php $this->load->view('template/footer'); ?>
  </body>
</html>