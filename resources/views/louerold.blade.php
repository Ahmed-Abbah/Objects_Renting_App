@include('header')
<style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


         :root{
    --color-dark: #151C35;
    --color-secodary-dark: #464C70;
    --color-primary: #EE709D;
    --color-text: #8297E2;
    --color-light: #EBEBFB;
}

.container2{
    height: 70vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.board{
    max-width: 307px;
    width: 90%;
    background-color: var(--color-dark);
    text-align: center;
    border-radius: 8px;
    padding: 4em 0;
}

.text-light{
    color: var(--color-light);
}

.swiper {
    width: 200px;
    height: auto;
  }

.swiper .swiper-slide .flex2{
    margin: 3em 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.swiper .swiper-slide .comments2{
    background-color: var(--color-light);
    padding: 1.5em 2em;
    width: 50%;
    border-radius: 5px;
    font-size: .9em;
    position: relative;
}

.swiper .swiper-slide .comments2::after{
    content: '';
    position: absolute;
    bottom: -19px;
    left: 45%;
    width: 0;
    height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-top: 20px solid var(--color-light);
    z-index: -99;
}


.swiper .profile2{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 1em;
}

.swiper .profile2 img{
    width: 30%;
    border-radius: 50%;
    border: 5px solid var(--color-primary);
    margin: 10px 0;
}

.swiper .profile2 > a{
    text-decoration: none;
    color: var(--color-light);
}

.swiper .profile2 > span{
    color: var(--color-text);
    font-size: .8em;
}

.swiper .swiper-button-prev, .swiper-button-next{
    color: var(--color-text);
    display: none;
} 

@media (min-width: 320px) {
    .board{
        width: auto;
    }

    .swiper {
        width: 320px;
      }

      .board > h1, p{
          padding: 0 2em;
      }
}

@media (min-width: 768px) {
    .board{
        width: 100%;
    }

    .swiper {
        width: 600px;
      }

    .swiper .swiper-button-prev, .swiper-button-next{
        display: initial;
    }

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

</style>
<body class="">
    @include('navbar3')
    <!-- Main Section-->
    <section class="mt-5 ">

        <!-- Page Content Goes Here -->
        <!-- Product Top-->
        <section class="container">
            {{-- <!-- Breadcrumbs-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Activities</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Clothing</li>
                </ol>
            </nav>            <!-- /Breadcrumbs--> --}}


            <form method="post" action="{{ route('louer') }}" data-js-validate="true" data-js-highlight-state-msg="true" data-js-show-valid-msg="true">
            @csrf


            {{-- <a href="{{ route('louer') }}">
                <h1 class="mb-2 fs-2 fw-bold">Location {{$annonce->objet->nom_objet}}</h1>
              </a> --}}
            <a href="#" id="rev">
                <h1 class="mb-2 fs-2 fw-bold">Location {{$annonce->objet->nom_objet}}</h1>
            </a>  <p>  {{$annonce->id}}<p>
             

                {{-- <div class="modal fade" id="myModal2" role="dialog" style="2000px">
                    <div class="modal-dialog"style="2000px">
                        <!-- Modal content-->
                        <div class="modal-content" style="2000px">
                            <div class="modal-header">
                                
                                <h4 class="modal-title"><h3>Reviews sur le partenaire</h3></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="background: black">
             
                                <div class="container2">
                                    <div class="board">
                                        
                                      
                            
                                        <!-- Slider main container -->
                                        <div class="swiper" style="margin-left:-137px;margin-top:-60px;width: 190%">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper" style="width: 200px">
                                            <!-- Slides -->
                                                <div class="swiper-slide" style="background-color: yellow">
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Non, placeat quisquam? Animi sunt, dignissimos est sit reiciendis iste ipsa error?
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                            <a href="#">John V. Bellanmy</a>
                                                            <span>Founder & CEO</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                            Non, placeat quisquam? Animi sunt, dignissimos est sit reiciendis iste ipsa error?
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                            <a href="#">John V. Bellanmy</a>
                                                            <span>Founder & CEO</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                            Animi sunt, ipsa error? Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Non, placeat quisquam? dignissimos est sit reiciendis iste 
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="https://images.unsplash.com/photo-1503185912284-5271ff81b9a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                            <a href="#">John V. Bellanmy</a>
                                                            <span>Founder & CEO</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- If we need pagination -->
                                            <div class="swiper-pagination"></div>
                                        
                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                    
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" style="2000px">
                        <div class="modal-content"  style=" width: 600px;margin-left:270px;background-color:#151C35">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:#fff;margin-left:120px;font-size:25px">Review sur {{$annonce->objet->nom_objet}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container2">
                                    <div class="board">
                                        @php
                                        $AnnonceID = $annonce->id;
                                            $partenaire= DB ::table('users')
                                               ->join('annonces', 'users.id', '=', 'annonces.id_partenaire')
                                               ->groupBy('users.id','users.name','users.prenom','users.profile')
                                               ->select('users.id','users.name','users.prenom','users.profile')
                                               ->where('annonces.id',$AnnonceID)
                                               ->first();
                                             $id_user= $partenaire->id;
                                            
                   
                                               $reviews=  DB::table('reviews')
                                               ->join('users', 'reviews.id_partenaire', '=', 'users.id')
                         
                                               ->where('reviews.id_partenaire', '=', $id_user)
                                               
                                              
                                               ->groupBy('reviews.id_partenaire','reviews.id_client','reviews.note_client_partenaire','reviews.commantaire_client_partenaire'
                                               ,'users.id','users.name','users.prenom','users.profile')
                                                   
                                                   ->select('reviews.id_partenaire','reviews.id_client','reviews.note_client_partenaire','reviews.commantaire_client_partenaire'
                                                   ,'users.id','users.name','users.prenom','users.profile')
                                              
                                               ->get();

                                               
                                               $reviews2=  DB::table('reviews')
                                               ->join('users', 'reviews.id_client', '=', 'users.id')
                         
                                               ->where('reviews.id_client', '=', $id_user)
                                               
                                              
                                               ->groupBy('reviews.id_partenaire','reviews.id_client','reviews.note_partenaire_client','reviews.commantaire_partenaire_client'
                                               ,'users.id','users.name','users.prenom','users.profile')
                                                   
                                                   ->select('reviews.id_partenaire','reviews.id_client','reviews.note_partenaire_client','reviews.commantaire_partenaire_client'
                                                   ,'users.id','users.name','users.prenom','users.profile')
                                              
                                               ->get();
                                             
                                             
                                              
                                   @endphp
                                    
                            
                                        <!-- Slider main container -->
                                        <div class="swiper" style="margin-left:-137px;margin-top:-60px;width: 190%">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper" style="width: 200px">
                                            <!-- Slides -->
                                               
                                            @foreach ($reviews as $key=> $review)
                                                <div class="swiper-slide" >
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                        
                                                            {{$review->commantaire_client_partenaire}}
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="{{asset($review->profile)}}" alt="">
                                                            <a href="#">  {{$review->name}}  {{$review->prenom}}</a>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ($reviews2 as $key=> $review)
                                                <div class="swiper-slide" >
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                        
                                                            {{$review->commantaire_partenaire_client}}
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="{{asset($review->profile)}}" alt="">
                                                            <a href="#">  {{$review->name}}  {{$review->prenom}}</a>
                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                                {{-- <div class="swiper-slide">
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                            Non, placeat quisquam? Animi sunt, dignissimos est sit reiciendis iste ipsa error?
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                            <a href="#">John V. Bellanmy</a>
                                                            <span>Founder & CEO</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="flex2">
                                                        <div class="comments2">
                                                            Animi sunt, ipsa error? Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Non, placeat quisquam? dignissimos est sit reiciendis iste 
                                                        </div>
                                                        <div class="profile2">
                                                            <img src="https://images.unsplash.com/photo-1503185912284-5271ff81b9a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                            <a href="#">John V. Bellanmy</a>
                                                            <span>Founder & CEO</span>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                            </div>
                                            <!-- If we need pagination -->
                                            <div class="swiper-pagination"></div>
                                        
                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                    
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <p class="small fw-bolder text-uppercase tracking-wider text-muted mb-0 lh-1">Annonce Détails</p>
                            <div class="d-flex justify-content-start align-items-center">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: {{ (($annonce->note)*100)/5 }}%">
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
                                </div>            <small class="text-muted d-inline-block ms-2 fs-bolder">({{ $annonce->number_comment }})</small>
                            </div>
                        </div>
                        <a><h1 class="mb-2 fs-2 fw-bold">{{$annonce->titre}}</h1></a>
                        <br>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-succes me-2">Prix de Location/jour :</p>
                            <p class="lead fw-bolder m-0 fs-4 lh-1 text-success">{{$annonce->prix}} MAD</p>
                        </div>
                        <br>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-succes me-2">Catégorie :</p>
                            <p class="lead fw-bolder m-0 fs-4 lh-1 text-success">{{$annonce->categorie->nom_categorie}}</p>
                        </div>
                        <br>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-succes me-2">Ce produit est disponible de :</p>
                            <p class="lead fw-bolder m-0 fs-4 lh-1 text-success">{{$annonce->date_debut}}</p>
                        </div>
                        <br>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-succes me-2">à :</p>
                            <p class="lead fw-bolder m-0 fs-4 lh-1 text-success">{{$annonce->date_fin}} </p>
                        </div>
                        <br>

                        @foreach($annonce->jour_semaine as $key => $jr)
                            @if ($jr->jour_semaine !== null)
                                @php
                                    $jours = explode(',', $jr->jour_semaine);
                                @endphp
                                @foreach ($jours as $jour)
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" value="{{$jour}}" class="form-check-input" name="jours[]" id="filter-brand-0">
                                        <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brand-0">{{$jour}} <span class="text-muted"></span>
                                        </label>
                                    </div>
                                    <br>
                                @endforeach
                            @elseif ($jr->jour_semaine == null)
                                <div class="form-group form-check mb-0" style="display: none;">
                                    <input type="checkbox" value="{{$jr->jour_semaine}}" class="form-check-input" name="jours[]" id="filter-brand-0" checked>
                                </div>
                            @endif
                        @endforeach


                        
                        {{-- @foreach($annonce->jour_semaine as $key => $jr)
                        @if ($jr->jour_semaine !== null)
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" value="{{$jr->jour_semaine}}" class="form-check-input" name="jours[]" id="filter-brand-0">
                                <label  class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                    for="filter-brand-0" >{{$jr->jour_semaine}}  <span
                                        class="text-muted"></span>
                                </label>
                            </div>
                            <br>
                        @elseif ($jr->jour_semaine == null)
                            <div class="form-group form-check mb-0" style="display: none;">
                                <input type="checkbox" value="{{$jr->jour_semaine}}" class="form-check-input" name="jours[]" id="filter-brand-0" checked>
                            </div>
                        @endif
                        
                        @endforeach --}}
                        {{-- @foreach($annonce->jour_semaine as $key => $jr)
                        
                        <div class="form-group form-check mb-0">
                                                        <input type="checkbox" value="{{$jr->jour_semaine}}" class="form-check-input" name="jours[]" id="filter-brand-0">
                                                        <label  class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                                            for="filter-brand-0" >{{$jr->jour_semaine}}  <span
                                                                class="text-muted"></span>
                                                        </label>
                                </div>
                        <br>
                        @endforeach --}}

                        
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-succes me-2">Durée minimale de location :</p>
                            <p class="lead fw-bolder m-0 fs-4 lh-1 text-success">{{$annonce->min_jour}} jours</p>
                        </div>
                       <br>
                        <p class="lead fw-bolder m-0 fs-6 lh-1  me-2">Durée de location :</p>
                        <br>
                        <div id="messageDiv"></div>
<div class="d-flex justify-content-start align-items-center">
    <p class="lead fw-bolder m-0 fs-6 lh-1 me-2">de :</p>
    <input type="date" name="dateDebut" class="lead fw-bolder m-0 fs-4 lh-1" min="{{$annonce->date_debut}}" max="{{$annonce->date_fin}}">
    <p class="lead fw-bolder m-0 fs-6 lh-1 me-2">à :</p>
    <input type="date" name="dateFin" class="lead fw-bolder m-0 fs-4 lh-1" min="{{$annonce->date_debut}}" max="{{$annonce->date_fin}}">
</div>










                        
                        <br>
                        {{-- <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-succes me-2">Choisir durée de location :</p>
                            <p class="lead fw-bolder m-0 fs-4 lh-1 text-success">{{$annonce->max_jour}}</p>
                        </div> --}}
                        
                        <br>
                        <!-- /Product Name, Review, Brand, Price-->
                    
                        {{-- <!-- Product Views-->
                        <div class="d-flex justify-content-start mt-3">
                            <div class="alert bg-light rounded py-1 px-2 d-table m-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <i class="ri-fire-fill lh-1 text-orange"></i>
                                    <div class="ms-2">
                                        <small class="opacity-75 fw-bolder lh-1">167 views today</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Views --> --}}
                    
                    
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
                    
                        <!-- Add To Cart-->
                        <div class="d-flex justify-content-between mt-3">
                            {{-- <button class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white">Louer</button> --}}
                            {{-- <button class="btn btn-orange btn-orange-chunky"><i class="ri-heart-line"></i></button> --}}
                            {{-- <form method="post" action="{{ route('louer') }}" data-js-validate="true" data-js-highlight-state-msg="true" data-js-show-valid-msg="true"> --}}
                                <button class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white" name="confirm" id="payBtn">Louer</button>
                            {{-- </form>   --}}
                        </div>
                        <script>
    const dateDebut = document.getElementsByName('dateDebut')[0];
    const dateFin = document.getElementsByName('dateFin')[0];
    const payBtn = document.getElementById('payBtn');
    const checkboxes = document.getElementsByName('jours[]');

    payBtn.disabled=true;
    dateDebut.addEventListener('change', updateMinDate);
    dateFin.addEventListener('change', checkDateDuration);
    
    for (const checkbox of checkboxes) {
        checkbox.addEventListener('change', checkDateDuration);
    }

    function updateMinDate() {
        // Set the minimum date allowed in the second date picker to be the date selected in the first date picker
        dateFin.min = dateDebut.value;

        // If the current value of the second date picker is earlier than the minimum date allowed, reset it to the minimum date
        if (dateFin.value < dateFin.min) {
            dateFin.value = dateFin.min;
        }

        // Check the duration to show any validation messages
        checkDateDuration();
    }

    function checkDateDuration() {
        const checkboxes = document.getElementsByName('jours[]');
        const numChecked = Array.from(checkboxes).filter(cb => cb.checked).length;

        if (numChecked === 0) {
            const messageDiv = document.getElementById('messageDiv');
            messageDiv.innerHTML = '<p class="alert alert-danger">Veuillez sélectionner au moins un jour</p>';
            payBtn.disabled = true;
        } else if (dateDebut.value && dateFin.value) {
            const startDate = new Date(dateDebut.value);
            const endDate = new Date(dateFin.value);
            const timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
            const diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            if (diffDays < {{$annonce->min_jour}}) {
                const messageDiv = document.getElementById('messageDiv');
                messageDiv.innerHTML = '<p class="alert alert-danger">La durée doit être supérieure à {{$annonce->min_jour}} jours</p>';
                payBtn.disabled=true;
            } else {
                const messageDiv = document.getElementById('messageDiv');
                messageDiv.innerHTML = '<p class="alert alert-success">La durée que vous avez choisie est valide</p>';
                payBtn.disabled=false;
            }
        }
    }
</script>

                        <!-- /Add To Cart-->
                    
                        <!-- Socials-->
                        <div class="my-4">
                                </div>
                        <!-- Socials-->
                    
                        <!-- Special Offers-->
                        <div class="bg-light rounded py-2 px-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex border-0 px-0 bg-transparent">
                                    <i class="ri-truck-line"></i>
                                    <span class="fs-6 ms-3">Nb : Veuillez vérifier la disponibilité de l'annonce avant de louer .</span>
                                </li>
                            </ul>
                        </div>
                        <!-- /Special Offers-->
                    
                    </div>                </div>
                <!-- / Product Info Section-->
            </div>
        </section>
        <!-- / Product Top-->

        {{-- anas added --}}

        <div class="modal fade" id="myModal" role="dialog">
            
            <input type="hidden" name="annonce_id" value="{{$annonce->id}}" >
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title"><h3>Convention de location de matériel</h3></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
            
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
                <p>Le locataire s'engage à payer le montant de ({{$annonce->prix}} MAD) au propriétaire.</p>
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
                        <button type="submit" class="btn btn-primary" id="continuebtn" disabled>Continue</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                            
                    </div>
        
                </div>
            </div>

        </form>  
        </div>

        <section>

            <!-- Product Tabs-->
            <div class="mt-7 pt-5 border-top">
                <div class="container">
                    <!-- Tab Nav-->
                    <ul class="nav justify-content-center nav-tabs nav-tabs-border mb-4" id="myTab" role="tablist">
                      <li class="nav-item w-100 mb-2 mb-sm-0 w-sm-auto mx-sm-3" role="presentation">
                        <a class="nav-link fs-5 fw-bolder nav-link-underline mx-sm-3 px-0 active" id="details-tab" data-bs-toggle="tab" href="#details"
                          role="tab" aria-controls="details" aria-selected="true">Description</a>
                      </li>
                      <li class="nav-item w-100 mb-2 mb-sm-0 w-sm-auto mx-sm-3" role="presentation">
                        <a class="nav-link fs-5 fw-bolder nav-link-underline mx-sm-3 px-0" id="reviews-tab" data-bs-toggle="tab" href="#reviews"
                          role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                      </li>
                    </ul>
                    <!-- / Tab Nav-->
                    
                    <!-- Tab Content-->
                    <div class="tab-content" id="myTabContent">
                    
                      <!-- Tab Details Content-->
                      <div class="tab-pane fade show active py-5" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <div class="col-12 col-lg-10 mx-auto">
                          <div class="row g-5">
                            <div class="col-12 col-md-6">
                              <p>{{$annonce->description}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Tab Details Content-->
                    
                      {{-- <!-- Review Tab Content-->
                      <div class="tab-pane fade py-5" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <!-- Customer Reviews-->
                        <section class="reviews">
                            <div class="col-lg-12 text-center pb-5">
                        
                                <h2 class="fs-1 fw-bold d-flex align-items-center justify-content-center">4.88 <small
                                        class="text-muted fw-bolder ms-3 fw-bolder fs-6">(1288 reviews)</small></h2>
                                <div class="d-flex justify-content-center">
                                    <!-- Review Stars Medium-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 80%">
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                        </div>
                                    </div>        </div>
                        
                        
                                <div class="bg-light rounded py-3 px-4 mt-3 col-12 col-md-6 col-lg-5 mx-auto">
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                            <span class="fw-bolder">Fit</span>
                                            <!-- Review Stars Small-->
                                            <div class="rating position-relative d-table">
                                                <div class="position-absolute stars" style="width: 25%">
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
                                            </div>                </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                            <span class="fw-bolder">Value for money</span>
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
                                            </div>                </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                            <span class="fw-bolder">Build quality</span>
                                            <!-- Review Stars Small-->
                                            <div class="rating position-relative d-table">
                                                <div class="position-absolute stars" style="width: 65%">
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
                                            </div>                </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                            <span class="fw-bolder">Style</span>
                                            <!-- Review Stars Small-->
                                            <div class="rating position-relative d-table">
                                                <div class="position-absolute stars" style="width: 90%">
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
                                            </div>                </li>
                                    </ul>
                                </div>
                        
                                <!-- Review Modal-->
                                <button type="button" class="btn btn-dark mt-4 hover-lift-sm hover-boxshadow disable-child-pointer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasReview" aria-controls="offcanvasReview">
                                    Write A Review <i class="ri-discuss-line align-bottom ms-1"></i>
                                </button>
                                <!-- / Review Modal Button-->
                        
                            </div>
                        
                            <!-- Single Review-->
                            <article class="py-5 border-bottom border-top">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <small class="text-muted fw-bolder">08/12/2021</small>
                                        <p class="fw-bolder">Ben Sandhu, Ireland</p>
                                        <span class="bg-success-faded fs-xs fw-bolder text-uppercase p-2">Verified Customer</span>
                                    </div>
                                    <div class="col-12 col-md-8 mt-4 mt-md-0">
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
                                        </div>                <p class="fw-bolder mt-4">Happy with this considering the price</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi, architecto placeat nam officia
                                            sapiente ipsam at dolorum quisquam, ipsa earum qui laboriosam. Pariatur recusandae nihil, architecto
                                            reprehenderit perferendis obcaecati. Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Distinctio sint nesciunt velit quae, quisquam ullam veritatis itaque repudiandae. Inventore quae
                                            doloribus modi nihil illum accusamus voluptas suscipit neque perferendis totam!</p>
                        
                                        <small class="fw-bolder bg-light d-table rounded py-1 px-2">Yes, I would recommend the product</small>
                                        <div class="d-block d-md-flex mt-3 justify-content-between align-items-center">
                                            <a href="#"
                                                class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start"
                                                title=""><small>Was this review helpful?
                                                    <i class="ri-thumb-up-line ms-4"></i> 112 <i class="ri-thumb-down-line ms-2"></i>
                                                    23</small></a>
                                            <a href="#"
                                                class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start mt-3 mt-md-0"
                                                title=""><small>Flag as
                                                    inappropriate <i class="ri-flag-2-line ms-2"></i></small></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- /Single Review-->
                        
                            <!-- Single Review-->
                            <article class="py-5 border-bottom ">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <small class="text-muted fw-bolder">08/12/2021</small>
                                        <p class="fw-bolder">Patricia Smith, London</p>
                                        <span class="bg-success-faded fs-xs fw-bolder text-uppercase p-2">Verified Customer</span>
                                    </div>
                                    <div class="col-12 col-md-8 mt-4 mt-md-0">
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
                                        </div>                <p class="fw-bolder mt-4">Very happy with my purchase so far...</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi, architecto placeat nam officia
                                            sapiente ipsam at dolorum quisquam, ipsa earum qui laboriosam. Pariatur recusandae nihil, architecto
                                            reprehenderit perferendis obcaecati. Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Distinctio sint nesciunt velit quae, quisquam ullam veritatis itaque repudiandae. Inventore quae
                                            doloribus modi nihil illum accusamus voluptas suscipit neque perferendis totam!</p>
                        
                                        <small class="fw-bolder bg-light d-table rounded py-1 px-2">Yes, I would recommend the product</small>
                                        <div class="d-block d-md-flex mt-3 justify-content-between align-items-center">
                                            <a href="#"
                                                class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start"
                                                title=""><small>Was this review helpful?
                                                    <i class="ri-thumb-up-line ms-4"></i> 112 <i class="ri-thumb-down-line ms-2"></i>
                                                    23</small></a>
                                            <a href="#"
                                                class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start mt-3 mt-md-0"
                                                title=""><small>Flag as
                                                    inappropriate <i class="ri-flag-2-line ms-2"></i></small></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- /Single Review-->
                        
                            <!-- Single Review-->
                            <article class="py-5 border-bottom ">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <small class="text-muted fw-bolder">08/12/2021</small>
                                        <p class="fw-bolder">Jack Jones, Scotland</p>
                                        <span class="bg-success-faded fs-xs fw-bolder text-uppercase p-2">Verified Customer</span>
                                    </div>
                                    <div class="col-12 col-md-8 mt-4 mt-md-0">
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
                                        </div>                <p class="fw-bolder mt-4">I wish it was a little cheaper - otherwise love this!</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi, architecto placeat nam officia
                                            sapiente ipsam at dolorum quisquam, ipsa earum qui laboriosam. Pariatur recusandae nihil, architecto
                                            reprehenderit perferendis obcaecati. Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Distinctio sint nesciunt velit quae, quisquam ullam veritatis itaque repudiandae. Inventore quae
                                            doloribus modi nihil illum accusamus voluptas suscipit neque perferendis totam!</p>
                        
                                        <small class="fw-bolder bg-light d-table rounded py-1 px-2">Yes, I would recommend the product</small>
                                        <div class="d-block d-md-flex mt-3 justify-content-between align-items-center">
                                            <a href="#"
                                                class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start"
                                                title=""><small>Was this review helpful?
                                                    <i class="ri-thumb-up-line ms-4"></i> 112 <i class="ri-thumb-down-line ms-2"></i>
                                                    23</small></a>
                                            <a href="#"
                                                class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start mt-3 mt-md-0"
                                                title=""><small>Flag as
                                                    inappropriate <i class="ri-flag-2-line ms-2"></i></small></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- /Single Review-->
                        
                        
                            <a href="#" class="btn btn-dark d-table mx-auto mt-6 mb-3 hover-lift-sm hover-boxshadow" title="">Load More
                                Reviews</a>
                            <p class="text-muted text-center fw-bolder">Showing 3 of 1234</p>
                        
                        </section>  </div>
                      <!-- / Review Tab Content--> --}}

                      <!-- Review Tab Content-->
                      <div class="tab-pane fade py-5" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <!-- Customer Reviews-->
                        <section class="reviews">
                            <div class="col-lg-12 text-center pb-5">
                        
                                <h2 class="fs-1 fw-bold d-flex align-items-center justify-content-center">{{ $annonce->note }} <small
                                        class="text-muted fw-bolder ms-3 fw-bolder fs-6">({{ $annonce->number_comment }} reviews)</small></h2>
                                <div class="d-flex justify-content-center">
                                    <!-- Review Stars Medium-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: {{ (($annonce->note)*100)/5 }}%">
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                        </div>
                                    </div>        </div>
                        
                        
                        
                            
                        
                            </div>
                        
                            <!-- Single Review-->
                            <!-- Single Review-->
                            <article class="py-5 border-bottom border-top">
                                @foreach($users as $user)
                                        <div class="row linge">
                                            <div class="col-12 col-md-4 a">
                                                <img src="{{ asset($user->profile) }}" class="profile" alt="">
                                                <p class="name">{{ $user->name }} {{ $user->prenom }}</p>
                                            </div>
                                            <div class="col-12 col-md-8 mt-4 mt-md-0">
                                                <div class="rating position-relative d-table">
                                                    <div class="position-absolute stars" style="width: {{ (($user->note_client_objet)*100)/5 }}%">
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
                                                <p style="margin-top: 10px;">{{ $user->commantaire_client_objet }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                @endforeach
                            </article>
                            
                            <!-- /Single Review-->
                        <style>
                            .linge {
                                margin-bottom: 20px
                            }
                            .a{
                                display: flex;
                            }
                            .name{
                                margin-left: 10px;
                                margin-top: 10px;
                                font-size: 17px;
                                font-weight: bold;
                            }
                            .profile{
                                width: 50px;
                                height: 50px;
                                border-radius: 50%;
                            }
                        </style>
                        
                        
                        </section>  </div>
                      <!-- / Review Tab Content-->
                    

                      <!-- Delivery Tab Content-->
                      <div class="tab-pane fade py-5" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                        <div class="col-12 col-md-10 col-lg-8 mx-auto">
                          <p>We are now offering contact-free delivery so that you can still receive your parcels safely without requiring a
                            signature. Please see below for the available delivery methods, costs and timescales.</p>
                          <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-4 bg-transparent">
                              <div>
                                <span class="fw-bolder d-block">Standard Delivery</span>
                                <span class="text-muted">Delivery within 5 days of placing your order.</span>
                              </div>
                              <p class="m-0 lh-1 fw-bolder">$12.99</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-4 bg-transparent">
                              <div>
                                <span class="fw-bolder d-block">Priority Delivery</span>
                                <span class="text-muted">Delivery within 2 days of placing your order.</span>
                              </div>
                              <p class="m-0 lh-1 fw-bolder">$17.99</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-4 bg-transparent">
                              <div>
                                <span class="fw-bolder d-block">Next Day Delivery</span>
                                <span class="text-muted">Delivery within 24 hours of placing your order.</span>
                              </div>
                              <p class="m-0 lh-1 fw-bolder">$33.99</p>
                            </li>
                          </ul>
                          <div class="bg-light rounded p-3">
                            <p class="fs-6">Form more information, please see our delivery FAQs <a href="#">here</a></p>
                            <p class="m-0 fs-6">If you do not find the answer to your query, please contact our customer support team on
                              <b>0800 123 456</b> or email us at <b>support@domain.com</b>. We aim to respond within 48 hours to queries.
                            </p>
                          </div>
                        </div>
                      </div>
                      <!-- / Delivery Tab Content-->
                    
                      <!-- Returns Tab Content-->
                      <div class="tab-pane fade py-5" id="returns" role="tabpanel" aria-labelledby="returns-tab">
                        <div class="col-12 col-md-10 col-lg-8 mx-auto">
                          <p>We believe you will completely happy with your item, however if you aren't, there's no need to worry. We've
                            listed below the ways you can return your item to us.</p>
                          <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item px-0 py-4 bg-transparent">
                              <p class="fw-bolder">Return via post</p>
                              <p class="fs-6">To return your items for free through the postal system, please complete the returns form that
                                comes with your order. You'll find a label at the bottom of the form. Simply peel the label and head to your
                                nearest post office.</p>
                            </li>
                            <li class="list-group-item px-0 py-4 bg-transparent">
                              <p class="fw-bolder">Return in person</p>
                              <p class="fs-6">To return your items for free in person, simply stop into any one of our locations and speak
                                to a member of our in-store team.</p>
                            </li>
                          </ul>
                          <div class="bg-light rounded p-3">
                            <p class="fs-6">Form more information, please see our returns FAQs <a href="#">here</a></p>
                            <p class="m-0 fs-6">If you do not find the answer to your query, please contact our customer support team on
                              <b>0800 123 456</b> or email us at <b>support@domain.com</b>. We aim to respond within 48 hours to queries.
                            </p>
                          </div>
                        </div>
                      </div>
                      <!-- / Returns Tab Content-->
                    
                    </div>
                    <!-- / Tab Content-->                </div>
            </div>
            <!-- / Product Tabs-->

        </section>

        {{-- <!-- Related Products-->
        <div class="container my-8">
            <h3 class="fs-4 fw-bold mb-5 text-center">You May Also Like</h3>
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
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-1.jpg" alt="">
                                </picture>
                                    <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                                        <img class="w-100 img-fluid" title="" src="./assets/images/products/product-1b.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 90%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.7 (456)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Full Zip Hoodie</a>
                                    <p class="fw-bolder m-0 mt-2">$1129.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                                <span class="badge card-badge bg-secondary">-25%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-2.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 60%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.4 (1289)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Mens Sherpa Hoodie</a>
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <p class="mb-0 me-2 text-danger fw-bolder">$<span>599.55</span></p>
                                        <p class="mb-0 text-muted fw-bolder"><s>$<span>150.00</span></s></p>
                                    </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                                <span class="badge card-badge bg-secondary">-65%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-3.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 20%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.7 (754)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Womens Essentials Hoodie</a>
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <p class="mb-0 me-2 text-danger fw-bolder">$<span>779.55</span></p>
                                        <p class="mb-0 text-muted fw-bolder"><s>$<span>1100.00</span></s></p>
                                    </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-4.jpg" alt="">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.4 (1289)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Elevated Lined Hoodie</a>
                                    <p class="fw-bolder m-0 mt-2">$1829.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-5.jpg" alt="">
                                </picture>
                                    <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                                        <img class="w-100 img-fluid" title="" src="./assets/images/products/product-5b.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 84%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.8 (189)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Mens Slab Hoodie</a>
                                    <p class="fw-bolder m-0 mt-2">$29.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-6.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 60%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.5 (1567)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Blocked Striped Hoodie</a>
                                    <p class="fw-bolder m-0 mt-2">$1329.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                                <span class="badge card-badge bg-secondary">-13%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-7.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 60%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.4 (1289)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Womens Classic Hoodie</a>
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <p class="mb-0 me-2 text-danger fw-bolder">$<span>599.55</span></p>
                                        <p class="mb-0 text-muted fw-bolder"><s>$<span>150.00</span></s></p>
                                    </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                      <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                                <span class="badge card-badge bg-secondary">-33%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-8.jpg" alt="">
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
                            <div class="position-absolute stars" style="width: 20%">
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
                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.7 (754)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Mens Sherpa Hoodie</a>
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <p class="mb-0 me-2 text-danger fw-bolder">$<span>779.55</span></p>
                                        <p class="mb-0 text-muted fw-bolder"><s>$<span>1100.00</span></s></p>
                                    </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                      </div>
                    <div class="swiper-slide d-flex h-auto justify-content-center align-items-center">
                      <a href="./category.html" class="d-flex text-decoration-none flex-column justify-content-center align-items-center">
                        <span class="btn btn-dark btn-icon mb-3"><i class="ri-arrow-right-line ri-lg lh-1"></i></span>
                        <span class="lead fw-bolder">See All</span>
                      </a>
                    </div>
                  </div>
                
                  <!-- Buttons-->
                  <div class="swiper-btn swiper-disabled-hide swiper-prev swiper-btn-side btn-icon bg-dark text-white ms-3 shadow-lg mt-n5 ms-n4"><i class="ri-arrow-left-s-line ri-lg"></i></div>
                  <div class="swiper-btn swiper-disabled-hide swiper-next swiper-btn-side swiper-btn-side-right btn-icon bg-dark text-white me-n4 shadow-lg mt-n5"><i class="ri-arrow-right-s-line ri-lg"></i></div>
                
                  <!-- Add Scrollbar -->
                  <div class="swiper-scrollbar"></div>
                
                </div>
                <!-- / Swiper Latest-->        
        </div>
        <!--/ Related Products--> --}}


        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

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
    <script src="./assets/js/vendor.bundle.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

    <script>
        // initialize swiper js

const swiper = new Swiper('.swiper', {
    loop: true,

     // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


})
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
        $('document').ready(function(){
            
                $('#rev').on('click',function(e){
                    e.preventDefault();
                    $('#myModal2').modal('toggle');
            
                });
            
                $('#continuebtn').on('click',function(){
            
                    $('form').submit();
                });
            });
    </script>
      <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        
        
        // Close modal when Close button is clicked
        $(".btn-secondary").on("click", function() {
          // Find the parent modal element and hide it
          $(this).closest(".modal").modal("hide");
        });
        
        // Close modal when close icon is clicked
        $(".modal-header .close").on("click", function() {
          $('#myModal2').modal('hide');
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
      $('#myModal2').modal('hide');
    });
    
    
    
    </script>
</body>

</html>