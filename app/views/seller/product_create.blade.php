@extends('layouts.seller_base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    产品管理
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-th"></i>产品</a></li>
    <li class="active">新增产品</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div role="tabpanel">
        <div class="box">
          <div class="box-header">
          	<ul class="nav nav-tabs" role="tablist">
          		<li role="presentation" class="active"><a href="#general" aria-controls="general" data-toggle="tab" role="tab">普通</a></li>
          		<li role="presentation"><a href="#price" aria-controls="price" data-toggle="tab" role="tab">价格</a></li>
          		<li role="presentation"><a href="">Tag</a></li>
          		<li role="presentation"><a href="">元信息</a></li>
          		<li role="presentation"><a href="">图片</a></li>
          		<li role="presentation"><a href="">设计</a></li>
          		<li role="presentation"><a href="">礼物</a></li>
          		<li role="presentation"><a href="">鞋子</a></li>
          		<li role="presentation"><a href="">库存</a></li>
          		<li role="presentation"><a href="">网站</a></li>
          		<li role="presentation"><a href="">分类</a></li>
          		<li role="presentation"><a href="">相关的产品</a></li>
          		<li role="presentation"><a href="">自定义选项</a></li>
          	</ul>            
          </div>
          <div class="box-body">
            <form class="form-horizontal">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="general">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">名称</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="name" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">描述</label>
                    <div class="col-sm-10">
                      <textarea class="col-sm-12" id="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">简短描述</label>
                    <div class="col-sm-10">
                      <textarea class="col-sm-12" id="short_description" name="short_description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">SKU</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="sku" name="sku">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-10">
                      <label>
                        <input type="radio" class="" name="status" id="status" value="enable" selected />
                        开
                    </label>
                    <label>
                        <input type="radio" class="" name="status" id="status" value="disable" />
                        关
                    </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">保存</button>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="price">...2</div>
              </div>
            </form>
          </div>
          <div class="box-footer clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  
</section>
@stop