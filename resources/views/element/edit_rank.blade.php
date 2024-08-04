<div class="input_area">
  <div class="col_1">ランク</div>
  <div class="col_2">
    <select name="input_rank">
      <option value=""></option>
      <option value="A" {{ $row->rank == 'A' ? 'selected' : '' }}>お気に入り</option>
      <option value="B" {{ $row->rank == 'B' ? 'selected' : '' }}>いいね</option>
      <option value="C" {{ $row->rank == 'C' ? 'selected' : '' }}>普通</option>
      <option value="D" {{ $row->rank == 'D' ? 'selected' : '' }}>いまいち</option>
      <option value="E" {{ $row->rank == 'E' ? 'selected' : '' }}>全然ダメ</option>
    </select>
  </div>
</div><!--/.input_area-->
