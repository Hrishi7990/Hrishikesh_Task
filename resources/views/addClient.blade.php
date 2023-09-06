<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
</head>
<body>
      <div class="container mt-3">
            <div class="row">
              <div class="col-md-6">
              <div class="card-header">
                <h3 class="card-title">Client Form</h3>
              </div>
            </div>
            <div class="col-md-6 text-end">
              <a href="{{URL::to('/clients-list')}}"><input type="button" name="" value="Back"></a>
            </div>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post"   action="{{isset($singleData->id)?URL::to('/postedit-client/'.$singleData->id):URL::to('/post-client')}}" enctype="multipart/form-data">@csrf
                <div class="card-body">
                <div class="row mt-3 mb-3">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="client_name">Client Name</label>
                      <input type="text" class="form-control" id="client_name" name="client_name" placeholder="eg: Roy"  value="{{isset($singleData->name)?$singleData->name:old('client_name')}}" required pattern="[A-Za-z]+" max="50">
                      <span class="text-danger">{{ $errors->first('client_name') }}</span>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" placeholder="eg: client@gmail.com" name="email" class="ckeditor form-control" id="email" value="{{isset($singleData->email)?$singleData->email:old('email')}}" required>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                     </div>
                   </div>
                   <div class="row mb-3 mt-3">
                   <div class="col-md-6">
                     <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text"  name="address" class="ckeditor form-control" id="address" value="{{isset($singleData->address)?$singleData->address:old('address')}}" required>
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                      </div>
                     <div class="col-md-6">
                         <div class="form-group">
                          <label for="city">City</label>
                          <input type="text"  name="city" class="ckeditor form-control" id="city" value="{{isset($singleData->city)?$singleData->city:old('city')}}" required pattern="[A-Za-z]+" max="50">
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                        </div>
                      </div>
                      <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                         <div class="form-group">
                          <label for="notes">Notes</label>
                          <input type="text"  name="notes" class="ckeditor form-control" id="notes" value="{{isset($singleData->notes)?$singleData->notes:old('notes')}}" required max="100">
                            <span class="text-danger">{{ $errors->first('notes') }}</span>
                        </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    </div>

                    <div class="col-md-6">
                      
                    </div>
                    
                </div>
                  
                  </div>
                <!-- /.card-body -->

               
              </form>
           
          </div>
        </body>
        </html>

       