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
        $.get("<?=site_url('cooperationmanage/show')?>",function(data,status){
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
          category: $("#inputCategory").val(),
          list: $("#inputList").val(),
          number: $("#inputNumber").val(),
          start: $("#inputStart").val(),
          end: $("#inputEnd").val(),
          place: $("#inputPlace").val(),
          purpose: $("#inputPurpose").val(),
          report: $("#inputReport").val(),
          url: $("#inputURL").val(),
          news: $("#inputNews").val(),
          picture: $("#inputPicture").val(),
        };
        $.post("<?=site_url('cooperationmanage/add')?>",data,function(res,status)
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

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <div class="row">
        <h3 class="text-center">国际合作信息维护</h3>
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
            <input type="text" name="from" value="<?=site_url('cooperationmanage/index')?>" hidden>
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
                            <label for="inputCategory" class="col-sm-2 control-label">类别</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputCategory" placeholder="Category">
                            </div>
                            <label for="inputList" class="col-sm-2 control-label">人员列表</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputList" placeholder="List">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNumber" class="col-sm-2 control-label">人数</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputNumber" placeholder="Number">
                            </div>
                            <label for="inputPlace" class="col-sm-2 control-label">来/出访地</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPlace" placeholder="Place">
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
                            <label for="inputPurpose" class="col-sm-2 control-label">目的</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPurpose" placeholder="Purpose">
                            </div>
                            <label for="inputURL" class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputURL" placeholder="URL">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="inputNews" class="col-sm-2 control-label">新闻报道否</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputNews" placeholder="News reported">
                            </div>
                            <label for="inputPicture" class="col-sm-2 control-label">照片保存否</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPicture" placeholder="Picture Reserved">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputReport" class="col-sm-2 control-label">报告名称</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputReport" placeholder="Report Name">
                            </div>
                            <div class="col-sm-offset-6 col-sm-2">
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