@extends('layouts.app')
@section('content')
<style>
.input_area {display:table; width:auto; margin-bottom: 10px;}
.input_area > div {display:table-cell;}
div.col_1 {width: 100px; margin: 0px 10px 10px 0px;}
div.col_2 {width: 300px; margin: 0px 10px 10px 0px;}
div.col_3 {width: 150px; margin: 0px 10px 10px 0px;}
</style>
<div class="container">
<form id="frm_detail" method="post" action="#">
  <div class="input_area">
    <div class="col_1">コード</div>
    <div class="col_2">
      <input type="text" name="input_code"
        class="border" style="width:400px;" value="{{ $new_code }}"/>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">タイトル</div>
    <div class="col_2">
      <input type="text" name="input_title"
        class="border" style="width:400px;" value=""/>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">カテゴリ</div>
    <div class="col_2">
        <select name="input_category">
            <option value=""></option>
            @foreach($categories as $category)
            <option value="{{ $category['code'] }}">
              {{ $category['name'] }}</option>
            @endforeach
        </select>
    </div>
  </div><!--/.input_area-->
  <div>
    <div>本文</div>
    <div>
      <textarea name="input_detail" rows="8" cols="100" class="border"></textarea>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">親コード</div>
    <div class="col_2">
      <input type="text" name="input_parent"
        class="border" style="width:400px;" value=""/>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">ランク</div>
    <div class="col_3">
        <select name="input_rank">
            <option value=""></option>
            <option value="A">お気に入り</option>
            <option value="B">いいね</option>
            <option value="C" selected>普通</option>
            <option value="D">いまいち</option>
            <option value="E">全然ダメ</option>
        </select>
    </div>
    <div class="col_1">サイト区分</div>
    <div class="col_3">
        <select name="input_service">
            <option value=""></option>
            @foreach($services as $service)
            <option value="{{ $service['code'] }}">
                {{ $service['name1'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col_1">状態</div>
    <div class="col_3">
        <select name="input_status">
            <option value="0" selected>下書き</option>
            <option value="1">公開</option>
        </select>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">URL1</div>
    <div class="col_2">
      <input type="text" name="input_url1"
        class="border" style="width:400px;" value=""/>
    </div>
  </div><!--/.input_area-->
  <div class="input_area">
    <div class="col_1">URL2</div>
    <div class="col_2">
      <input type="text" name="input_url2"
        class="border" style="width:400px;" value=""/>
    </div>
  </div><!--/.input_area-->
  @csrf
</form>
  <br/>
  <div style="float: right;">
    <input type="button" name="btn_regist"
      class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded"
      value="追加する"/>
  </div>
  <div style="float: left;">
    <input type="button" name="btn_back"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded"
      value="一覧に戻る" onclick="location.href='/blogmaker/article'"/>
  </div>
</div><!--/.container-->
<script>
$("[name='btn_regist']").on('click', function() {
  var code = $('input[name="input_code"]').val();
  if ($.trim(code) === '') {
    alert("コードは必須入力です");
    return false;
  }
  var title = $('input[name="input_title"]').val();
  if ($.trim(title) === '') {
    alert("タイトルは必須入力です");
    return false;
  }
  // if (confirm("登録しますか？") === false) return false;
  $('#frm_detail').attr('action', '/blogmaker/article/addnew');
  $('#frm_detail').submit();
});
</script>
@endsection
