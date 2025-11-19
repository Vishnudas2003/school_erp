


@extends('adminlte::page')

@section('title', 'Admin Dashboard')


@section('content_header')
    <h1>Welcome Admin</h1>
@stop

@section('content')
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $data['teacherCount'] }}</h3>

                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
            </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $data['studentCount'] }}</h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
            </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
              <div class="inner">
                <h3>95%</h3>

                <p>Attendance</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
              <div class="inner">
                <h3>86%</h3>

                <p>Overall Grades</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Attendence</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Class</th>
                      <th>Attendance Rate</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Class I</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>

                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Class II</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>

                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Class III</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                      </td>

                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Class IV</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
</div>
@stop
