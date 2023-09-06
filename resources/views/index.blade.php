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
             <h4>Employee table</h4>
             </div>
            <div class="col-sm-6 text-end">
                <a href="{{URL::to('/clients-list')}}"><input type="button" name="add" value="Clients"></a>
                <a href="{{URL::to('/add-employee')}}"><input type="button" name="add" value="Add Employee"></a>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($employeeList))
        @foreach ($employeeList as $row)
        
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->phone_number}}</td>
        <td>
            @if(!empty($row->active))
               <a href="{{URL::to('/change-status/'.$row->id)}}" onclick="return confirm('Are you sure you want to Inactive this Employee?');"> 
                <button type="button" class="btn btn-success">Active</button>
               </a>
            @else
               <a href="{{URL::to('/change-status/'.$row->id)}}" onclick="return confirm('Are you sure you want to Active this Employee?');"> 
                <button type="button" class="btn btn-danger">Inactive</button>
            </a>
            @endif
        </td>
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
