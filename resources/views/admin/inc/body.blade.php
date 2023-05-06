<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre total d'utilisateurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_user }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre de catégories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_category }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre total d'annonces en ligne</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_annonces_enligne }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Nombre total d'annonces hors ligne</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_annonces_horsligne }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Nombre total d'annonces reserve</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_annonces_reserve }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre total de réservations terminées</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_reservations_terminees }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Nombre total de réservations en attente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_reservations_attente }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Nombre total de Reviews</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_reviews }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->

    {{-- <div class="row"> --}}

        <!-- Area Chart -->
        {{-- <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Pie Chart -->
        <div class="">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ANNONCES</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart_annonce"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> HORS LIGNE
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> EN LIGNE
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> RÉSERVÉES
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">RÉSERVATIONS</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart_reservation"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> EN ATTENTE
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> TERMINÉES
                        </span>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}


</div>
<!-- /.container-fluid -->





<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

<script>


    //chart1
    var data_annonces_enligne = <?php echo $data_annonces_enligne; ?>;
    var data_annonces_horsligne = <?php echo $data_annonces_horsligne; ?>;
    var data_annonces_reserve = <?php echo $data_annonces_reserve; ?>;

    var ctx = document.getElementById("myPieChart_annonce");
    var myPieChart_annonce = new Chart(ctx, {
    type: 'doughnut',
    data: {
    labels: ["HORS LIGNE (%)", "EN LIGNE (%)", "RÉSERVÉES (%)"],
    datasets: [{
    data: [data_annonces_horsligne, data_annonces_enligne, data_annonces_reserve], // Update the data array to have two values
    backgroundColor: ['#e74a3b', '#1cc88a', '#4e73df'],
    hoverBackgroundColor: ['#e74a3b', '#1cc88a', '#4e73df'],
    hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
    },
    options: {
    maintainAspectRatio: false,
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    },
    legend: {
    display: false
    },
    cutoutPercentage: 80,
    },
    });





    //char2
    
    var data_reservations_terminees = <?php echo $data_reservations_terminees; ?>;
    var data_reservations_attente = <?php echo $data_reservations_attente; ?>;

    var ctx = document.getElementById("myPieChart_reservation");
    var myPieChart_reservation = new Chart(ctx, {
    type: 'doughnut',
    data: {
    labels: ["EN ATTENTE (%)", "TERMINÉES (%)"],
    datasets: [{
    data: [data_reservations_attente, data_reservations_terminees], // Update the data array to have two values
    backgroundColor: ['#e74a3b', '#1cc88a'],
    hoverBackgroundColor: ['#e74a3b', '#1cc88a'],
    hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
    },
    options: {
    maintainAspectRatio: false,
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    },
    legend: {
    display: false
    },
    cutoutPercentage: 80,
    },
    });

</script>
