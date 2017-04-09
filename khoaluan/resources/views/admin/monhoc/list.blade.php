<!DOCTYPE html>
<html>
  <body>
    <form action="{{route('monhoc.create')}}" method="POST">
        {{csrf_field()}}
        <select name="hocky_id">
          @foreach($hocky as $value)
            <option value="{{$value->id}}">{{$value->tenhocky}}</option>
          @endforeach
        </select>
        Ma mon<input type="text" name="mamon" id="mamon"/>
        Ma giang vien<input type="text" name="magv" id="magv"/>
        Ten mon hoc<input type="text" name="tenmon" id="tenmon"/>
        <button type="submit">Submit</button>
    </form>
    <form action="{{route('monhoc.excel')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <select name="hocky_id">
        @foreach($hocky as $value)
          <option value="{{$value->id}}">{{$value->tenhocky}}</option>
        @endforeach
        <label>Import file</label>
        <input type="file" name="file"/>
        <button type="submit">Import</button>
      </select>
    </form>
  </body>
</html>
