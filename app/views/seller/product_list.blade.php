@extends('layouts.seller_base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    产品管理
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> 卖家</a></li>
    <li class="active">产品管理</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <a href="#" class="btn btn-success btn-xs pull-right">新增产品</a>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th id="sell_manager_product_list_checkbox"></th>
                <th id="sell_manager_product_list_picture"></th>
                <th id="sell_manager_product_list_name">名字</th>
                <th id="sell_manager_product_list_editor">编辑</th>
              </tr>
            </thead>
            <tbody>
              @for ($i = 0; $i < 20; $i++)
              <tr>
                <td><input type="checkbox" /></td>
                <td><a href="#"><img src="http://placehold.it/80x80" /></a></td>
                <td><a href="#">产品名称{{$i}}</a></td>
                <td>小悟空</td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
        <div class="box-footer clearfix">
          <nav>
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
</section>
@stop