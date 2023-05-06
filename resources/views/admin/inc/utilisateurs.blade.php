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




  <style>
    /* The switch - the box around the slider */
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
opacity: 0;
width: 0;
height: 0;
}

/* The slider */
.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}
    </style>


{{-- show utilisateur info modal start --}}
<div class="modal fade" id="showUtilisateurModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Information De L'utilisateur : </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="emp_id" id="emp_id">
          <div class="modal-body p-4 bg-light">
            <div class="text-center mb-4">
                <img src="" alt="User Image" class="rounded-circle" style="width: 150px; height: 150px;" id="user_image">
              </div>              
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" readonly>
              </div>
              <div class="col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" readonly>
              </div>
              <div class="col-md-6">
                <label for="tel">Téléphone</label>
                <input type="tel" name="tel" id="tel" class="form-control" readonly>
              </div>
            </div>
            <div class="mb-3">
              <label for="adresse">Adresse</label>
              <input type="text" name="adresse" id="adresse" class="form-control" readonly>
            </div>
            <div class="mb-3">
              <label for="ville">Ville</label>
              <input type="text" name="ville" id="ville" class="form-control" readonly>
            </div>






            {{-- start --}}

            <input type="hidden" name="user_status" id="user_status">

            <div class="border-top mt-4 mb-3">
              <div class="product-option mb-4 mt-4">
                <small class="text-uppercase d-block fw-bolder mb-2">
                Status de user:

                <span class="fw-bold" id="statusLabel">

                </span>
                <br><br>Changer Statut:
                <div class="d-flex justify-content-start" style="display:inline;">
                <label class="switch">
                    <input type="checkbox" id="annonce-status" data-id="" checked>
                    <span class="slider round"></span>
                </label>
                
                </div>
                </small>
                  
              </div>
            </div>  

          

            {{-- ens --}}












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
                            <h3 class="text-light">Utilisateurs</h3>
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
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <script>

        $(function () {


            //fetcch all utilisateurs ajax request
            fetchAllUtilisateurs();

            function fetchAllUtilisateurs () {
                $.ajax({
                    url: '{{ route('fetchAllUtilisateurs') }}',
                    method: 'get',
                    success: function (response) {
                        $('#show_all_employees').html(response);
                        $("table").DataTable()
                    }
                });
            }



            $(document).on('click', '.showUtilisateur', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('showUtilisateur') }}',
                    method: 'get',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                    // Update the modal fields with the received values
                    $("#name").val(response.name);
                    $("#prenom").val(response.prenom);
                    $("#email").val(response.email);
                    $("#tel").val(response.tel);
                    $("#adresse").val(response.adresse);
                    $("#ville").val(response.ville);

                    $("#user_status").val(response.isBlocked);

                    // Update the status label
                    const statusLabel = document.getElementById("statusLabel");

                    if (response.isBlocked == "0") {
                        statusLabel.style.color = "green";
                        statusLabel.textContent = "not blocked";
                    } else if (response.isBlocked == "1") {
                        statusLabel.style.color = "red";
                        statusLabel.textContent = "blocked";
                    }


                    // Update the checkbox
                    const annonceStatus = document.getElementById("annonce-status");
                    annonceStatus.setAttribute("data-id", response.id);
                    if (response.isBlocked == "0") {
                        annonceStatus.setAttribute("checked", true);
                    } else {
                        annonceStatus.removeAttribute("checked");
                    }


                    $("#emp_id").val(response.id);
                    // Update the user image
                    let imageUrl = '{{asset('')}}' + response.profile;
                    $("#user_image").attr("src", imageUrl);
                    // Show the modal
                    $('#showUtilisateurModal').modal('show');
                    }
                });
            });





        $(document).on('click', '#annonce-status', function() {
            // get the new status
            var newStatus = $(this).prop('checked') ? 0 : 1;
            console.log(newStatus);
            
            // show the confirmation alert
            swal({
                title: "Confirmation",
                text: "Are you sure you want to change the user status?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willChange) => {
                // if the user confirms the status change, update the user status
                if (willChange) {
                    updateUserStatus(newStatus);
                } else {
                    // if the user cancels the status change, revert the checkbox state
                    $(this).prop('checked', !$(this).prop('checked'));
                }
                // refresh the page after the user clicks OK or Cancel
                location.reload();
            });
        });

        function updateUserStatus(newStatus) {
        // get the user ID
        var userId = $('#emp_id').val();
        
        // send an AJAX request to update the user status
        $.ajax({
            url: '{{ route('updateUserStatus') }}',
            method: 'post',
            data: {
                id: userId,
                status: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // update the user status label and checkbox
                var statusLabel = $('#statusLabel');
                if (newStatus == 0) {
                    statusLabel.text('not blocked');
                    statusLabel.css('color', 'green');
                    $('#annonce-status').prop('checked', true);
                } else {
                    statusLabel.text('blocked');
                    statusLabel.css('color', 'red');
                    $('#annonce-status').prop('checked', false);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }






        });
    </script>
    
</body>

</html>