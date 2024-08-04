<div class="input_area">
  <div class="col_1">状態</div>
  <div class="col_2">
    <select name="input_status">
      <option value=""></option>
      <option value="0" {{ $row->status == '0' ? 'selected' : '' }}>下書き</option>
      <option value="1" {{ $row->status == '1' ? 'selected' : '' }}>公開</option>
    </select>
  </div>
</div><!--/.input_area-->
