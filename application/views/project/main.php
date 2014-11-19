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
        $.get("<?=site_url('projectmanage/show')?>",function(data,status){
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
          name: $("#inputName").val(),
          source: $("#inputSource").val(),
          principal: $("#inputPrincipal").val(),
          start: $("#inputStart").val(),
          end: $("#inputEnd").val(),
          money: $("#inputMoney").val(),
          currency: $("#inputCurrency").val(),
          contract: $("#inputContract").val(),
          credit: $("#inputCredit").val(),
          type: $("#inputType").val()
        };
        $.post("<?=site_url('projectmanage/add')?>",data,function(res,status)
          {
            $("#refresh_list").click(); 
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

      $("#back").click(function()
      {
        history.back();
      });
    });
    function select_source(e)
    {
      // alert($(e).children().eq($(e).val()-1).html());
      $("#inputSource").val($(e).children().eq($(e).val()-1).html());
    }
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">项目信息维护</h3>
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
            <input type="text" name="from" value="<?=site_url('projectmanage/index')?>" hidden>
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
                  <h4 class="modal-title">添加信息</h4>
                </div>
                <div class="modal-body">
                      <form class="form-horizontal">
                          <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label" >项目名称</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                            <label for="inputSource" class="col-sm-2 control-label">项目来源</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputSource" placeholder="Source">
                              <select onchange="select_source(this);">  
                                <?php foreach($project_source as $item): ?>
                                <option value ="<?=$item->number?>"><?=$item->name?></option> 
                                <?php endforeach; ?> 
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputType" class="col-sm-2 control-label">项目类型</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputType" placeholder="Type">
                            </div>
                            <label for="inputPrincipal" class="col-sm-2 control-label">项目负责人</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPrincipal" placeholder="Principal">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputStart" class="col-sm-2 control-label">开始时间</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputStart" placeholder="Start Time">
                            </div>
                            <label for="inputEnd" class="col-sm-2 control-label">结束时间</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputEnd" placeholder="End Time">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputMoney" class="col-sm-2 control-label">合同额</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputMoney" placeholder="Money">
                            </div>
                            <label for="inputCurrency" class="col-sm-2 control-label">货币种类</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputCurrency" placeholder="Currency">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputContract" class="col-sm-2 control-label">合同号</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputContract" placeholder="Contract">
                            </div>
                            <label for="inputCredit" class="col-sm-2 control-label">经费卡号</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputCredit" placeholder="Credit">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-2">
                              <button type="submit" id="addRecord" class="btn btn-default">确认添加</button>
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