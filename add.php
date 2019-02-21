@extends("layouts/admin")
@section('title',"添加文章")
@section('main')
<h3>添加新闻</h3>

<form action="{{url('admin/news/doadd')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">所属分类</label>
      </div>
      <div class="col-md-5">
        <select name="cid" class="form-control">
          @foreach($arr as $v)
          <option value="{{$v['id']}}">{{$v['indentcname']}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">标题</label>
      </div>
      <div class="col-md-5">
        <input type="text" name="title" value="" class="form-control">
      </div>
      <div class="col-md-5">
        <span class="help-block">{{$errors->first('title')}}</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">图片</label>
      </div>
      <div class="col-md-5">
        <input type="file" name="image" value="" class="form-control">
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">内容</label>
      </div>
      <div class="col-md-5">
        <textarea name="content" class="form-control" rows="5"></textarea>
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">是否推荐</label>
      </div>
      <div class="col-md-5">
        <input type="radio" name="recommend" value="0" checked> 不推荐
        <input type="radio" name="recommend" value="1"> 推荐
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">是否上线</label>
      </div>
      <div class="col-md-5">
        <input type="radio" name="online" value="0" > 下线
        <input type="radio" name="online" value="1" checked> 上线
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <input type="submit" value="添加" class="btn btn-primary">
        <input type="reset" value="取消" class="btn btn-default">
        {{csrf_field()}}
      </div>
    </div>

</form>
@endsection
