@include('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<body class="">
  {{-- modifierAnnonceModal start --}}
<div class="modal fade" id="modifierAnnonceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modifier Annonce</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
   
    


    <form action="{{route('modifierAnnonce')}}" method="POST" id="edit_annonce_form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body p-4 bg-light">
      <input type="hidden" name="annonce_id" value="{{$annonce->id}}" id="emp_id">
        <div class="col-12">
          <div class="form-group">
            <label for="categorie" class="form-label">Catégorie</label>
            <select class="form-select" id="categorie" name="categorie">
             
            @foreach($categories as $categorie)
                <option id="{{ $categorie->id_categorie }}" value="{{ $categorie->id }}" @if($categorie->nom_categorie == $annonce->categorie->nom_categorie) selected @endif>
                    {{ $categorie->nom_categorie }}
                </option>
            @endforeach

            </select>
          </div>
        </div>

        <div class="col-12">
          <div class="form-group">
            <label for="objet" class="form-label" id="objLabel">Objet</label>
            <select class="form-select" id="objet"  name="objet">
            <option value="" id="objet_vide">Veuillez selectionner un Objet</option>
            <option value="alertmessage" style="color:red">Veuillez choisir un nouveau objet</option>
                @foreach($objets as $objet)
                    <option id="{{$objet->id_categorie}}" value="{{$objet->id}}"  @if($objet->nom_objet == $annonce->objet->nom_objet) selected @endif>{{$objet->nom_objet}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <script>
                            const categorieSelect = document.getElementById("categorie");
                            const objetSelect = document.getElementById("objet");
                            const objLabel = document.getElementById("objLabel");
                            const objetOptions = objetSelect.querySelectorAll("option");
                            if (categorieSelect.value !== "") {
                                
                                objetSelect.style.display = "block";
                                objLabel.style.display="block";
                                
                                
                                objetOptions.forEach(option => {
                                  if (option.getAttribute("id") === categorieSelect.value) {
                                    option.style.display = "block";
                                    
                                  } else {
                                    option.style.display = "none";
                                    
                                  }
                                });
                              } else {
                                
                                objetSelect.style.display = "none";
                                objLabel.style.display="none";
                                
                                
                                objetOptions.forEach(option => {
                                  option.style.display = "none";
                                });
                              }
                            categorieSelect.addEventListener("change", () => {
                              
                              if (categorieSelect.value !== "") {
                                
                                objetSelect.style.display = "block";
                                objLabel.style.display="block";
                                
                                
                                
                                objetOptions.forEach(option => {
                                  if (option.getAttribute("id") === categorieSelect.value) {
                                    option.style.display = "block";
                                    objetSelect.value = 'alertmessage';
                                  } else {
                                    option.style.display = "none";
                                    
                                  }
                                });
                              } else {
                                
                                objetSelect.style.display = "none";
                                objLabel.style.display="none";
                                
                                
                                objetOptions.forEach(option => {
                                  option.style.display = "none";
                                });
                              }
                            });

                        </script>

        <!-- Titre-->
        <div class="col-12">
          <div class="form-group">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
            id="titre" placeholder="" name="titre" value="{{ $annonce->titre }}" autofocus>
          </div>
        </div>


        <!-- Description-->
        <div class="col-md-12">
          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" aria-label="With textarea" name="description">{{ $annonce->description }}</textarea>
          </div>
        </div>


        <div class="row">

        <!-- Adresse-->
        <div class="col-md-6">
          <div class="form-group">
            <label for="state" class="form-label">Ville</label>
            
            <select class="form-select" id="objet" name="ville">
              
              <option value="casablanca" @if($annonce->ville == "casablanca") selected @endif>Casablanca</option>
              <option value="rabat" @if($annonce->ville == "rabat") selected @endif>Rabat</option>
              <option value="marrakech" @if($annonce->ville == "marrakech") selected @endif>Marrakech</option>
              <option value="fes" @if($annonce->ville == "fes") selected @endif>Fes</option>
              <option value="tangier" @if($annonce->ville == "tangier") selected @endif>Tangier</option>
              <option value="tetouan" @if($annonce->ville == "tetouan") selected @endif>Tétouan</option>
              <option value="agadir" @if($annonce->ville == "agadir") selected @endif>Agadir</option>
            </select>
          </div>
        </div>


        <!-- Prix de location-->
        <div class="col-md-6">
          <div class="form-group">
          
            <label for="zip" class="form-label">Prix de location par jour</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">MAD</span>
            </div>
            <input type="text" class="form-control" id="zip" name="prix" placeholder="" value="{{ $annonce->prix }}">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
        </div>

      </div>

    </div>



      

      <div class="row">
        <!-- Date Debut-->
      <div class="col-md-6 ">
        <div class="form-group">
          <label for="state" class="form-label">Date début</label>
          <input type="date" class="form-control" name="dateDebut" value="{{ $annonce->date_debut }}">
        </div>
      </div>
  
      <!-- Date fin-->
      <div class="col-md-6">
        <div class="form-group">
          <label for="zip" class="form-label">Date fin</label>
          <input type="date" class="form-control" name="dateFin" value="{{ $annonce->date_fin }}">
          
      </div>
      </div>


    
      
    </div>



    <br>
    <div class="form-group" style="margin-top:30px;">
      <h5>Images</h5>
      
      
    </div>


    <br>
        <div class="col-12 border-top">
          <br>
          
        <div class="d-flex justify-content-center mb-4">
        
            <div id="image-preview" >
                <img src="{{ asset('assets/images/logos/AddImageLogo.png') }}" id="imageplus"
                class="rounded-circle" alt="example placeholder" style="width: 200px;" />
            </div>
        </div>

        {{-- <div class="d-flex justify-content-center">
            <div class="btn btn-primary btn-rounded btn-orange btn-orange-chunky"> 
                <label class="form-label text-white m-1 " for="customFile2" >Choisir des Images</label>
                <input name="images[]"   value="{{$annonce->images}}" type="file" class="form-control d-none" id="customFile2"  multiple />
              </div>
              
            
        </div>
        <center><small style="color:black;display:block;margin:10px;font-size:bold;">
            Veuillez uploader une ou plusieurs images en format(jpg, jpeg, png ou gif) .
          </small></center>
        
        <script>
            const input = document.getElementById("customFile2");
            const preview = document.getElementById("image-preview");
            
            input.addEventListener("change", function () {
                preview.innerHTML = "";
                const files = this.files;

                if (files) {
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];

                        const reader = new FileReader();

                        reader.addEventListener("load", function () {
                            const image = new Image();
                            image.src = this.result;
                            image.style.width = "200px";
                            image.style.border = "2px solid #333";
                            
                            image.style.boxSizing = "border-box";
                            image.style.margin = "10px";
                            image.style.boxShadow = "0px 0px 10px #333";

                            preview.appendChild(image);
                        });

                        reader.readAsDataURL(file);
                    }
                }
            });
        </script> --}}


        <div class="d-flex justify-content-center">
          <div class="btn btn-primary btn-rounded btn-orange btn-orange-chunky">
              <label class="form-label text-white m-1" for="customFile2">Changer les Images</label>
              <input name="images[]" value="{{$annonce->images}}" type="file" class="form-control d-none" id="customFile2" multiple />
      
          </div>
      
      </div>
      <center>
          <small style="color:black;display:block;margin:10px;font-size:bold;">
              Veuillez uploader une ou plusieurs images en format(jpg, jpeg, png ou gif) .
          </small>
      </center>
      
      <div id="image-preview" class="d-flex flex-wrap"></div>
      
      <script>
          const input = document.getElementById("customFile2");
          const preview = document.getElementById("image-preview");
          const imageplus = document.getElementById("imageplus");
      
          // Show existing images
          const images = {!! json_encode($annonce->images) !!};
          
          for (let i = 0; i < images.length; i++) {
            imageplus.style.display = 'none';
              const image = new Image();
              console.log(images[i]);
              image.src = "../../storage/images/annonce/" + images[i]['image'];
              image.style.width = "200px";
              image.style.border = "2px solid #333";
              image.style.boxSizing = "border-box";
              image.style.margin = "10px";
              image.style.boxShadow = "0px 0px 10px #333";
              preview.appendChild(image);
          }

          
      
          input.addEventListener("change", function () {
              preview.innerHTML = "";
              const files = this.files;
      
              if (files) {
                  for (let i = 0; i < files.length; i++) {
                      const file = files[i];
      
                      const reader = new FileReader();
      
                      reader.addEventListener("load", function () {
                          const image = new Image();
                          image.src = this.result;
                          image.style.width = "200px";
                          image.style.border = "2px solid #333";
                          image.style.boxSizing = "border-box";
                          image.style.margin = "10px";
                          image.style.boxShadow = "0px 0px 10px #333";
                          preview.appendChild(image);
                      });
      
                      reader.readAsDataURL(file);
                  }
              }
          });
      </script>
      


        
        </div>



        <br>
        <br>


        <h5 class="title-checkout">Plus d'informations</h5>

          <div class="row">
            <!-- nombre minimum de jours-->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="firstNameAddress" class="form-label">Nombre de Jours Minimum de Location </label>
                <input type="text" class="form-control" id="firstNameAddress" placeholder="Ex : 3"
                name="nbrJrsMin" value="{{ $annonce->min_jour }}">
              </div>
            </div>


          </div>




          <div class="pt-4 mt-4 border-top d-flex justify-content-between align-items-center">
            <!-- Shipping Same Checkbox-->
            <div class="form-group form-check m-0">
              <input type="checkbox" class="form-check-input" id="same-address" checked>
              <label class="form-check-label" for="same-address" >Je ne veux pas modifier les jours spécifique</label>
              
            </div>
          </div>

          <!-- /Checkout Shipping Address -->                    <!-- Checkout Billing Address-->
          <div class="billing-address checkout-panel d-none">
            <div style="margin-left:50px;margin-top:20px;">
            <div class="form-check" >
                <input class="form-check-input " type="checkbox" value="Lundi" name="jours[]" id="flexCheckDefault" >
                <label class="form-check-label" for="flexCheckDefault">
                  Lundi
                </label>
              </div>  
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Mardi" name="jours[]" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                  Mardi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Mercredi" name="jours[]" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                  Mercredi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Jeudi" name="jours[]" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                  Jeudi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Vendredi" name="jours[]" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                  Vendredi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Samedi" name="jours[]" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                  Samedi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dimanche" name="jours[]" id="flexCheckChecked" {}>
                <label class="form-check-label" for="flexCheckChecked">
                  Dimanche
                </label>
            </div>
            </div>
            </div>





            <!-- <div class="form-group form-check my-4">
              <input type="checkbox" class="form-check-input" id="accept-terms" >
              <label class="form-check-label fw-bolder" for="accept-terms">I agree to location Objet's <a href="#">terms & conditions</a></label>
          </div> -->
                      


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="edit_annonce_btn" data-id="{{ $annonce->id }}"  class="btn btn-success">Modifier Annonce</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- modifierAnnonceModal modal end --}}












    @include('navbar3')
    <!-- Main Section-->
    <section class="mt-5 ">
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

        <!-- Page Content Goes Here -->

        <!-- Product Top-->
        <section class="container">
            
            <div class="row g-5">

                <!-- Images Section-->
                <div class="col-12 col-lg-7">
                    <div class="row g-1">
                        <div class="swiper-container gallery-thumbs-vertical col-2 pb-4">
                            <div class="swiper-wrapper">
                            @foreach($annonce->images as $image)
                                <div class="swiper-slide bg-light bg-light h-auto">
                                    
                                    <picture>
                                        
                                    <img class="img-fluid mx-auto d-table" src="../../storage/images/annonce/{{$image->image}}" alt="Bootstrap 5 Template by Pixel Rocket">
                                    </picture>
                                </div>
                            @endforeach
                            </div>
                          </div>
                          <div class="swiper-container gallery-top-vertical col-10">
                            <div class="swiper-wrapper">
                            @foreach($annonce->images as $image)
                                <div class="swiper-slide bg-light bg-light h-auto">
                                    <picture>
                                        <img class="img-fluid mx-auto d-table" src="../../storage/images/annonce/{{$image->image}}" alt="Bootstrap 5 Template by Pixel Rocket">
                                    </picture>
                                </div>
                            @endforeach
                            </div>
                          </div>
                    </div>
                </div>
                <!-- /Images Section-->

                <!-- Product Info Section-->
                <div class="col-12 col-lg-5">
                    <div class="pb-3">
                    
                        <!-- Product Name, Review, Brand, Price-->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="small fw-bolder text-uppercase tracking-wider  mb-0 lh-1">Annonce Détails</p>
                            
                        </div>
                        <br>
                        <p class="small fw-bolder text-uppercase tracking-wider text-muted mb-0 lh-1">Titre : </p>
                        <h1 class="mb-2 fs-2 fw-bold">{{$annonce->titre}}</h1>
                        <br>
                        <p class="small fw-bolder text-uppercase tracking-wider text-muted mb-0 lh-1">Description : </p>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-3 lh-1 textcustom me-2">{{$annonce->description}}</p>
                            
                        </div>
                        <!-- /Product Name, Review, Brand, Price-->
                    
                        <!-- Product Views-->
                        <!-- <div class="d-flex justify-content-start mt-3">
                            <div class="alert bg-light rounded py-1 px-2 d-table m-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <i class="ri-fire-fill lh-1 text-orange"></i>
                                    <div class="ms-2">
                                        <small class="opacity-75 fw-bolder lh-1">167 views today</small>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- /Product Views -->
                        
                        <!-- Product Options-->
                        <div class="border-top mt-4 mb-3">
                            <div class="product-option mb-4 mt-4">
                            <small class="text-uppercase d-block fw-bolder mb-2">
                            Status en cours:
                            <span class="fw-bold" id="statusLabel" style="color: {{ $annonce->status == 'enligne' ? 'green' : 'red'}}">
                                {{ $annonce->status == 'enligne' ? 'En ligne' : 'Hors ligne' }}
                            </span>
                            <br><br>Changer Statut:
                            <div class="d-flex justify-content-start" style="display:inline;">
                            <label class="switch">
                                <!-- <script>
                                  $(document).ready(function() {
                                    $('#annonce-status').change(function() {
                                      if ($(this).is(':checked')) {
                                        window.location.href = '/welcome' ;
                                      }
                                    });
                                  });
                                </script> -->
                                <input type="checkbox" id="annonce-status" data-id="{{ $annonce->id }}"  {{ $annonce->status == 'enligne' ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                            
                            


                            </div>
                            </small>
                                
                            </div>
                            <!-- <div class="product-option">
                                <small class="text-uppercase d-block fw-bolder mb-2">
                                    Size (UK) : <span class="selected-option fw-bold"></span>
                                </small>
                                <div class="form-group">
                                    <select name="selectSize" class="form-control" data-choices>
                                        <option value="">Please Select Size</option>
                                        <option value="Extra Small">XS</option>
                                        <option value="Medium">M</option>
                                        <option value="Large">L</option>
                                        <option value="Extra Large">XL</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <!-- /Product Options-->
                    
                        <!-- Add To Cart-->
                        <div class="d-flex justify-content-between mt-3">
                            {{-- <button class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white">Modifier</button> --}}
                            <button class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white editAnnonce" 
                          data-bs-toggle="modal" data-bs-target="#modifierAnnonceModal"><i
                            class=""></i>Modifier</button>
                            <button id="{{ $annonce->id }}" class="btn btn-danger btn-danger-chunky deleteIcon"><i class="bi-trash h4"></i></button>

                        </div>
                        <!-- /Add To Cart-->
                    
                    
                        
                    
                    </div>                </div>
                <!-- / Product Info Section-->
            </div>
        </section>
        <!-- / Product Top-->

        <section>

            

        </section>

        


        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <!-- Footer-->
    @include('footer')
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
    
          <!-- Filters-->
          <div>
            <!-- Filter Category -->
            <div class="mb-4">
              <h2 class="mb-4 fs-6 mt-2 fw-bolder">Jacket Category</h2>
              <nav>
                <ul class="list-unstyled list-default-text">
                  <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Waterproof Jackets</span> <span class="text-muted ms-4">(21)</span></a>
                  </li>              <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Down Jackets</span> <span class="text-muted ms-4">(13)</span></a>
                  </li>              <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Windproof Jackets</span> <span class="text-muted ms-4">(18)</span></a>
                  </li>              <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Hiking Jackets</span> <span class="text-muted ms-4">(25)</span></a>
                  </li>              <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Climbing Jackets</span> <span class="text-muted ms-4">(11)</span></a>
                  </li>              <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Trekking Jackets</span> <span class="text-muted ms-4">(19)</span></a>
                  </li>              <li class="mb-2"><a
                      class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                      href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Allround Jackets</span> <span class="text-muted ms-4">(24)</span></a>
                  </li>            </ul>
              </nav>
            </div>
            <!-- / Filter Category-->
    
            <!-- Price Filter -->
            <div class="py-4 widget-filter widget-filter-price border-top">
              <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                data-bs-toggle="collapse" href="#filter-modal-price" role="button" aria-expanded="false"
                aria-controls="filter-modal-price">
                Price
              </a>
              <div id="filter-modal-price" class="collapse">
                <div class="filter-price mt-6"></div>
                <div class="d-flex justify-content-between align-items-center mt-7">
                    <div class="input-group mb-0 me-2 border">
                        <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                        <input type="number" min="00" max="1000" step="1" class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                    </div>   
                    <div class="input-group mb-0 ms-2 border">
                        <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                        <input type="number" min="00" max="1000" step="1" class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                    </div>                
                </div>          </div>
            </div>
            <!-- / Price Filter -->
    
            <!-- Brands Filter -->
            <div class="py-4 widget-filter border-top">
              <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                data-bs-toggle="collapse" href="#filter-modal-brands" role="button" aria-expanded="false"
                aria-controls="filter-modal-brands">
                Brands
              </a>
              <div id="filter-modal-brands" class="collapse">
                <div class="input-group my-3 py-1">
                  <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search"
                    aria-label="Search">
                  <span class="input-group-text bg-transparent p-2 position-absolute top-2 end-0 border-0 z-index-20"><i
                      class="ri-search-2-line text-muted"></i></span>
                </div>
                <div class="simplebar-wrapper">
                  <div class="filter-options" data-pixr-simplebar>
                    <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-0">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-0">Adidas  <span
                                class="text-muted">(21)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-1">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-1">Asics  <span
                                class="text-muted">(13)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-2">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-2">Canterbury  <span
                                class="text-muted">(18)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-3">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-3">Converse  <span
                                class="text-muted">(25)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-4">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-4">Donnay  <span
                                class="text-muted">(11)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-5">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-5">Nike  <span
                                class="text-muted">(19)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-6">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-6">Millet  <span
                                class="text-muted">(24)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-7">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-7">Puma  <span
                                class="text-muted">(11)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-8">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-8">Reebok  <span
                                class="text-muted">(19)</span></label>
                    </div>                <div class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-9">
                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                            for="filter-brands-modal-9">Under Armour  <span
                                class="text-muted">(24)</span></label>
                    </div>              </div>
                </div>
              </div>
            </div>
            <!-- / Brands Filter -->
    
            <!-- Type Filter -->
            <div class="py-4 widget-filter border-top">
              <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                data-bs-toggle="collapse" href="#filter-modal-type" role="button" aria-expanded="false"
                aria-controls="filter-modal-type">
                Type
              </a>
              <div id="filter-modal-type" class="collapse">
                <div class="input-group my-3 py-1">
                  <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search"
                    aria-label="Search">
                  <span class="input-group-text bg-transparent p-2 position-absolute top-2 end-0 border-0 z-index-20"><i
                      class="ri-search-2-line text-muted"></i></span>
                </div>
                <div class="filter-options">
                  <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="filter-type-modal-0">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                          for="filter-type-modal-0">Slip On </label>
                  </div>              <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="filter-type-modal-1">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                          for="filter-type-modal-1">Strap Up </label>
                  </div>              <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="filter-type-modal-2">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                          for="filter-type-modal-2">Zip Up </label>
                  </div>              <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="filter-type-modal-3">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                          for="filter-type-modal-3">Toggle </label>
                  </div>              <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="filter-type-modal-4">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                          for="filter-type-modal-4">Auto </label>
                  </div>              <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="filter-type-modal-5">
                      <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                          for="filter-type-modal-5">Click </label>
                  </div>            </div>
              </div>
            </div>
            <!-- / Type Filter -->
    
            <!-- Sizes Filter -->
            <div class="py-4 widget-filter border-top">
              <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                data-bs-toggle="collapse" href="#filter-modal-sizes" role="button" aria-expanded="false"
                aria-controls="filter-modal-sizes">
                Sizes
              </a>
              <div id="filter-modal-sizes" class="collapse">
                <div class="filter-options mt-3">
                  <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-0">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-0">6.5</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-1">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-1">7</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-2">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-2">7.5</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-3">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-3">8</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-4">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-4">8.5</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-5">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-5">9</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-6">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-6">9.5</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-7">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-7">10</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-8">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-8">10.5</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-9">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-9">11</label>
                  </div>              <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                      <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-10">
                      <label class="form-check-label fw-normal" for="filter-sizes-modal-10">11.5</label>
                  </div>            </div>
              </div>
            </div>
            <!-- / Sizes Filter -->
    
            <!-- Colour Filter -->
            <div class="py-4 widget-filter border-top">
              <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                data-bs-toggle="collapse" href="#filter-modal-colour" role="button" aria-expanded="false"
                aria-controls="filter-modal-colour">
                Colour
              </a>
              <div id="filter-modal-colour" class="collapse">
                <div class="filter-options mt-3">
                  <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-primary">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-0">
                      <label class="form-check-label" for="filter-colours-modal-0"></label>
                  </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-success">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-1">
                      <label class="form-check-label" for="filter-colours-modal-1"></label>
                  </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-2">
                      <label class="form-check-label" for="filter-colours-modal-2"></label>
                  </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-3">
                      <label class="form-check-label" for="filter-colours-modal-3"></label>
                  </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-4">
                      <label class="form-check-label" for="filter-colours-modal-4"></label>
                  </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-dark">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-5">
                      <label class="form-check-label" for="filter-colours-modal-5"></label>
                  </div>              <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-secondary">
                      <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-6">
                      <label class="form-check-label" for="filter-colours-modal-6"></label>
                  </div>            </div>
              </div>
            </div>
            <!-- / Colour Filter -->
          </div>
          <!-- / Filters-->
    
          <!-- Filter Button-->
          <div class="border-top pt-3">
            <a href="#" class="btn btn-dark mt-2 d-block hover-lift-sm hover-boxshadow">Done</a>
          </div>
          <!-- /Filter Button-->
        </div>
      </div>
    </div>
    <!-- Review Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasReview">
      <div class="offcanvas-header d-flex align-items-center">
        <h5 class="offcanvas-title" id="offcanvasReviewLabel">Leave A Review</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <!-- Review Form -->
        <form>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewName">Your Name</label>
            <input type="text" class="form-control" id="formReviewName" placeholder="Your Name">
          </div>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewEmail">Your Email</label>
            <input type="text" class="form-control" id="formReviewEmail" placeholder="Your Email">
          </div>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewTitle">Your Review Title</label>
            <input type="text" class="form-control" id="formReviewTitle" placeholder="Review Title">
          </div>
          <div class="form-group mb-3 mt-2">
            <label class="form-label" for="formReviewReview">Your Review</label>
            <textarea class="form-control" name="formReviewReview" id="formReviewReview" cols="30" rows="5"
              placeholder="Your Review"></textarea>
          </div>
          <button type="submit" class="btn btn-dark hover-lift hover-boxshadow">Submit Review</button>
        </form>
        <!-- / Review Form-->
      </div>
    </div>
    <!-- Search Overlay-->
    <section class="search-overlay">
        <div class="container search-container">
            <div class="py-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead lh-1 m-0 fw-bold">What are you looking for?</p>
                    <button class="btn btn-light btn-close-search"><i class="ri-close-circle-line align-bottom"></i> Close search</button>
                </div>
                <form>
                    <input type="text" class="form-control" id="searchForm" placeholder="Search by product or category name...">             
                </form>
                <div class="my-5">
                    <p class="lead fw-bolder">2 results found for <span class="fw-bold">"Waterproof Jacket"</span></p>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">
                                <div class="card-header">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-1.jpg" alt="Bootstrap 5 Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-actions">
                                        <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">S</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">M</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">L</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 text-center">
                                    <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                        <!-- Review Stars Small-->
                            <div class="rating position-relative d-table">
                                <div class="position-absolute stars" style="width: 80%">
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
                            </div> <span class="small fw-bolder ms-2 text-muted"> 4.2 (123)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="./product.html">Mens Pennie II Waterproof Jacket</a>
                                        <p class="fw-bolder m-0 mt-2">$325.66</p>
                                </div>
                            </div>
                            <!--/ Card Product-->
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">
                                <div class="card-header">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-2.jpg" alt="Bootstrap 5 Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-actions">
                                        <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">S</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">M</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">L</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 text-center">
                                    <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                        <!-- Review Stars Small-->
                            <div class="rating position-relative d-table">
                                <div class="position-absolute stars" style="width: 70%">
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
                            </div> <span class="small fw-bolder ms-2 text-muted"> 4.5 (1289)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="./product.html">Mens Storm Waterproof Jacket</a>
                                        <p class="fw-bolder m-0 mt-2">$499.99</p>
                                </div>
                            </div>
                            <!--/ Card Product-->
                        </div>
                    </div>
                </div>
    
                <div class="bg-dark p-4 text-white">
                    <p class="lead m-0">Didn't find what you are looking for? <a class="transition-all opacity-50-hover text-white text-link-border border-white pb-1 border-2" href="#">Send us a message.</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>


    <script>

      $(document).ready(function() {
          // handle checkbox click event
          $('#annonce-status').click(function() {
    // get ID and status of the Annonce object
    var id = $(this).data('id');
    var status = $(this).prop('checked') ? 'enligne' : 'horsligne';
    var mssg = status == 'horsligne' ? 'vous étes sure vous voulez mettre cette annonce hors ligne ?' : 'vous étes sure vous voulez mettre cette annonce en ligne?  Nb:vous ne pouvez pas avois plus de 5 annonces en lignes . ';
    
    // show confirmation alert
    swal({
        title: "Confirmation",
        text: mssg,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willChange) => {
    // proceed to changing the status if user clicks the "OK" button and the status needs to be changed
    if (willChange) {
        // send AJAX request to update status
        $.ajax({
            url: '/changeStatus',
            type: 'POST',
            data: {
                id: id,
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
              var statusLabel = $('#statusLabel');
              // update the view with the updated Annonce object
              $('#statusLabel').html(data.html);
              $('#annonce-status').prop('checked', data.checked);
              // define the status label and update its color
              if (status == 'enligne') {
                  statusLabel.css('color', 'green');
              } else {
                  statusLabel.css('color', 'red');
              }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    } else {
        // reset the checkbox to its previous state
        $('#annonce-status').prop('checked', !$('#annonce-status').prop('checked'));
    }
});

});








        
          $('.deleteIcon').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this record!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "{{ route('deleteAnnonce') }}",
          type: "POST",
          data: {
            id: id,
            _token: "{{ csrf_token() }}",
          },
          
          success: function(response) {
          swal("Success", "Record deleted successfully!", "success");
          // redirect to the mesAnnonces page after deletion is completed
          window.location.href = "{{ route('mesAnnonces') }}";
        }
        });
      } else {
        swal("Action Cancelled", "Your record is safe!", "info");
      }
    });
  });
      });

    </script>



</body>

</html>