@extends('layouts.app')
@section('content')
<style>
.search_condition {display:table; width:auto;}
.search_condition > div {display:table-cell;}
div.col_1 {width: 100px; margin: 0px 10px 10px 0px;}
div.col_2 {width: 250px; margin: 0px 10px 10px 0px;}
table {border-collapse:collapse; width: 100%;}
table caption {caption-side: top; text-align: right;}
table th {border:1px solid black;}
table td {border:1px solid black;}
</style>
<div class="container" style="padding: 10px;">
  <form id="frm_search" method="get" action="#">
  <div class="search_condition"><!--検索条件-->
    <div class="col_1">コード</div>
    <div class="col_2">
      <input type="text" name="search_code"
      class="border allow-submit-search" value="{{ $code }}"/>
    </div>
    <div class="col_1">タイトル</div>
    <div class="col_2">
      <input type="text" name="search_title"
      class="border allow-submit-search" value="{{ $title }}"/>
    </div>
    <div class="col_1">カテゴリ</div>
    <div class="col_2">
      <input type="text" name="search_category"
      class="border allow-submit-search" value="{{ $category_name }}"/>
    </div>
    <div class="col_1">ランク</div>
    <div class="col_2">
      <select name="search_rank">
        <option value=""></option>
        <option value="A" {{ $rank == 'A' ? 'selected' : '' }}>A:お気に入り</option>
        <option value="B" {{ $rank == 'B' ? 'selected' : '' }}>B:いいね</option>
        <option value="C" {{ $rank == 'C' ? 'selected' : '' }}>C:普通</option>
        <option value="D" {{ $rank == 'D' ? 'selected' : '' }}>D:いまいち</option>
        <option value="E" {{ $rank == 'E' ? 'selected' : '' }}>E:全然ダメ</option>
      </select>
    </div>
  </div><!--/.検索条件-->
  <div class="search_condition" style="margin-top: 10px;"><!--検索条件-->
    <div class="col_1">サイト区分</div>
    <div class="col_2">
      <input type="text" name="search_service"
      class="border" value="{{ $service_name }}"/>
    </div>
    <div class="col_1">状態</div>
    <div class="col_2">
      <select name="search_status">
        <option value=""></option>
        <option value="0" {{ $status == '0' ? 'selected' : '' }}>0:下書き</option>
        <option value="1" {{ $status == '1' ? 'selected' : '' }}>1:公開</option>
      </select>
    </div>
  </div><!--/.検索条件-->
  </form>
  <div class="text-right" style="margin-top: 10px;">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
      name="btn_search">検索</button>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded"
      name="btn_addnew"
      onclick="location.href='/blogmaker/article/addnew'">新規追加</button>
  </div>
  <div class="search_result"><!--検索結果-->
    <table style="margin-bottom: 10px;">
    <caption>件数：{{ $rows->total() }}</caption>
    <thead>
      <tr>
        <th>@sortablelink('code', 'コード')</th>
        <th>@sortablelink('title', 'タイトル')</th>
        <th>@sortablelink('category', 'カテゴリ')</th>
        <th>@sortablelink('parent', '親ID')</th>
        <th>@sortablelink('rank', 'ランク')</th>
        <th>@sortablelink('service', 'サイト区分')</th>
        <th>@sortablelink('status', '状態')</th>
        <th width="160px;">@sortablelink('updated_at', '登録日時')</th>
        <th width="80px;">&nbsp;</th>
        <th width="80px;">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rows as $row)
      <tr>
        <td>
          <a class="underline" href="<?=StrConv::editArticleUrl($row->code)?>"
              target="_new">{{ $row->code }}</a>
        </td>
        <td>
          @if(empty($row->url2))<?=$row->title?>
          @else
          <a class="underline" href="<?=StrConv::editUrl($row->url2)?>"
              target="_new">{{ $row->title }}</a>
          @endif
        </td>
        <td><?=$row->category_name?></td>
        <td><?=$row->parent?></td>
        <td><?=$row->rank?></td>
        <td><?=$row->service_name?></td>
        <td><?=($row->status == 1 ? '公開' : '下書き')?></td>
        <td><?=$row->updated_at?></td>
        <td style="text-align: center;">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded"
            name="btn_detail"
            onclick="location.href='/blogmaker/article/edit?id=<?=$row->blog_id?>'">詳細
          </button>
        </td>
        <td style="text-align: center;">
          <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded"
            name="btn_copy"
            onclick="location.href='/blogmaker/article/copy?id=<?=$row->blog_id?>'">COPY
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
    <!-- <br/> -->
    <div>{{ $rows->links() }}</div>
  </div><!--/.検索結果-->
</div><!--/.container-->
<script>
$(".allow-submit-search").keypress(function(e){
    if(e.which == 13){
        $("[name='btn_search']").click();
    }
});
$("[name='btn_search']").on('click', function() {
  $('#frm_search').attr('action', '/blogmaker/article');
  $('#frm_search').submit();
});
</script>
@endsection
