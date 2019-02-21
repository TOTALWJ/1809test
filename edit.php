@extends("layouts/admin")
@section('title',"修改文章")
@section('main')
<h3>修改新闻</h3>

<form action="{{url('admin/news/doedit')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label">所属分类</label>
      </div>
      <div class="col-md-5">
        <select name="cid" class="form-control">
          @foreach($arr as $v)
          <option @if($v['id']==$ob->cid) selected @endif value="{{$v['id']}}">{{$v['indentcname']}}</option>
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
        <input type="text" name="title" value="{{$ob->title}}" class="form-control">
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
        <input type="hidden" name="oldpath" value="{{$ob->path}}">
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-2">
        <label class="control-label"></label>
      </div>
      <div class="col-md-5">
        @if(!empty($ob->path))
        <img width="200" src="{{asset('upload')}}/{{$ob->path}}">
        @endif
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
        <textarea name="content" class="form-control" rows="5">{{$ob->content}}</textarea>
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
        <input @if($ob->recommend == 0) checked @endif type="radio" name="recommend" value="0" > 不推荐
        <input type="radio"  @if($ob->recommend == 1) checked @endif name="recommend" value="1"> 推荐
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
        <input type="radio"  @if($ob->online == 0) checked @endif name="online" value="0" > 下线
        <input type="radio" name="online" value="1" @if($ob->online == 1) checked @endif> 上线
      </div>
      <div class="col-md-5">
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <input type="submit" value="修改" class="btn btn-primary">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$ob->id}}">
      </div>
    </div>

</form>
@endsection
