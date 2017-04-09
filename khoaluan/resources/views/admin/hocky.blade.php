<!DOCTYPE html>
<html>
  <body>
    <form action="{{route('hocky.create')}}" method="POST">
      {{csrf_field()}}
        Tao hoc ky:<input id='tenhocky' name="tenhocky"></input>
        <button type="submit">Submit</button>
    </form>
    <table>
        <tr>
            <th>Ten hoc ky</th>
            <th>Xoa hoc ky</th>
        </tr>
        @foreach($hocky as $hk)
          <tr>
              <td>{{$hk->tenhocky}}</td>
              <td><a href="/admin/hocky/{{$hk->id}}/delete">Xoa</a></td>
          </tr>
        @endforeach
    </table>
  </body>
</html>
