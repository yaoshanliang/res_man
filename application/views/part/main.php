<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
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

      $("#add_record").click(function()
      {
        $("#remove").hide();
        $("#record").toggle();
      });

      $("#remove_record").click(function()
      {
        $("#record").hide();
        $("#remove").toggle();
      });

      $(":submit").click(function()
      {
        $("#record").hide();
        $("#remove").hide();
        // if($(event.target).text() == "删除")
        // {
        //   var data = { id: $("#reinputID").val() };
        //   $.post("<?=site_url('personmanage/delete')?>",data,function(res,status)
        //     {
        //       alert(res);
        //     }); 
        // }else
        // {p
        //   var data = { id: $("inputID").val(), name: $("#inputName").val(), duties: $("#inputDuty").val() };
        //   $.post("<?=site_url('personmanage/add')?>",data,function(res,status)
        //     {
        //       alert(res);
        //     });
        // }
        // 刷新一次数据 ---这段代码无效
        $("#refresh_list").click(); 
        return false;
      });
    });
    </script>
  </head>
  <body>
    <?php $this->load->view('template/navbar') ?>

    <div class="container">
      <br/>
      <br/>
      <div class="page-header">
        <h1>科研成果管理平台 <small>Scientific Research Achievement Manage Platform</small></h1>
      </div>
      <div class="row">
        <h3 class="text-center">软件著作权信息维护</h3>
      </div>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" id="add_record">添加信息</a>
        <a class="btn btn-default" id="remove_record">删除记录</a>
    </div>
    <br/>
    <div id="record" hidden>
      <form class="form-inline" role="form" action="<?=site_url('personmanage/add')?>" method="post">
        <div class="form-group">
          <label class="sr-only" for="inputName">姓名</label>
          <input type="text" name="name" class="form-control" id="inputName" placeholder="姓名">
        </div>
         <div class="form-group">
          <label class="sr-only" for="inputDuty">职务</label>
          <input type="text" name="duties" class="form-control" id="inputDuty" placeholder="职责">
        </div>
        <button type="submit" class="btn btn-default">添加</button>
      </form>
    </div>
    <div id="remove" hidden>
         <form class="form-inline" role="form" action="<?=site_url('personmanage/delete')?>" method="post">
          <div class="form-group">
            <label class="sr-only" for="reinputID">编号</label>
            <input type="text" name="id" class="form-control" id="reinputID" placeholder="编号">
          </div>
          <button type="submit" class="btn btn-default">删除</button>
        </form>
    </div>
    <br/>
    <div id="detail">
    </div> 

    <div>
      <form action="<?=site_url('partmanage/add')?>" method="post">
        name<input type="text" name="name"><br/>
        duty<input type="text" name="duty"><br/>
        start<input type="text" name="start"><br/>
        end<input type="text" name="end"><br/>
        id<input type="text" name="id"><br/>
        <input type="submit">
      </form>
    </div>

    <div>
      <form action="<?=site_url('partmanage/delete')?>" method="post">
        name<input type="text" name="name"><br/>
        duty<input type="text" name="duty"><br/>
        id<input type="text" name="id"><br/>
        <input type="submit">
      </form>
    </div>
    <?php $this->load->view('template/footer') ?>
  </body>
</html>