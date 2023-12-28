<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Rent Maintenance Details</h1>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Paid</th>
                <th>Paid To</th>
                <th>Paid At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($AllDetails as $details)
                <tr>
                    <td>{{$details->RoomNumber}} <input type="hidden" value="{{$details->id}}"></td>
                    <td><input type="checkbox" {{($details->PaidTo) ? 'checked': ''}}></td>
                    <td>{{$details->PaidTo}}</td>
                    <td>{{$details->PaidAt}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button> --}}

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Accepting Payment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Room Number</label>
                <input type="text" name="RoomNumber" id="RoomNumber" disabled class="form-control">
            </div>

            <div class="form-group">
                <label for="">Accepted At</label>
                <input type="date" name="PaidAt" id="PaidAt" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Accepted By</label>
                <input type="text" name="PaidTo" id="PaidTo" class="form-control">
            </div>

            <div class="form-group text-center">
                <input type="submit" id="submit" class="btn btn-success">
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <script>
    $('input[type="checkbox"]').on('change',function(e){
        rm = e.target.parentElement.previousElementSibling.innerText;
        id = e.target.parentElement.previousElementSibling.querySelector('input[type="hidden"]').value;

        if(e.target.checked){
            $('#myModal').find('form').find('#RoomNumber').attr('value',rm);
            $('#myModal').find('form').attr('action',"details/"+id);
            $('#myModal').modal();
        }else{
            $('RoomNumber').val('');
            $('PaidTo').val('');
            $('PaidAt').val('');
        }
    })
  </script>

</body>
</html>
