<div class="input_area">
  <div class="col_1">カテゴリ</div>
  <div class="col_2">
    <select name="input_category">
      <option value=""></option>
      @foreach($categories as $category)
      <option value="{{ $category['code'] }}" {{ $row->category == $category['code'] ? 'selected' : '' }}>
        {{ $category['name'] }}</option>
      @endforeach
    </select>
  </div>
</div><!--/.input_area-->
