<div class="input_area">
  <div class="col_1">サイト区分</div>
  <div class="col_2">
    <select name="input_service">
      <option value=""></option>
      @foreach($services as $service)
      <option value="{{ $service['code'] }}" {{ $row->service == $service['code'] ? 'selected' : '' }}>
        {{ $service['name1'] }}</option>
      @endforeach
    </select>
  </div>
</div><!--/.input_area-->
