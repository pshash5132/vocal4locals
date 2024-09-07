<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        {{ $users }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Vendors</h4>
                    </div>
                    <div class="card-body">
                        {{ $vendors }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $orders }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>This Month's Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $thisMonthOrdersCount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">Week</a>
                            {{-- <a href="#" class="btn">Month</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" id="thisWeek" value="{{ json_encode($thisWeek) }}">
                    <canvas id="myChart" height="100"></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted">
                                <span class="text-primary">
                                   
                            <div class="detail-value">{{ $todayAmountSum }}</div>
                            <div class="detail-name">Today's Sales</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger">
                               
                            <div class="detail-value">{{ $thisWeekOrders }}</div>
                            <div class="detail-name">This Week's Sales</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary">
                              
                            <div class="detail-value">{{ $thisMonthOrders }}</div>
                            <div class="detail-name">This Month's Sales</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary">
                               
                            <div class="detail-value">{{ $thisYearOrders }}</div>
                            <div class="detail-name">This Year's Sales</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">Month</a>
                            {{-- <a href="#" class="btn">Month</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" id="monthlySales" value="{{ json_encode($monthlySales) }}">
                    <canvas id="myChart2" height="100"></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted">
                                <span class="text-primary">
                                   
                            <div class="detail-value">{{ $todayOrder }}</div>
                            <div class="detail-name">Today's Orders</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger">
                               
                            <div class="detail-value">{{ $thisWeekOrdersCount }}</div>
                            <div class="detail-name">This Week's Orders</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary">
                              
                            <div class="detail-value">{{ $thisMonthOrdersCount }}</div>
                            <div class="detail-name">This Month's Orders</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary">
                               
                            <div class="detail-value">{{ $thisYearOrdersCount }}</div>
                            <div class="detail-name">This Year's Orders</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
           
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-12 col-12 col-sm-12">
           
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
           
        </div>
    </div>
</section>
@push('script')
    <script>

    </script>
@endpush