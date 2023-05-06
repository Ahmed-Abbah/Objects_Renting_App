<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">



    
{{-- show utilisateur info modal start --}}
<div class="modal fade" id="showReservationsModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Information De Réservations : </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="emp_id" id="emp_id">
          <div class="modal-body p-4 bg-light">             
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="date_debut">date_debut</label>
                <input type="text" name="date_debut" id="date_debut" class="form-control" readonly>
              </div>
              <div class="col-md-6">
                <label for="date_fin">date_fin</label>
                <input type="text" name="date_fin" id="date_fin" class="form-control" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="prix">Prix (par jour)</label>
                <input type="text" name="prix" id="prix" class="form-control" readonly>
              </div>
              <div class="col-md-6">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control" readonly>
              </div>
            </div>
            <div class="mb-3">
              <label for="description">Description</label>
              <input type="text" name="description" id="description" class="form-control" readonly>
            </div>
            <div class="mb-3">
              <label for="nom_objet">Nom Objet</label>
              <input type="text" name="nom_objet" id="nom_objet" class="form-control" readonly>
            </div>
            <div class="mb-3">
              <label for="nom_categorie">Nom Catégorie</label>
              <input type="text" name="nom_categorie" id="nom_categorie" class="form-control" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
{{-- eshow utilisateur info modal end --}}









    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.inc.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.inc.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <div class="row my-5">
                      <div class="col-lg-12">
                        <div class="card shadow">
                          <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                            <h3 class="text-light">Réservations</h3>
                          </div>
                          <div class="card-body" id="show_all_employees">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.inc.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('admin.inc.script')

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <script>

        $(function () {


            //fetcch all Reservations ajax request
            fetchAllReservations();

            function fetchAllReservations () {
                $.ajax({
                    url: '{{ route('fetchAllReservations') }}',
                    method: 'get',
                    success: function (response) {
                        $('#show_all_employees').html(response);
                        $("table").DataTable()
                    }
                });
            }




            
            $(document).on('click', '.showReservations', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('showReservations') }}',
                    method: 'get',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                    // Update the modal fields with the received values
                    let reservation = response[0]; // Get the reservation object from the JSON array
                    let annonce = response[1]; // Get the annonce object from the JSON array
                    let objet = response[2]; // Get the objet object from the JSON array
                    let categorie = response[3]; // Get the categorie object from the JSON array
            
                    
                    // Update the modal fields with the received values
                    $("#date_debut").val(reservation.date_debut);
                    $("#date_fin").val(reservation.date_fin);

                    $("#prix").val(annonce.prix);
                    $("#ville").val(annonce.ville);
                    $("#description").val(annonce.description);
                    
                    $("#nom_objet").val(objet.nom_objet);

                    $("#nom_categorie").val(categorie.nom_categorie);

                    // Show the modal
                    $('#showReservationsModal').modal('show');
                    }
                });
            });





        });
    </script>
    
</body>

</html>