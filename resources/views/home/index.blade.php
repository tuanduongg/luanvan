@extends('layout.master')
@section('content')
    <h1>Trang chủ</h1>
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Session</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">21,459</h4>
                    <small class="text-success">(+29%)</small>
                  </div>
                  <small>Total Users</small>
                </div>
                <span class="badge bg-label-primary rounded p-2">
                  <i class="bx bx-user bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Paid Users</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">4,567</h4>
                    <small class="text-success">(+18%)</small>
                  </div>
                  <small>Last week analytics </small>
                </div>
                <span class="badge bg-label-danger rounded p-2">
                  <i class="bx bx-user-plus bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Active Users</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">19,860</h4>
                    <small class="text-danger">(-14%)</small>
                  </div>
                  <small>Last week analytics</small>
                </div>
                <span class="badge bg-label-success rounded p-2">
                  <i class="bx bx-group bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Pending Users</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">237</h4>
                    <small class="text-success">(+42%)</small>
                  </div>
                  <small>Last week analytics</small>
                </div>
                <span class="badge bg-label-warning rounded p-2">
                  <i class="bx bx-user-voice bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection