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
        $.get("<?=site_url('personmanage/show')?>",function(data,status){
          if(status=="success") $("#detail").html(data);
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
            id: $("inputID").val(),
            name: $("#inputName").val(), 
            duties: $("#inputDuty").val(),
            phonenumber: $("#inputPhonenumber").val(),
            email: $("#inputEmail").val(),
            position: $("#inputPosition").val()
        };
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
      <div class="row">
        <h3 class="text-center">人员信息维护</h3>
        <p hidden id="currentMode"><?php echo $this->session->userdata('mode')?></p>
        <div class="col-md-1 col-md-offset-10 text-right">
          <form action="<?=site_url('modecontroller/changemode')?>" method="post" id="modeControl">
            <select class="form-control" name="mode" id="selectMode">
              <option value="0">查询</option>
              <option value="1">维护</option>
              <option value="2">管理</option>
            </select>
            <input type="text" name="from" value="<?=site_url('personmanage/index')?>" hidden>
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
                  <h4 class="modal-title">添加人员信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                        <label for="inputDuty" class="col-sm-2 control-label">职务</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputDuty" placeholder="Duty">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPhonenumber" class="col-sm-2 control-label">手机号码</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPhonenumber" placeholder="Phone Number">
                        </div>
                        <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPosition" class="col-sm-2 control-label">职称</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPosition" placeholder="Title">
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


        <br/>
        <br/>
        <div id="detail">
        </div> 
      </div>
    <?php $this->load->view('template/footer'); ?>
  </body>
</html>