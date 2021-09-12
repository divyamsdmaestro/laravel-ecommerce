@extends('admin.admin_master')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Main content -->
    <section class="content">
        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Profile Edit</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method="POST" action="{{ route('admin.password.update')}}" >
                     @csrf
                    <div class="row">
                       <div class="col-12">						
                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Old Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="password" name="current_password" class="form-control"  required data-validation-required-message="This field is required"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>New Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password" type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Confirm Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                </div>
                            
                               
                             </div>
                           
                       <div class="text-xs-right">
                           <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
       <!-- /.content -->
       <script>
           $(document).ready(function(){
               $('#image').change(function(e){
                   var reader = new FileReader();
                   reader.onload = function(e){
                       $('#showImage').attr('src',e.target.result);
                   }
                   reader.readAsDataURL(e.target.files[0]);
               })
           })
       </script>
@endsection