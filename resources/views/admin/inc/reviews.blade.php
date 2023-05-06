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


    <style>
        .stars {
            position:relative;
            z-index:1;
            overflow:hidden;
            display:flex
        }
        .rating .stars.position-absolute { 
            position:absolute;
            z-index:2;
            flex-wrap:nowrap
        }
        .rating .stars i {
            display:inline-block
        }[data-pixr-scrollto]{cursor:pointer}

        .ri-star-fill:before {
            content:"\2605"
        }

        .text-dark,
        .text-dark-active:active,
        .text-dark-focus:focus,
        .text-dark-hover:hover {
            color:#1c212c!important
        }

        .text-muted,
        .text-muted-active:active,
        .text-muted-focus:focus,
        .text-muted-hover:hover {
            color:#a0a0a2!important
        }

        .opacity-25,
        .opacity-25-hover:hover {
            opacity:.25!important
        }

        .position-absolute {
            position:absolute!important
        }

      </style>


</head>

<body id="page-top">




    

    
{{-- show utilisateur info modal start --}}
<div class="modal fade" id="showReviewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Information De Reviews : </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="emp_id" id="emp_id">
          <div class="modal-body p-4 bg-light">
            <div class="mb-3">
              <label for="note_client_partenaire">Note Client Partenaire</label>

            
                <div class="row linge">
                    <div class="col-12 col-md-8 mt-4 mt-md-0">
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars note_client_partenaire" style="">
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="mb-3">
              <label for="commantaire_client_partenaire">Commantaire Client Partenaire</label>
              <input type="text" name="commantaire_client_partenaire" id="commantaire_client_partenaire" class="form-control" readonly>
            </div>
            <div class="mb-3">
              <label for="note_client_objet">Note Client Objet</label>

              <div class="row linge">
                <div class="col-12 col-md-8 mt-4 mt-md-0">
                    <div class="rating position-relative d-table">
                        <div class="position-absolute stars note_client_objet" style="">
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                        </div>
                        <div class="stars">
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            <div class="mb-3">
              <label for="commantaire_client_objet">Commantaire Client Objet</label>
              <input type="text" name="commantaire_client_objet" id="commantaire_client_objet" class="form-control" readonly>
            </div>
            <div class="mb-3">
              <label for="note_partenaire_client">Note Partenaire Client</label>


              <div class="row linge">
                <div class="col-12 col-md-8 mt-4 mt-md-0">
                    <div class="rating position-relative d-table">
                        <div class="position-absolute stars note_partenaire_client" style="">
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                            <i class="ri-star-fill text-dark mr-1"></i>
                        </div>
                        <div class="stars">
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>


            </div>
            <div class="mb-3">
              <label for="commantaire_partenaire_client">Commantaire Partenaire Client</label>
              <input type="text" name="commantaire_partenaire_client" id="commantaire_partenaire_client" class="form-control" readonly>
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
                            <h3 class="text-light">Reviews</h3>
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
            fetchAllReviews();

            function fetchAllReviews () {
                $.ajax({
                    url: '{{ route('fetchAllReviews') }}',
                    method: 'get',
                    success: function (response) {
                        $('#show_all_employees').html(response);
                        $("table").DataTable()
                    }
                });
            }




            $(document).on('click', '.showReviews', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('showReviews') }}',
                    method: 'get',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                    
                    // Update the modal fields with the received values
                    $("#commantaire_client_partenaire").val(response.commantaire_client_partenaire);
                    $("#commantaire_client_objet").val(response.commantaire_client_objet);
                    $("#commantaire_partenaire_client").val(response.commantaire_partenaire_client);

                    // stars of note_client_partenaire
                    let noteClientPartenaire = (response.note_client_partenaire * 100) / 5;
                    $(".position-absolute.stars.note_client_partenaire").css("width", noteClientPartenaire + "%");

                    // stars of note_client_objet
                    let noteClientObjet = (response.note_client_objet * 100) / 5;
                    $(".position-absolute.stars.note_client_objet").css("width", noteClientObjet + "%");

                    // stars of note_partenaire_client
                    let notePartenaireClient = (response.note_partenaire_client * 100) / 5;
                    $(".position-absolute.stars.note_partenaire_client").css("width", notePartenaireClient + "%");

                    // Show the modal
                    $('#showReviewsModal').modal('show');
                    }
                });
            });



        });
    </script>
    
</body>

</html>