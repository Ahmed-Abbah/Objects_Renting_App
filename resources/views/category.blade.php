<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

   


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />
    <link rel="stylesheet" href="./assets/css/star.css" />


    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Fix for custom scrollbar if JS is disabled-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.5/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.5/sweetalert2.min.js"></script>

    <noscript>
        <style>
            .form-check-input1 {
                    width: 1em;
                    height: 1em;
                    margin-top: .25em;
                    vertical-align: top;
                    background-color: #fff;
                    background-repeat: no-repeat;
                    background-position: 50%;
                    background-size: contain;
                    border: 1px solid rgba(0,0,0,.25);
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;
                    -webkit-print-color-adjust: exact;
                    color-adjust: exact;
                    transition: background-color .15s ease-in-out,background-position .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }

            

          /**
          * Reinstate scrolling for non-JS clients
          */
          .simplebar-content-wrapper {
            overflow: auto;
          }

        .rating input[type="radio"] {
        display: none;
        }

        .rating label {
        color: #ccc;
        font-size: 30px;
        cursor: pointer;
        }

        .rating label:before {
        content: "\2606";
        }

    .rating input[type="radio"]:checked ~ label:before {
    content: "\2605";
    color: #ffc107;
    /* Colorer les étoiles précédentes */
    ~ label:before {
        color: #ffc107;
    }
    }

    .rating input[type="radio"]:not(:checked) ~ label:hover,
    .rating input[type="radio"]:not(:checked) ~ label:hover ~ label {
    color: #ffdc75;
    }

    .rating input[type="radio"]:not(:checked) ~ label:before {
    content: "\2605";
    }

    .rating input[type="radio"]:not(:checked) ~ label:hover:before,
    .rating input[type="radio"]:not(:checked) ~ label:hover ~ label:before {
    content: "\2605";
    color: #ffdc75;
    }

    .rating input[type="radio"]:checked ~ label:hover:before,
    .rating input[type="radio"]:checked ~ label:hover ~ label:before {
    color: #ffc107;
    }


     

        </style>
    </noscript>

    <!-- Page Title -->
    <title>Consulter les annonces</title>
    
</head>
@include('header')

@include('navbar3')


   
    <!-- Main Section-->
    <section class="mt-0 ">
