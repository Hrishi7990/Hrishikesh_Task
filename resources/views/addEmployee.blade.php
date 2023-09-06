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
                <h3 class="card-title">Employee Form</h3>
              </div>
            </div>
            <div class="col-md-6 text-end">
              <a href="{{URL::to('/')}}"><input type="button" name="" value="Back"></a>
            </div>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post"   action="{{isset($singleData->id)?URL::to('/postedit-employee/'.$singleData->id):URL::to('/post-employee')}}" enctype="multipart/form-data">@csrf
                <div class="card-body">
                <div class="row mt-3 mb-3">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="employee_name">Employee Name</label>
                      <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="eg: Robert"  value="{{isset($singleData->name)?$singleData->name:old('employee_name')}}" required pattern="[A-Za-z]+" max="50">
                      <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" placeholder="eg: robert@gmail.com" name="email" class="ckeditor form-control" id="email" value="{{isset($singleData->email)?$singleData->email:old('email')}}" required>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                     </div>
                   </div>
                   <div class="row mb-3 mt-3">
                   <div class="col-md-6">
                     <div class="form-group">
                          <label for="contact">Contact</label>
                          <input type="text" placeholder="eg: 9098763689" name="contact" class="ckeditor form-control" id="contact" value="{{isset($singleData->phone_number)?$singleData->phone_number:old('contact')}}" pattern="[0-9]{10}" required>
                            <span class="text-danger">{{ $errors->first('contact') }}</span>
                        </div>
                      </div>
                     <div class="col-md-6">
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control select2bs4" style="width: 100%;" id="status" name="status" required>
                                <option value="">Select status</option>
                                <option value="1" {{(isset($singleData->active) && $singleData->active == '1') ? "selected='selected'" : "" }}>Active</option>
                                <option value="0" {{(isset($singleData->active) && $singleData->active == '0') ? "selected='selected'" : "" }}>Inactive</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
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
                <!-- /.card-body -->

               
              </form>
           
          </div>
        </body>
        </html>

       