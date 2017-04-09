<!DOCTYPE html>
<html>
  <body>
      {{$hocky->tenhocky}}
    <form action="{{ route('monhoc.edit',['id'=>$monhoc->id]) }}" method="POST">
      {{csrf_field()}}
        <input type="text" id="mamon" name="mamon" value="{{old('mamon',$monhoc->mamon)}}"></input>
        <input type="text" id="magv" name="magv" value="{{old('magv',$monhoc->magv)}}"></input>
        <input type="text" id="tenmon" name="tenmon" value="{{old('tenmon',$monhoc->tenmon)}}"></input>
        <button type="submit">Submit</button>
    </form>


  </body>
</html>
