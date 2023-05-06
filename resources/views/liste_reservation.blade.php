@include('header')
{{-- @include('navbar') --}}
<html>

    <head>

        <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
        <script  type="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="jquery-1.11.2.js"></script>
       


        <style>
            /**
            * Reinstate scrolling for non-JS clients
            */
            .simplebar-content-wrapper {
              overflow: auto;
            }

                            .article {
                margin-top: 1rem;
                cursor: pointer;
            }
  
                    .article h4 {
                        margin: 0;
                        font-size: 1.5rem;
                    }
                    
                    .article p {
                        margin: 0;
                        margin-top: 5px;
                        padding-left: 1rem;
                        display: none;
                    }
                    
                    .article p.active {
                        display: block;
                    }

                    .dataTables_length {
                        margin-top: 40px; 
                        margin-left: 150px;/* add margin */
                    }
                    
                        .dataTables_paginate {
                        text-align: center; /* center pagination controls */
                        margin-top: 20px; /* add margin to top of pagination controls */
                    }
                    div#myTable_info.dataTables_info{
                    margin-left:  145px;
                    margin-top:20px;
                    }
                    .dataTables_paginate .paginate_button {
                        padding: 5px 10px; /* adjust padding of pagination buttons */
                        margin: 0 5px; /* add margin between pagination buttons */
                        width:100px;
                        margin-right:150px;
                        margin-bottom:20px;
                        margin-top:20px;
                    }
                    .dataTables_paginate .paginate_button.current {
                        background-color: #fff; /* set background color of current page button */
                        color: black; /* set text color of current page button */
                        width:50px;
                    }
                    div.dataTables_filter input {

                        width: 430px;
                        margin-top:40px;
                        margin-bottom:40px;
                        margin-right:180px;
                        background:red;
                    }
                    ul{
                    list-style-type: none;
                    }

                    table {
                        margin-top: 100px;
                    
                    border-collapse: collapse;
                    background-color: #fff;
                    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
                    border-radius: 5px;
                    }

                    th {
                    background-color: #f2f2f2;
                    text-align: center;
                    padding: 10px;
                    width:70px;
                    }
                    a{
                    text-decoration:none;
                    }
                    td {
                    width:70px;
                    text-align: center;
                    text-decoration:none;
                    padding: 10px;
                    }

                

                    tbody tr:nth-child(even) {
                    background-color: #f2f2f2;
                    }

                    .dataTables_filter input {
                    width: 300px;
                    }
                    .dataTables_wrapper .dataTables_filter input{
                        width: 400px;
                    }

                    .dataTables_info {
                    margin-left: 300px;
                    }

          </style>
    
    </head>
   


    
    @include('navbar3')
    <div style="margin-bottom: 40px;"></div>
    
    <table class="table dataTable" id="myTable" style="margin-top:150px;margin-right:50px;margin-left:150px;width: 75% !important;">
        <thead>
            <tr>
                <th>Nom  du client</th>
                <th>Catégorie</th>
                <th>Objet</th>
                
                <th  style="width:50px;">Début  réservation</th>
                <th>Fin réservation</th>
             
                <th style="">Action</th>
                
            </tr>
        </thead>
        <style>
            .linge {

                padding-left:0;
                padding-right:0 ;
            }
            .a{
                display: flex;
            }
            .name{
                margin-left: 10px;
                margin-top: 10px;
                font-size: 12px;
                font-weight: bold;
            }
            .profile{
                width: 35px;
                height: 35px;
                border-radius: 50%;
            }
        </style>
        <tbody>
            @foreach($query as $key=> $row)
                <tr>
                    <td class="row linge"> 
                        <a href="{{route("userInfo" , ['id' => $row->user_id])}}">
                            <div class="col-12 col-md-4 a" style="display: flex">
                                <img src="{{asset($row->profile)}}" class="profile" alt="">
                                <p class="name">{{$row->name}}</p>
                                <p style="margin-left:2px;" class="name">{{$row->prenom}}</p>

                            </div>
                        </a>
                 
                    </td>
                    <td>{{ $row->nom_categorie }}</td>
                    <td>{{ $row->nom_objet }}</td>
                    <td  style="width:50px;">{{ $row->date_debut }}</td>
                    <td  style="width:40px;">{{ $row->date_fin }}</td>
                    <td style="">
                        <div class="d-flex justify-content-between">
                        <form method="POST"  data-js-validate="true" data-js-highlight-state-msg="true" data-js-show-valid-msg="true">
                            @csrf
                            @method('POST')
                   
                            <button style=" width: 95px;" class="btn btn-dark btn-sm me-2 text-white" type="submit" name="confirm" id="payBtn">Accepter</button>
                        </form>  
                        
                        <a style="margin-left:-60px; width: 95px;" href="{{route('refuser_reservation',$row->id)}}" class="btn btn-danger btn-sm me-2 text-white">
                            Refuser
                        </a>
                        </div>    
                    </td>
                </tr>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                
                                <h4 class="modal-title"><h3>Convention de location de matériel</h3></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                    
                    <h3>Identification (noms, adresses)</h3>
                    <br>
                    
                    <div class="article">
                        <h4>Article 1 - Le matériel (décrire le matériel mis à disposition)</h4>
                        <p>Le propriétaire loue le matériel suivant au locataire, qui doit adhérer aux termes et
                        conditions du présent contrat.</p>
                    </div>
                    <div class="article">
                        <h4>Article 2 - Durée de la location et résiliation anticipée</h4>
                        <p>La période de location commencera le (date de début)et se terminera le (date de fin).</p>
                    </div>
                    <div class="article">
                        <h4>Article 3 - Loyers mensuel, frais et charges locatives (montant, révision)</h4>
                        <p>Le locataire s'engage à payer le montant de (MONTANT EN CHIFFRES),(MONTANT EN LETTRES) au propriétaire en tant que</p>
                    </div>
                    <div class="article">
                        <h4>Article 4 - Conditions générales d'utilisation (instruction, assurance)</h4>
                        <p>Le locataire doit être titulaire d’une assurance pour couvrir les dommages causés aux tiers par le matériel. Le locataire est responsable de l’utilisation du matériel et des dommages subis par ce matériel. Il assume la charge des conséquences financières de ces dommages. Le locataire doit fournir la preuve de cette assurance à la demande du propriétaire.</p>
                    </div>
                    
                    <div class="article">
                        <h4>Article 5 - Etat du matériel, droit de propriété et entretien</h4>
                        <p>Le locataire ou son représentant a inspecté le matériel énuméré dans la section 1 et reconnaît qu'il est en bon état de fonctionnement.</p>
                    </div>
                
                    <div class="article">
                        <h4>Article 6 - Responsabilités et indemnisation</h4>
                        <p>Le présent contrat constitue l'intégralité de l'accord entre les parties et remplace toute entente ou représentation antérieure de quelque nature que ce soit avant la date du présent contrat. Il n'existe aucune autre promesse, condition, entente ou autre accord, oral ou écrit, relatif à l'objet du présent contrat. Le présent contrat peut être modifié par écrit et doit être signé par le propriétaire et le locataire.</p>
                    </div>
                
                    <br>
                          
                            <div class="float-left">
                                    <input type="checkbox" id="validcontrat" name="valid" value="validcontrat" onchange="updateContinueButton()">
                                    <label for="validcontrat">Agree to Contract</label>
                                </div>
                
                            </div>
                
                            <div class="modal-footer d-flex justify-content-center">
                                {{-- <button class="btn btn-primary" id="continuebtn" disabled>Continue</button> --}}
                                <button  class="btn btn-primary" id="continuebtn" disabled style="margin-right: 10px;" >
                                    <a  href="{{route('accepter_reservation',$row->id)}}" >
                                        Accepter
                                    </a> 
                                
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                
                        </div>
                    </div>
                </div>
              
            @endforeach
        </tbody>
    </table>

        



    
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    
    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').dataTable({
                lengthMenu: [5,10,20,30,40,50,100],
                language: {
                     "emptyTable": "Aucun enregistrement trouvé",
                    "info": "Affichage de START à END sur TOTAL entrées", /* set custom text for info */
                    "paginate": {
                              "next": "Suivant", /* set text for "Next" button */
                              "previous": "Précédent", /* set text for "Previous" button */
                                  
                            },
                    
                    search: "" ,
                    // lengthMenu: "Afficher MENU contact", 
                    searchPlaceholder: "Cherchez une réservation spécifique" // add placeholder text
                  }
            
            });
          });
        
        
    </script>




