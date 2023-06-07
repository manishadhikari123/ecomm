<div class="container">
  <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">DELETE USER</h1>
  <div class="table-responsive">
    <table border="1"; style="border-collapse: collapse; width: 100%; text-align: center;" class="table table-bordered table-striped">
      <thead>
        <tr style="background-color: #36BC68; color: white;">
          <th style="padding: 8px;">ID</th>
          <th style="padding: 8px;">NAME</th>
          <th style="padding: 8px;">EMAIL</th>
          <th style="padding: 8px;">OPERATION</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $item)
        <tr style="background-color: #f2f2f2;">
          <td style="padding: 8px;">{{$item['id']}}</td>
          <td style="padding: 8px;">{{$item['name']}}</td>
          <td style="padding: 8px;">{{$item['email']}}</td>
          <td style="padding: 8px;">
            <a style="background-color: #dc3545; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none;" href="{{url('deleteuser/'.$item['id'])}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-12" style="text-align: center; margin-top: 20px;">
      <a style="background-color: #007bff; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; display: inline-block;" href="/adminuserscontrol">Go Back to Control Users</a>
    </div>
  </div>
</div>
