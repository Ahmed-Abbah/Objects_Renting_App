
@include('header')
@include('navbar')

    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->

        <!-- / Hero Section -->
        <section class="vh-100 position-relative bg-overlay-dark ">
            <div class="container d-flex h-100 justify-content-center align-items-center position-relative z-index-10">
                <div  
                    class="d-flex justify-content-center align-items-center h-100 position-relative z-index-10 text-white">
                    <div  style="margin-top:60px;">
                        <h3 style="margin-top:30px;font-size:60px;" class="display-1 fw-bold px-2 px-md-5 text-center mx-auto col-lg-12 mt-md-0"
                            data-aos="fade-up" data-aos-delay="500">Pourquoi acheter quand vous pouvez louer ? Louez des objets et économisez de l'argent !</h3>
                        <div data-aos="fade-in" data-aos-delay="2000">
                            <div class="d-md-flex justify-content-center mt-4 mb-3 my-md-5">
                                <a href="{{route('category')}}"
                                    class="btn btn-skew-left btn-orange btn-orange-chunky text-white mx-1 w-100 w-md-auto mb-2 mb-md-0"><span>Consulter nos annonces <i class="ri-arrow-right-line align-middle fw-bold"></i></span></a>
                                <a href="{{route('ajouterAnnonce')}}"
                                    class="btn btn-skew-left btn-orange btn-orange-chunky text-white mx-1 w-100 w-md-auto mb-2 mb-md-0"><span>
                                    Ajouter une annonce<i class="ri-arrow-right-line align-middle fw-bold"></i></span></a>
                            </div>
                            <i class="ri-mouse-line d-block text-center animation-float ri-2x transition-all opacity-50-hover text-white"
                                data-pixr-scrollto data-target=".brand-section" data-aos="fade-up"
                                data-aos-delay="700"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute z-index-1 top-0 bottom-0 start-0 end-0">
                <!-- Swiper Info -->
                <div class="swiper-container overflow-hidden bg-light w-100 h-100"
                  data-swiper
                  data-options='{
                    "slidesPerView": 1,
                    "speed": 1500,
                    "loop": true,
                    "effect": "fade",
                    "autoplay": {
                      "delay": 5000
                    }
                  }'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/img1.jpg);">
                      </div> 
                    </div>
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/img2.jpg);"> 
                      </div>
                    </div>
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/img3.jpg);"> 
                      </div>
                    </div>
                  </div> 
                
                </div>
                <!-- / Swiper Info-->            </div>
        </section>
        <!--/ Hero Section-->

      
     

        <!-- Staff Picks-->
        <section class="mb-9 mt-5" data-aos="fade-up">
            <div class="container">
                <div class="w-md-50 mb-5">
                    <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">Top produits</p>
                    <h2 class="display-5 fw-bold mb-3">Choix du personnel</h2>
                    <p class="lead">Nous avons trié notre flux pour constituer une collection de nos produits parfaits pour une vie simple.</p>
                </div>
                <!-- Swiper Latest -->
                <div class="swiper-container overflow-visible"
                  data-swiper
                  data-options='{
                    "spaceBetween": 25,
                    "cssMode": true,
                    "roundLengths": true,
                    "scrollbar": {
                      "el": ".swiper-scrollbar",
                      "hide": false,
                      "draggable": true
                    },      
                    "navigation": {
                      "nextEl": ".swiper-next",
                      "prevEl": ".swiper-prev"
                    },  
                    "breakpoints": {
                      "576": {
                        "slidesPerView": 1
                      },
                      "768": {
                        "slidesPerView": 2
                      },
                      "992": {
                        "slidesPerView": 3
                      },
                      "1200": {
                        "slidesPerView": 4
                      }            
                    }
                  }'>
                  <div class="swiper-wrapper pb-5 pe-1">
                    @foreach ($annonces as $key=> $annonce)
                      <div class="swiper-slide d-flex h-auto">
                            <!-- Card Product-->
                            

                                
                                    <div class="card position-relative h-100 card-listing hover-trigger">
                                        <div class="card-header">
                                            <picture class="position-relative overflow-hidden d-block bg-light">
                                                
                                                
                                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ asset('storage/images/annonce/' . $annonce->image) }}" alt="">
                                                

                                            </picture>
                                                
                                            <div class="card-actions">
                                                <span class="small text-uppercase tracking-wide fw-bolder text-center d-block"> Afficher</span>
                                                
                                            </div>
                                        </div>
                                        <div class="card-body px-0 text-center">
                                            <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                                <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width:{{$annonce->note}}%">
                                            @foreach(range(1, 5) as $i)
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                            @endforeach

                                        </div>
                                        <div class="stars">
                                            @foreach(range(1, 5) as $i)
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            @endforeach
                                        </div>
                                    </div> <span class="small fw-bolder ms-2 text-muted"> {{$annonce->note_avg}} </span>
                                            </div>
                                            <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                href="{{ route('louerObjet', ['id' => $annonce->id]) }}">{{$annonce->titre}}</a>
                                                <p class="fw-bolder m-0 mt-2">${{$annonce->prix}}</p>
                                        </div>
                                    </div>
                               
                            <!--/ Card Product-->
                      </div>
                    @endforeach
                     
                    <div class="swiper-slide d-flex h-auto justify-content-center align-items-center">
                      <a href="{{route('category')}}" class="d-flex text-decoration-none flex-column justify-content-center align-items-center">
                        <span class="btn btn-dark btn-icon mb-3"><i class="ri-arrow-right-line ri-lg lh-1"></i></span>
                        <span class="lead fw-bolder">Afficher tout</span>
                      </a>
                    </div>
                </div>
                
                  <!-- Buttons-->
                  <div class="swiper-btn swiper-disabled-hide swiper-prev swiper-btn-side btn-icon bg-dark text-white ms-3 shadow-lg mt-n5 ms-n4"><i class="ri-arrow-left-s-line ri-lg"></i></div>
                  <div class="swiper-btn swiper-disabled-hide swiper-next swiper-btn-side swiper-btn-side-right btn-icon bg-dark text-white me-n4 shadow-lg mt-n5"><i class="ri-arrow-right-s-line ri-lg"></i></div>
                
                  <!-- Add Scrollbar -->
                  <div class="swiper-scrollbar"></div>
                
                </div>
                <!-- / Swiper Latest-->            </div>
        </section>
        <!-- / Staff Picks-->

        <!-- Image Hotspot Banner-->
        <section class="my-10 position-relative">
            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white top-0 start-0 end-0">
                <svg class="align-self-start d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25"><polygon fill="currentColor" points="1283 0 0 0 0 53.25 1283 0"/></svg></div>
            <!-- /SVG Shape Divider-->
            
            <div class="w-100 h-100 bg-img-cover bg-pos-center-center hotspot-container py-5 py-md-7 py-lg-10" style="background-image: url(https://images.unsplash.com/photo-1508746829417-e6f548d8d6ed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
                <div class="hotspot d-none d-lg-block" data-options='{
                    "placement": {
                        "left": "68%",
                        "bottom": "40%"
                    },
                    "alwaysVisible": true,
                    "alwaysAnimate": true,
                    "contentTarget": "#hotspot-one",
                    "trigger": "mouseenter"
                }'>
                </div>
                <div class="hotspot d-none d-lg-block" data-options='{
                    "placement": {
                        "left": "53%",
                        "top": "40%"
                    },
                    "alwaysVisible": true,
                    "alwaysAnimate": true,
                    "contentTarget": "#hotspot-one"
                }'>
                </div>
                <div class="container py-lg-8 position-relative z-index-10 d-flex align-items-center" data-aos="fade-left">
                    <div class="py-8 d-flex justify-content-end align-items-start align-items-lg-end flex-column col-lg-4 text-lg-end">
                        <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">Performances extremes</p>
                        <h2 class="display-5 fw-bold mb-3">The North Face</h2>
                        <p class="lead d-none d-lg-block">Soyez prêt toute l'année avec notre sélection d'objets  parfaites à tout moment de l'année et tout au long de l'année. Choisissez parmi une variété de nuances de couleurs et de styles </p>
                        <a class="text-decoration-none fw-bolder" href="{{route('category')}}">Découvrir nos propositions &rarr;</a>
                    </div>
                </div>
            
                <!-- Example Hotspot HTML Content -->
                <div id="hotspot-one" class="d-none">
                    <div class="m-n2 rounded overflow-hidden">
                     
            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white bottom-0 start-0 end-0">
                <svg class="align-self-end d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25"><polygon fill="currentColor" points="0 53.25 1283 53.25 1283 0 0 53.25"/></svg></div>
            <!-- /SVG Shape Divider-->        </section>
        <!-- / Image Hotspot Banner-->



        <!-- Linked Product Carousels-->
        {{-- <section class="py-5" data-aos="fade-in">
            <div class="container">
                <div class="row g-5">
                    <div class="col-12 col-md-7" data-aos="fade-right">
                        <div class="m-0">
                            <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">Hiking Essentials
                            </p>
                            <h2 class="display-5 fw-bold mb-6">Our Latest Must-Have Products</h2>
                            <div class="px-8 position-relative">

                                <!-- Swiper-->
                                <div class="swiper-container swiper-linked-carousel-small">
                                
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination-blocks mb-4">
                                        <div class="swiper-pagination-custom"></div>
                                    </div>
                                
                                    <div class="swiper-wrapper">
                                
                                        <!-- Swiper Slide-->
                                        @foreach ($annonces1 as $key=> $annonce)
                                        <div class="swiper-slide overflow-hidden">
                                            <!-- Card-->
                                            <!-- Card Product-->
                                            <div class="card position-relative h-100 card-listing hover-trigger">
                                                <div class="card-header">
                                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                                        <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/{{$annonce->image}}" alt="Bootstrap 5 Template by Pixel Rocket">
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
                                            </div> <span class="small fw-bolder ms-2 text-muted"> {{$annonce->note_avg}} </span>
                                                    </div>
                                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                        href="./product.html">{{$annonce->titre}}</a>
                                                        <p class="fw-bolder m-0 mt-2">${{$annonce->prix}}</p>
                                                </div>
                                            </div>
                                            <!--/ Card Product-->
                                            <!--/ Card-->
                                        </div>
                                        @endforeach
                                        <!-- / Swiper Slide-->

                                
                                    </div>
                                </div>                                <!-- /Swiper-->

                                <!-- Swiper Arrows -->
                                <div
                                    class="swiper-prev-linked position-absolute top-50 start-0 mt-n8 cursor-pointer transition-all opacity-50-hover">
                                    <i class="ri-arrow-left-s-line ri-2x"></i></div>
                                <div
                                    class="swiper-next-linked position-absolute top-50 end-0 me-3 mt-n8 cursor-pointer transition-all opacity-50-hover">
                                    <i class="ri-arrow-right-s-line ri-2x"></i></div>
                                <!-- / Swiper Arrows-->

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 d-none d-md-flex" data-aos="fade-left">
                        <div class="w-100 h-100">

                            <!-- Swiper-->
                            <div class="swiper-container h-100 swiper-linked-carousel-large">
                            
                                <div class="swiper-wrapper h-100">
                            
                                    <!-- Swiper Slide-->
                                    <div class="swiper-slide">
                                        <div class="row g-3">
                                            @foreach ($annonces11 as $key=> $annonce)
                                        
                                            <div class="col-12 col-md-6">
                                                <!-- Card Product-->
                                                <div class="card position-relative h-100 card-listing hover-trigger">
                                                    <div class="card-header">
                                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/{{$annonce->image}}" alt="Bootstrap 5 Template by Pixel Rocket">
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
                                                </div> <span class="small fw-bolder ms-2 text-muted"> {{$annonce->note_avg}} </span>
                                                        </div>
                                                        <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                            href="./product.html">Pocket Tee Rusty Red</a>
                                                            <p class="fw-bolder m-0 mt-2">$1699.87</p>
                                                    </div>
                                                </div>
                                                <!--/ Card Product-->
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <!-- /Swiper Slide-->
                            
                                    <!-- Swiper Slide-->
                                    <div class="swiper-slide">
                                        <div class="row g-3">
                                            @foreach ($annonces22 as $key=> $annonce)
                                        
                                            <div class="col-12 col-md-6">
                                                <!-- Card Product-->
                                                <div class="card position-relative h-100 card-listing hover-trigger">
                                                    <div class="card-header">
                                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/{{$annonce->image}}" alt="Bootstrap 5 Template by Pixel Rocket">
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
                                                </div> <span class="small fw-bolder ms-2 text-muted"> {{$annonce->note_avg}} </span>
                                                        </div>
                                                        <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                            href="./product.html">Pocket Tee Rusty Red</a>
                                                            <p class="fw-bolder m-0 mt-2">$1699.87</p>
                                                    </div>
                                                </div>
                                                <!--/ Card Product-->
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <!-- /Swiper Slide-->
                            
                                    <!-- Swiper Slide-->
                                    <div class="swiper-slide">
                                        <div class="row g-3">
                                            @foreach ($annonces33 as $key=> $annonce)
                                        
                                            <div class="col-12 col-md-6">
                                                <!-- Card Product-->
                                                <div class="card position-relative h-100 card-listing hover-trigger">
                                                    <div class="card-header">
                                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/{{$annonce->image}}" alt="Bootstrap 5 Template by Pixel Rocket">
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
                                                </div> <span class="small fw-bolder ms-2 text-muted">{{$annonce->note_avg}} </span>
                                                        </div>
                                                        <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                            href="./product.html">Pocket Tee Rusty Red</a>
                                                            <p class="fw-bolder m-0 mt-2">$1699.87</p>
                                                    </div>
                                                </div>
                                                <!--/ Card Product-->
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <!-- /Swiper Slide-->
                            
                                </div>
                            </div>                            <!-- / Swiper-->

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- / Linked Product Carousels-->


        <!-- Sale Banner -->
        <section class="position-relative my-5 my-md-7 my-lg-9 bg-dark" data-aos="fade-in">
            <!-- SVG Shape Divider-->
            <div class="position-absolute text-white z-index-50 top-0 end-0 start-0">
                <svg class="align-self-start d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25"><polygon fill="currentColor" points="1283 0 0 0 0 53.25 1283 0"/></svg></div>
            <!-- /SVG Shape Divider-->
            
 
            
            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white bottom-0 start-0 end-0">
                <svg class="align-self-end d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25"><polygon fill="currentColor" points="0 53.25 1283 53.25 1283 0 0 53.25"/></svg></div>
            <!-- /SVG Shape Divider-->        </section>
        <!-- /Sale Banner -->

        <!-- Reviews-->
        <section>
            <div class="container" data-aos="fade-in">
                <h2 class="fs-1 fw-bold mb-3 text-center mb-5"> 
                    Avis des clients</h2>
                <div class="row g-3">
                    <div class="col-12 col-lg-4" data-aos="fade-left">
                        <div class="bg-light p-4 d-flex h-100 justify-content-start align-items-center flex-column text-center">
                            <p class="fw-bolder lead">Service incroyable !</p>
                            <p class="mb-3">Je fais des emplettes avec eux depuis quelques années maintenant. Articles très faciles à sélectionner, articles toujours conformes à la description.
                                 Jamais eu à retourner un article. Bon rapport qualité prix.</p>
                            <small class="text-muted d-block mb-2 fw-bolder">John Doe, London</small>
                            <!-- Review Stars Small-->
                            <div class="rating position-relative d-table">
                                <div class="position-absolute stars" style="width: 75%">
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
                            </div>        </div>
                    </div>
                    <div class="col-12 col-lg-4" data-aos="fade-left" data-aos-delay="150">
                        <div class="bg-light p-4 d-flex h-100 justify-content-start align-items-center flex-column text-center">
                            <p class="fw-bolder lead">Bons Prix</p>
                            <p class="mb-3">Trouvez toujours ces gars compétitifs, et avec une vaste gamme de produits, couplés à un excellent marketing,
                                 il est difficile de ne pas acheter quelque chose..</p>
                            <small class="text-muted d-block mb-2 fw-bolder">Sally Smith, Dublin</small>
                            <!-- Review Stars Small-->
                            <div class="rating position-relative d-table">
                                <div class="position-absolute stars" style="width: 75%">
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
                            </div>        </div>
                    </div>
                    <div class="col-12 col-lg-4" data-aos="fade-left" data-aos-delay="300">
                        <div class="bg-light p-4 d-flex h-100 justify-content-start align-items-center flex-column text-center">
                            <p class="fw-bolder lead">Site Web fantastique</p>
                            <p class="mb-3">Mon colis manquait un article mais le service client l'a résolu immédiatement et j'ai reçu une autre livraison
                                 assez rapidement. De plus, le produit était absolument charmant</p>
                            <small class="text-muted d-block mb-2 fw-bolder">John Patrick, London</small>
                            <!-- Review Stars Small-->
                            <div class="rating position-relative d-table">
                                <div class="position-absolute stars" style="width: 75%">
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
                            </div>        </div>
                    </div>
                </div>
                       
        </section>
        <!-- /Reviews-->

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    @include('footer')