<script>
    $('document').ready(function(){
        
            $('#payBtn').on('click',function(e){
                e.preventDefault();
                $('#myModal').modal('toggle');
        
            });
        
            $('#continuebtn').on('click',function(){
        
                $('form').submit();
            });
        });
</script>
<script>
        function updateContinueButton() {
            var checkbox = document.getElementById("validcontrat");
            var button = document.getElementById("continuebtn");
            if (checkbox.checked) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }
</script>
<script>
        // Get all article elements
    const articles = document.querySelectorAll('.article');
    
    // Hide all content elements initially
    articles.forEach(article => {
      const content = article.querySelector('p');
      content.style.display = 'none';
    });
    
    // Add click event listener to each title
    articles.forEach(article => {
      const title = article.querySelector('h4');
      const content = article.querySelector('p');
      title.addEventListener('click', () => {
        content.style.display = (content.style.display === 'none') ? 'block' : 'none';
      });
    });
    
    
</script>
<script>
    
    
    // Close modal when Close button is clicked
    $(".btn-secondary").on("click", function() {
      // Find the parent modal element and hide it
      $(this).closest(".modal").modal("hide");
    });
    
    // Close modal when close icon is clicked
    $(".modal-header .close").on("click", function() {
      $('#myModal').modal('hide');
    });
    
    
    
</script>


</html>
@include('footer')