@if(session('swal'))
    <script>
        Swal.fire({
            title: 'Succès !',
            text: '{{ session('swal') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif


        <!-- Category Top Banner -->
        <div class="py-6 bg-img-cover bg-dark bg-overlay-gradient-dark position-relative overflow-hidden mb-4 bg-pos-center-center"
            style="background-image: url(storage/images/annonce/shop.jpg);">
            <div class="container position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
                                <h1 class="fw-bold display-6 mb-4 text-white">
                                    Derniers arrivages </h1>
                <div class="col-12 col-md-6">
                    <p class="lead text-white mb-0">
                        Découvrez notre dernière collection de nouveaux arrivages !
                         Faites vite et profitez de nos offres exclusives</p>
                </div>
            </div>
        </div>
        <!-- Category Top Banner -->

        <div class="container">

            <div class="row">

                <!-- Filtre Aside/Sidebar -->
                <div class="d-none d-lg-flex col-lg-3">
                    <div class="pe-4">
                      
                        <aside>
                                <!-- Price Filter -->
                                <div class="py-4 widget-filter widget-filter-price border-top">
                                  
                                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                                            data-bs-toggle="collapse" href="#filter-price" role="button" aria-expanded="true"
                                            aria-controls="filter-price">
                                            Price
                                        </a>
                                        <div id="filter-price" class="collapse show">
                                            <div class="filter-price mt-6"></div>
                                            <div class="d-flex justify-content-between align-items-center mt-7">
                                                <div class="input-group mb-0 me-2 border">
                                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                                                    <input type="number" name="prix_min" id="prix_min" min="0" max="100000" step="1" class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                                                </div>   
                                                <div class="input-group mb-0 ms-2 border">
                                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                                                    <input type="number" name="prix_max" id="prix_max" min="0" max="100000" step="1" class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                                                </div>                
                                            </div>  
                                             
                                        </div>
                                   
                                </div>
                             
                                <!-- / Price Filter -->

                                <!-- Note Filter -->
                             
                                <div class="py-4 widget-filter widget-filter-price border-top">
                                  
                                    <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                                        data-bs-toggle="collapse" href="#filter-note" role="button" aria-expanded="true"
                                        aria-controls="filter-note">
                                        Note
                                    </a>
                                    <div style="margin-top:-60px;" id="filter-note" class="collapse show">
                                       
                                        <div class="d-flex justify-content-between align-items-center mt-7">
                                            
                                            <div class="rating">
                                                <input type="radio" name="stars" value="5" id="star5">
                                                <label for="star5"></label>
                                                <input type="radio" name="stars" value="4" id="star4">
                                                <label for="star4"></label>
                                                <input type="radio" name="stars" value="3" id="star3">
                                                <label for="star3"></label>
                                                <input type="radio" name="stars" value="2" id="star2">
                                                <label for="star2"></label>
                                                <input type="radio" name="stars" value="1" id="star1">
                                                <label for="star1"></label>
                                            </div>
                                            

                                        </div>  
                                         
                                    </div>
                               
                                </div>

                                 <!-- /Note Filter -->

                                 <!-- Comment Filter -->
                               
                                <div class="py-4 widget-filter widget-filter-price border-top">
                                  
                                    <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                                        data-bs-toggle="collapse" href="#filter-comment" role="button" aria-expanded="true"
                                        aria-controls="filter-comment">
                                        Comment
                                    </a>
                                    <div style="margin-top:-50px;"  id="filter-comment" class="collapse show">
                                       
                                        <div class="d-flex justify-content-between align-items-center mt-7">
                                            <select id="sort-by-comment" class="comment" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Sort By <i
                                                class="ri-arrow-drop-down-line ri-lg align-bottom"></i></p>
    
                                            <option value="Positif" class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2"> positif</option>
                                            <option value="Negatif" class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2"> négatif</option>
                                            </select>                
                                        </div>  
                                         
                                    </div>
                               
                                </div>

                                <!-- /Comment Filter -->

                                <!-- disponibilite Filter -->
                                <div class="py-4 widget-filter widget-filter-price border-top">
                                  
                                    <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                                        data-bs-toggle="collapse" href="#filter-dispo" role="button" aria-expanded="true"
                                        aria-controls="filter-dispo">
                                        Disponibilite
                                    </a>
                                    <div  style="margin-top:-50px;" id="filter-dispo" class="collapse show">
                                       
                                        <div class="d-flex justify-content-between align-items-center mt-7">
                                            <div class="input-group mb-0 me-2 border">
                                               
                                                <input type="date" style="width:100px;" name="debut" id="debut" min="0" max="100000" step="1" class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                                            </div>   
                                            <div class="input-group mb-0 ms-2 border">
                                            
                                                <input type="date" name="fin" style="width:100px;"id="fin" min="0" max="100000" step="1" class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                                            </div>                
                                        </div>  
                                         
                                    </div>
                               
                                </div>


                                <!-- / Disponibilite Filter -->    
                            
                                <!-- Ville Filter -->
                                <div class="py-4 widget-filter border-top">
                                    <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                                        data-bs-toggle="collapse" href="#filter-brands" role="button" aria-expanded="true"
                                        aria-controls="filter-brands">
                                        Ville
                                    </a>
                                    <div id="filter-brands" class="collapse show">
                                            <div class="input-group my-3 py-1">
                                                <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search" aria-label="Search">
                                                <span class="input-group-text bg-transparent px-2 position-absolute top-7 end-0 border-0 z-index-20"><i class="ri-search-2-line text-muted"></i></span>
                                            </div>
                                        
                                            <div class="simplebar-wrapper">
                                                <div class="filter-options" data-pixr-simplebar>
                                                    @foreach ($villes as $ville)
                                                    
                                                        <div class="form-group form-check mb-0 d-flex align-items-center">
                                                            <input type="checkbox"  value="{{$ville->ville}}"  class="form-check-input1"name="cities[]" >
                                                            <label style="  margin-left: 10px;  margin-top: 5px;"class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                                                for="filter-brand-0">{{$ville->ville}}  <span
                                                                    class="text-muted">({{$ville->nombre_objets}})</span></label>
                                                        </div>    
                                                    @endforeach                        
                                                </div>
                                                
                                            </div>
                                      
                                    </div>
                                </div>

                                <!-- / ville Filter -->
                        
                                <!-- category Filter -->
                                <div class="py-4 widget-filter border-top">
                                    <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                                        data-bs-toggle="collapse" href="#filter-type" role="button" aria-expanded="true"
                                        aria-controls="filter-type">
                                        Categorie
                                    </a>
                                    <div id="filter-type" class="collapse show">
                                        <div class="input-group my-3 py-1">
                                            <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search" aria-label="Search">
                                            <span class="input-group-text bg-transparent px-2 position-absolute top-7 end-0 border-0 z-index-20"><i class="ri-search-2-line text-muted"></i></span>
                                        </div>
                                        {{-- <form id="filter-form" action="{{ route('category') }}" method="get"> --}}
                                            <div class="filter-options" id="categorie-filtre">
                                                @foreach ($categories1 as $categorie)
                                                    
                                                    <div class="form-group form-check mb-0">
                                                        <input type="checkbox" value="{{$categorie->id}}" class="form-check-input" name="categories[]" id="filter-brand-0">
                                                        <label  class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                                            for="filter-brand-0" >{{$categorie->nom_categorie}}  <span
                                                                class="text-muted">({{$categorie->nombre_objets}})</span>
                                                        </label>
                                                    </div>    
                                                @endforeach                            
                                            </div>
                                            {{-- <button type="submit" class="btn btn-primary">Filter</button> --}}
                                        {{-- </form> --}}
                                    </div>
                                </div>
                           
                                <!-- / category Filter -->
                            
                             
                          

                            
                         
                        
                        </aside>
                                      
                    </div>
                </div>
                <!-- / Filtre Aside/Sidebar -->

                <!-- Category Products-->
                    <div class="col-12 col-lg-9">

                        <!--Price  Order -->
                        <div class="mb-4 d-md-flex justify-content-between align-items-center">
                        
                            <div class="d-flex align-items-center flex-column flex-md-row">
                        
                                <div class="dropdown ms-md-2 lh-1 p-3 bg-light w-100 mb-2 mb-md-0 w-md-auto">
                                    <select id="sort-by-price" class="fs-xs fw-bold text-uppercase text-muted-hover p-0 m-0" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Sort By <i
                                            class="ri-arrow-drop-down-line ri-lg align-bottom"></i></p>

                                        <option value="asc" class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2">Prix croissant</option>
                                        <option value="desc" class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2">Prix décroissant</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                        </div> 
                        <!--  /Price  Order --> 
                                         

                    
                        <div id="lesannonces" class="row g-4 mb-5">
         
                            @foreach ($annonces as $key=> $annonce)
                        
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <!-- Card Product-->
                                        <div class="card position-relative h-100 card-listing hover-trigger">
                                            <div class="card-header">
                                                <picture class="position-relative overflow-hidden d-block bg-light">
                                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="storage/images/annonce/{{$annonce->image}}" alt="">
                                                </picture>
                                                    
                                            
                                            </div>
                                            <div class="card-body px-0 text-center">
                                                <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                                    <!-- Review Stars Small-->
                                        <div class="rating position-relative d-table">
                                            <div class="position-absolute stars" style="width: {{$annonce->note}}%">
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
                                        </div> <span class="small fw-bolder ms-2 text-muted">{{$annonce->note_avg}}
                                            {{-- ({{$annonce->nb_comment}}) --}}
                                        </span>
                                                </div>
                                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                    href="{{ route('louerObjet', ['id' => $annonce->id]) }}">{{$annonce->titre}}</a>
                                                    <p class="fw-bolder m-0 mt-2">{{$annonce->prix}}Dhs </p>
                                            </div>
                                        </div>
                                        <!--/ Card Product-->
                                    </div>
                            @endforeach

                        </div>
                        
                        <!-- / Products-->

                      
                        <!-- Pagination-->
                        <nav class="border-top mt-5 pt-5 d-flex justify-content-between align-items-center" aria-label="Category Pagination">
                            <ul class="pagination">
                            <!-- Lien "Précédent" -->
                            <li class="page-item {{ $annonces->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $annonces->previousPageUrl() }}">
                                <i class="ri-arrow-left-line align-bottom"></i> Prev
                                </a>
                            </li>
                            </ul>
                            
                            <ul class="pagination">
                            <!-- Liens de pages numérotées -->
                            @foreach ($annonces->getUrlRange(1, $annonces->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $annonces->currentPage() ? 'active' : '' }} mx-1">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            </ul>
                            
                            <ul class="pagination">
                            <!-- Lien "Suivant" -->
                            <li class="page-item {{ $annonces->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $annonces->nextPageUrl() }}">
                                Next <i class="ri-arrow-right-line align-bottom"></i>
                                </a>
                            </li>
                            </ul>
                        </nav>
                        
                        


                    
                    </div>
                
                <!-- / Category Products-->
               
            </div>
        </div>

    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <!-- Footer-->
        <footer class="bg-dark mt-12  ">
    
       
    
  
        
        <!-- Info Bar-->
        <div class="container mt-7">
        <div class="row">
    <!-- Boîte d'informations -->
    <div class="col-12 col-md-4 mb-3 mb-xxl-0 text-white" data-aos="fade-left">
        <div class="border-white-opacity border-2 p-4 d-flex flex-column flex-lg-row justify-content-start align-items-start h-100">
            <i class="ri-secure-payment-line ri-lg mb-3 mb-lg-0"></i>
            <div class="ms-lg-4">
                <p class="mb-1 lh-1 fw-bold">Paiement Sécurisé</p>
                <small class="text-muted">Paiement sécurisé grâce à notre système de cryptage SSL</small>
            </div>
        </div>
    </div>
    <!-- / Boîte d'informations -->

    <!-- Boîte d'informations -->
    <div class="col-12 col-md-4 mb-3 mb-xxl-0 text-white" data-aos="fade-left" data-aos-delay="250">
        <div class="border-white-opacity border-2 p-4 d-flex flex-column flex-lg-row justify-content-start align-items-start h-100">
            <i class="ri-shipping-time-line ri-lg mb-3 mb-lg-0"></i>
            <div class="ms-lg-4">
                <p class="mb-1 lh-1 fw-bold">Livraison Rapide</p>
                <small class="text-muted">Livraison rapide et fiable en 2-3 jours ouvrables</small>
            </div>
        </div>
    </div>
    <!-- / Boîte d'informations -->

    <!-- Boîte d'informations -->
    <div class="col-12 col-md-4 mb-3 mb-xxl-0 text-white" data-aos="fade-left" data-aos-delay="500">
        <div class="border-white-opacity border-2 p-4 d-flex flex-column flex-lg-row justify-content-start align-items-start h-100">
            <i class="ri-hand-heart-line ri-lg mb-3 mb-lg-0"></i>
            <div class="ms-lg-4">
                <p class="mb-1 lh-1 fw-bold">Satisfaction Garantie</p>
                <small class="text-muted">Vous pouvez être sûr que votre satisfaction est notre priorité absolue</small>
            </div>
        </div>
    </div>
    <!-- / Boîte d'informations -->
</div>
   </div>
        <!-- / Info Bar-->     
    
        <!-- Menus & Newsletter-->
        <div class="border-top-white-opacity py-7 mt-7 text-white">
            <div class="container" data-aos="fade-in">
                <div class="row my-4 flex-wrap">
        
              
        
                    
        
                    
          
                    
        
                </div>
                <div
                    class="border-top-white-opacity justify-content-between flex-column flex-md-row align-items-center d-flex pt-6 mt-6 px-0">
                    <p class="small opacity-75">&copy; 2023 <a
                            class="text-white" href="{{route('category')}}">Location des objets Projet</a></p>
                    
                </div>
            </div>
        </div>
        <!-- Menus & Newsletter-->
    
    </footer>
    <!-- / Footer-->
    <!-- Offcanvas Imports-->
    <!-- Cart Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasCart">
      <div class="offcanvas-header d-flex align-items-center">
        <h5 class="offcanvas-title" id="offcanvasCartLabel">Your Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="d-flex flex-column justify-content-between w-100 h-100">
          <div>
    
            <div class="mt-4 mb-5">
              <p class="mb-2 fs-6"><i class="ri-truck-line align-bottom me-2"></i> <span class="fw-bolder">$22</span> away
                from free delivery</p>
              <div class="progress f-h-1">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
    
            <!-- Cart Product-->
            <div class="row mx-0 pb-4 mb-4 border-bottom">
              <div class="col-3">
                <picture class="d-block bg-light">
                  <img class="img-fluid" src="./assets/images/products/product-1.jpg"
                    alt="Bootstrap 5 Template by Pixel Rocket">
                </picture>
              </div>
              <div class="col-9">
                <div>
                  <h6 class="justify-content-between d-flex align-items-start mb-2">
                    Mens StormBreaker Jacket
                    <i class="ri-close-line"></i>
                  </h6>
                  <small class="d-block text-muted fw-bolder">Size: Medium</small>
                  <small class="d-block text-muted fw-bolder">Qty: 1</small>
                </div>
                <p class="fw-bolder text-end m-0">$85.00</p>
              </div>
            </div>
    
            <!-- Cart Product-->
            <div class="row mx-0 pb-4 mb-4 border-bottom">
              <div class="col-3">
                <picture class="d-block bg-light">
                  <img class="img-fluid" src="./assets/images/products/product-2.jpg"
                    alt="Bootstrap 5 Template by Pixel Rocket">
                </picture>
              </div>
              <div class="col-9">
                <div>
                  <h6 class="justify-content-between d-flex align-items-start mb-2">
                    Mens Torrent Terrain Jacket
                    <i class="ri-close-line"></i>
                  </h6>
                  <small class="d-block text-muted fw-bolder">Size: Medium</small>
                  <small class="d-block text-muted fw-bolder">Qty: 1</small>
                </div>
                <p class="fw-bolder text-end m-0">$99.00</p>
              </div>
            </div>
    
          </div>
          <div class="border-top pt-3">
            <div class="d-flex justify-content-between align-items-center">
              <p class="m-0 fw-bolder">Subtotal</p>
              <p class="m-0 fw-bolder">$233.33</p>
            </div>
            <a href="./checkout.html"
              class="btn btn-orange btn-orange-chunky mt-5 mb-2 d-block text-center">Checkout</a>
            <a href="./cart.html"
              class="btn btn-dark fw-bolder d-block text-center transition-all opacity-50-hover">View Cart</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Filters Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasFilters">
      <div class="offcanvas-header d-flex align-items-center">
        <h5 class="offcanvas-title" id="offcanvasFiltersLabel">Category Filters</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="d-flex flex-column justify-content-between w-100 h-100">
    

          <!-- Filter Button-->
          <div class="border-top pt-3">
            <a href="#" class="btn btn-dark mt-2 d-block hover-lift-sm hover-boxshadow">Done</a>
          </div>
          <!-- /Filter Button-->
        </div>
      </div>
    </div>
    <!-- Review Offcanvas-->
   
    <!-- Search Overlay-->
 
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
 

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //code pou filtrer selon les prix (ASC DESC)
        $(document).ready(function() {
            // Fonction pour charger les annonces triées selon le prix
            function loadAdsByPrice(sortBy) {
              
                $.ajax({
                    url: "{{ route('category') }}",
                    type: "GET",
                    data: { sortByPrice: sortBy },
                    beforeSend: function() {
                        $('#lesannonces').html("<span>Working...</span>");
                    },

                    success: function(data) {
                        $('#lesannonces').html('');
                        $('#lesannonces').html(data);

                        
                    },
                    
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                  


                });
            }
            
            // Détecter le changement de l'option sélectionnée
            $('#sort-by-price').change(function() {
                var sortBy = $(this).val(); 
                loadAdsByPrice(sortBy);
            });
        });


    </script>

    <script>
        //code pou filtrer selon les prix (ASC DESC)
        $(document).ready(function() {
            // Fonction pour charger les annonces triées selon le prix
            function loadAdsByComment(sortBy) {
            
                $.ajax({
                    url: "{{ route('category') }}",
                    type: "GET",
                    data: { comment: sortBy },
                    beforeSend: function() {
                        $('#lesannonces').html("<span>Working...</span>");
                    },

                    success: function(data) {
                        $('#lesannonces').html('');
                        $('#lesannonces').html(data);

                        
                    },
                    
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                


                });
            }
            
            // Détecter le changement de l'option sélectionnée
            $('#sort-by-comment').change(function() {
                var sortBy = $(this).val(); 
                loadAdsByComment(sortBy);
            });
        });


    </script>

  <script>

        $(document).ready(function() {
            var lastChecked = null;

            var stars = document.querySelectorAll('.rating input[type="radio"]');
            for (var i = 0; i < stars.length; i++) {
                stars[i].addEventListener('click', function() {
                    if (this.checked) {
                        lastChecked = this.value;
                        console.log(lastChecked);

                        function note() { // Removed parameter, since it was not used

                            $.ajax({
                                url: "{{ route('category') }}",
                                type: "GET",
                                data: { lastChecked: lastChecked },
                                beforeSend: function() {
                                    $('#lesannonces').html("<span>Working...</span>");
                                },
                                success: function(data) {
                                    $('#lesannonces').html(data); // Removed redundant lines
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }

                        $('.rating').change(function() {
                            var lastChecked = $(this).val();
                            note(); // Call the note function
                        });
                    }
                });
            }
        });

  </script>

    <script>
        //filtre de note
        
        // $(document).ready(function() {
        //     var lastChecked = null;
            


        //     var stars = document.querySelectorAll('.rating input[type="radio"]');
        //     for (var i = 0; i < stars.length; i++) {
        //         stars[i].addEventListener('click', function() {
        //             if (this.checked) {
        //                 lastChecked = this.value;
        //                 console.log(lastChecked);

        //                 function note(lastChecked) { 

        //                     $.ajax({
        //                         url: "{{ route('category') }}",
        //                         type: "GET",
        //                         data: { lastChecked: lastChecked },
                                
        //                         success: function(data) {
                                
        //                             $('#lesannonces').html(data); 
                                
        //                         },
        //                         error: function(xhr) {
        //                             console.log(xhr.responseText);
        //                         }
        //                     });
        //                 }

        //                 $('.rating').change(function() {
                        
        //                     var lastChecked = $(this).val(); 
        //                     note(lastChecked);
        //                 });
        //             }
        //         });
        //     }


        // });

        // var stars = document.querySelectorAll('.rating input[type="radio"]');
        // for (var i = 0; i < stars.length; i++) {
        //     stars[i].addEventListener('click', function() {
        //         if (this.checked) {
        //             lastChecked = this.value;
        //             console.log(lastChecked);

        //             function note(lastChecked) {
        //                 $.ajax({
        //                     url: "{{ route('category') }}",
        //                     type: "GET",
        //                     data: { lastChecked: lastChecked },
        //                     beforeSend: function() {
        //                         $('#lesannonces').html("<span>Working...</span>");
        //                     },
        //                     success: function(data) {
        //                         $('#lesannonces').html(data); 
        //                     },
        //                     error: function(xhr) {
        //                         console.log(xhr.responseText);
        //                     }
        //                 });
        //             }

        //             $('.rating').change(function() {
        //                 note(lastChecked);
        //             });
        //         }
        //     });
        // }

       






    </script>
    <script>
      

        $(document).ready(function() {
            function loadAdsByPriceRange() {
                var prix_min = $('#prix_min').val();
                var prix_max = $('#prix_max').val();
                console.log(prix_min);
                console.log(prix_max);

                $.ajax({
                    url: "{{ route('category') }}",
                    type: "GET",
                    data: { prix_min: prix_min, prix_max: prix_max },
                    beforeSend: function() {
                        $('#lesannonces').html("<span>Working...</span>");
                    },
                    success: function(data) {
                        console.log(data);
                        $('#lesannonces').html(data);
                        // $('#lesannonces').html("<span>test...</span>");
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Détecter le changement des prix minimum et maximum
            $('#prix_min, #prix_max').change(function() {
                loadAdsByPriceRange();
                console.log(loadAdsByPriceRange());
             
            });
        });



    </script>

    <script>
        
        //filtre pa date de diponibilite
        $(document).ready(function() {
            function loadAdsByDateRange() {
                var debut = $('#debut').val();
                var fin = $('#fin').val();
                console.log(debut);
                console.log(fin);

                $.ajax({
                    url: "{{ route('category') }}",
                    type: "GET",
                    data: { debut: debut, fin: fin },
                    beforeSend: function() {
                        $('#lesannonces').html("<span>Working...</span>");
                    },
                    success: function(data) {
                        console.log(data);
                        $('#lesannonces').html(data);
                        // $('#lesannonces').html("<span>test...</span>");
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Détecter le changement des prix minimum et maximum
            $('#debut, #fin').change(function() {
                loadAdsByDateRange();
                console.log(loadAdsByDateRange());
            
            });
        });



    </script>


    <script>
        
        // code pour filtrer selon les categories
            $(document).ready(function() {

                function loadAdsByCategory(categories) {
                    $.ajax({
                        url: "{{ route('category') }}",
                        type: "GET",
                        data: { categories: categories },
                        beforeSend: function() {
                            $('#lesannonces').html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $('#lesannonces').html(data);
                            // $('#lesannonces').html("<span>Wissal...</span>");
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }

                function getCheckedCategories() {
                    var categories = [];
                    $('.form-check-input:checked').each(function() {
                        categories.push($(this).val());
                    });
                    return categories;
                }

                // Détecter le changement des catégories cochées
                $('.form-check-input').change(function() {
                    var categories = getCheckedCategories();
                    // console.log(categories);
                    
                 
                    loadAdsByCategory(categories);
                });
            });



    </script>





    <script>
        //code pour filtrer selon les villes

        $(document).ready(function() {

            function loadAdsByVille(cities) {
                $.ajax({
                    url: "{{ route('category') }}",
                    type: "GET",
                    data: { cities: cities },
                    beforeSend: function() {
                        $('#lesannonces').html("<span>Working...</span>");
                    },
                    success: function(data) {
                        $('#lesannonces').html(data);
                        
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            function getCheckedVilles() {
                var cities = [];
                $('.form-check-input1:checked').each(function() {
                    cities.push($(this).val());
                });
                return cities;
                
            }

            // Détecter le changement des catégories cochées
            $('.form-check-input1').change(function() {
                var cities = getCheckedVilles();

                loadAdsByVille(cities);
            });
        });



    </script>
    {{-- <script>     
       var lastChecked = null; // initialiser à null

        var stars = document.querySelectorAll('.rating input[type="radio"]');
        
        for (var i = 0; i < stars.length; i++) {
            stars[i].addEventListener('click', function() {
                if (this.checked) {
                    lastChecked = this.value; // Stocker la dernière valeur cochée
                    console.log(lastChecked);
                }
            });
        }
    </script> --}}



    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>