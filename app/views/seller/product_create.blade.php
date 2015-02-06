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
      <div class="box">
        <div class="box-header">
        	<ul class="nav nav-pills">
        		<li role="presentation" class="active"><a href="">普通</a></li>
        		<li role="presentation"><a href="">价格</a></li>
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
        	<div style="height: 12px;"></div>
        	<form class="form-horizontal">
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">名称</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="name" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="description" class="col-sm-2 control-label">说明</label>
			    <div class="col-sm-10">
			      <textarea id="description"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">保存</button>
			    </div>
			  </div>
			</form>
        </div>
        <div class="box-body">
        </div>
        <div class="box-footer clearfix">
        </div>
      </div>
    </div>
  </div>
  
</section>
@stop