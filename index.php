@extends("layouts/admin")
@section('title',"文章列表")
@section('main')
<h3>新闻列表</h3>

<form class="form-inline" method="get">
  <input type="text" name="title" value="" class="form-control" placeholder="新闻标题">
  <select name="recommend" class="form-control">
    <option value="">是否推荐</option>
    <option value="1" >推荐</option>
    <option value="0" >不推荐</option>
  </select>
  <select name="online" class="form-control">
    <option value="">是否上线</option>
    <option value="1" >上线</option>
    <option value="0" >下线</option>
  </select>
  <input type="submit" value="搜索" class="btn btn-primary">
</form>

<table class="table table-bordered table-condensed table-hover table-striped">
  <tr>
    <td>ID</td>
    <td>标题</td>
    <td>所属分类</td>
    <td>是否推荐</td>
    <td>是否上线</td>
    <td>创建时间</td>
    <td>操作菜单</td>
  </tr>
  @foreach($cols as $v)
    <tr>
    <td>{{$v->id}}</td>
    <td>{{$v->title}}</td>
    <td>{{$v->cname}}</td>
    <td>
      @if($v->recommend == 0)
      <span class="text-danger">不推荐</span></td>
      @else
      <span class="text-success">推荐</span>
      @endif
    <td>
      @if($v->online == 0)
      <span class="glyphicon glyphicon-remove"></span>
      @else
      <span class="glyphicon glyphicon-ok"></span>
      @endif
      </td>
    <td>{{$v->createtime}}</td>
    <td>
      <a href="{{url('admin/news/edit',['id'=>$v->id])}}" class="btn btn-info">编辑</a>
      <a href="" class="btn btn-danger">删除</a>
    </td>
  </tr>
  @endforeach

  </table>
{{$cols->links()}}
@endsection
