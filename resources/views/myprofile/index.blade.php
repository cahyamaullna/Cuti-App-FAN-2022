@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection

@section('content')
          <div class="section-header">
            <h1>Profile</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, {{auth()->user()->nama}}</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-8 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{auth()->user()->nama}}" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-8 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{auth()->user()->email}}" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
                

                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Current Password</label>
                            <input type="text" class="form-control" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>New Password</label>
                            <input type="text" class="form-control" required="">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Confirm Password</label>
                            <input type="email" class="form-control" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection