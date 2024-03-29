@extends('layouts.master')

@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">File Encrypt</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $encrypt }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span>Since last month</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">File Decrypt</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $encrypt }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span>Since last years</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">User</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $user }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                <span>Since last month</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
         <div class="card h-100">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-uppercase mb-1">Admin</div>
                         <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $admin }}</div>
                         <div class="mt-2 mb-0 text-muted text-xs">
                             <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                             <span>Since last month</span>
                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-user fa-2x text-info"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    </div>
@endsection
