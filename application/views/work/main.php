<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>科研成果管理平台</title>
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
        $.get("<?=site_url('workmanage/show')?>",function(data,status){
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
            name: $("#reinputName").val(),
            publisher: $("#reinputPublisher").val()
          };
          $.post("<?=site_url('workmanage/delete')?>",data,function(res,status)
            {
              alert(res);
            }); 
        }else
        {
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
        <h3 class="text-center">出版专著信息维护</h3>
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
         <form class="form-inline" role="form">
          <div class="form-group">
            <label class="sr-only" for="reinputName">专著名称</label>
            <input type="text" class="form-control" id="reinputID" placeholder="Name">
          </div>
          <button type="submit" class="btn btn-default">删除</button>
        </form>
    </div>
    <br/>
    <div id="detail">
    </div> 
    <?php $this->load->view('template/footer') ?>
  </body>
</html>