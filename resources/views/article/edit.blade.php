@extends('layouts.app')
@section('content')
<style>
.input_area {display:table; width:auto; margin-bottom: 10px;}
.input_area > div {display:table-cell;}
div.col_1 {width: 100px; margin: 0px 10px 10px 0px;}
div.col_2 {width: 500px; margin: 0px 10px 10px 0px;}
div.col_3 {width: 150px; margin: 0px 10px 10px 0px;}
</style>
<div class="container">
<form id="frm_detail" method="post" action="#">
  <div class="input_area">
    <div class="col_1">コード</div>
    <div class="col_2">
      <input type="text" name="input_code"
        class="border" style="width:400px;" value="<?=$row->code?>"/>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">タイトル</div>
    <div class="col_2">
      <input type="text" name="input_title"
      class="border" style="width:400px;" value="<?=$row->title?>"/>
    </div>
  </div><!--/.input_area-->
  {{--カテゴリ--}}
  @include('element.edit_category')
  <div>
    <div>本文</div>
    <div>
      <textarea name="input_detail" rows="8" cols="100"
       class="border"/>{{ $row->detail }}</textarea>
    </div>
  </div><!--/.input_area-->
  {{--親コード--}}
  @include('element.edit_parent')
    <div class="input_area">
        <div class="col_1">ランク</div>
        <div class="col_3">
            <select name="input_rank">
                <option value=""></option>
                <option value="A" {{ $row->rank == 'A' ? 'selected' : '' }}>お気に入り</option>
                <option value="B" {{ $row->rank == 'B' ? 'selected' : '' }}>いいね</option>
                <option value="C" {{ $row->rank == 'C' ? 'selected' : '' }}>普通</option>
                <option value="D" {{ $row->rank == 'D' ? 'selected' : '' }}>いまいち</option>
                <option value="E" {{ $row->rank == 'E' ? 'selected' : '' }}>全然ダメ</option>
            </select>
        </div>
        <div class="col_1">サイト区分</div>
        <div class="col_3">
            <select name="input_service">
                <option value=""></option>
                @foreach($services as $service)
                    <option value="{{ $service['code'] }}" {{ $row->service == $service['code'] ? 'selected' : '' }}>
                        {{ $service['name1'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col_1">状態</div>
        <div class="col_3">
            <select name="input_status">
                <option value=""></option>
                <option value="0" {{ $row->status == '0' ? 'selected' : '' }}>下書き</option>
                <option value="1" {{ $row->status == '1' ? 'selected' : '' }}>公開</option>
            </select>
        </div>
    </div><!--/.input_area-->
  {{--URL--}}
  @include('element.edit_url')
  <input type="hidden" name="blog_id" value="{{ $row->id }}"/>
  @csrf
</form>
  <br/>
  <div style="float: right;">
    <input type="button" name="btn_regist"
      class="bg-red-500 hover:bg-rec-700 text-white font-bold py-1 px-4 rounded"
      value="変更する"/>
  </div>
  <div style="float: left;">
    <input type="button" name="btn_back"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded"
      value="一覧に戻る" onclick="location.href='/blogmaker/article'"/>
  </div>
</div><!--/.container-->
<script>
$("[name='btn_regist']").on('click', function() {
  // if (confirm("登録しますか？") === false) return false;
  $('#frm_detail').attr('action', '/blogmaker/article/edit');
  $('#frm_detail').submit();
});
</script>
@endsection
