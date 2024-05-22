@extends('admin.layouts.app')

@section('content')
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Material Form</h4>
                <p class="card-description"> Bordered layout </p>
                <form class="forms-sample material-form bordered">
                  <div class="form-group">
                    <input type="text" required="required" />
                    <label for="input" class="control-label">Username</label><i class="bar"></i>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" />
                    <label for="input" class="control-label">Email address</label><i class="bar"></i>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" />
                    <label for="input" class="control-label">Password</label><i class="bar"></i>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" />
                    <label for="input" class="control-label">Confirm Password</label><i class="bar"></i>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked="checked" /><i class="helper"></i>Remember me </label>
                  </div>
                  <div class="button-container">
                    <button type="button" class="button btn btn-primary"><span>Submit</span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection











