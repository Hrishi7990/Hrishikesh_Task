<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
</head>
<body>
    <div class="container mt-3">
         @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <i class="icon fas fa-check"></i> {{Session::get('success')}}
      </div>
      
      @endif
      @if(Session::has('error'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fas fa-ban"></i> {{Session::get('error')}}
      </div>
      @endif

        <div class="row mt-3 mb-3">
            <div class="col-sm-6">
             <h4>Client table</h4>
             </div>
            <div class="col-sm-6 text-end">
                <a href="{{URL::to('/')}}"><input type="button" name="add" value="Employee"></a>
                <a href="{{URL::to('/add-client')}}"><input type="button" name="add" value="Add Clients"></a>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($clientList))
        @foreach ($clientList as $row)
        
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->address}}</td>
        <td>{{$row->city}}</td>
        <td>{{$row->notes}}</td>
        <td>
        
       <a href="{{URL::to('/edit-employee/'.$row->id)}}"><input type="button" name="add" value="Edit"></a>
      </td>
        </tr>
        @endforeach
        @endif
            </tbody>
        
    </table>
       </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        new DataTable('#example');
        $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs

});
    </script>
       
</body>
</html>
