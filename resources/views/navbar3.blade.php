<body class="">

<!-- Navbar -->
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg navbar-light bg-white border-bottom mx-0 p-0 flex-column  ">
        <div class="w-100 pb-lg-0 pt-lg-0 pt-4 pb-3">
            <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
    
                <!-- Logo-->
                <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0" href="{{route('category')}}">
                    <!-- Start of Logo-->
                    <div class="d-flex align-items-center">
                        <div class="f-w-6 d-flex align-items-center me-2 lh-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 194 194"><path fill="currentColor" class="svg-logo-white" d="M47.45,60l1.36,27.58,53.41-51.66,50.87,50,3.84-26L194,100.65V31.94A31.94,31.94,0,0,0,162.06,0H31.94A31.94,31.94,0,0,0,0,31.94v82.57Z"/><path fill="currentColor" class="svg-logo-dark" d="M178.8,113.19l1,34.41L116.3,85.92l-14.12,15.9L88.07,85.92,24.58,147.53l.93-34.41L0,134.86v27.2A31.94,31.94,0,0,0,31.94,194H162.06A31.94,31.94,0,0,0,194,162.06V125.83Z"/></svg>
                        </div> <span class="fs-5">Shareit </span>
                    </div>
                    <!-- / Logo-->
                    
                </a>
                <!-- / Logo-->
    
                <!-- Main Navigation-->
                <div class="ms-5 flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1" id="navbarNavDropdown">
    
                    <!-- Mobile Nav Toggler-->
                    <button
                        class="btn btn-link px-2 text-decoration-none navbar-toggler border-0 position-absolute top-0 end-0 mt-3 me-2"
                        data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ri-close-circle-line ri-2x"></i>
                    </button>
                    <!-- / Mobile Nav Toggler-->
                    

                    <ul class="navbar-nav py-lg-2 mx-auto">
                        <li class="nav-item me-lg-4">
                            <a class="nav-link fw-bolder py-lg-4" href="{{route('category')}}">
                                {{__('Annonces')}}
                            </a>
                        </li>
                        @auth
                       
                        <li class="nav-item me-lg-4">
                            <a class="nav-link fw-bolder py-lg-4" href="{{route('traiter')}}">
                                {{__('Réservation')}}
                            </a>
                        </li>
                        <li class="nav-item dropdown me-lg-4">
                            <a class="nav-link fw-bolder dropdown-toggle py-lg-4" href="#" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Objet
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('ajouterObjet')}}">Ajouter objet</a></li>
                                <li><a class="dropdown-item" href="{{route('liste_objet')}}"> {{__('Mes objets')}}</a></li>
                                
                              </ul>
                        </li>

                     
                        <li class="nav-item me-lg-4">
                            <a class="nav-link fw-bolder py-lg-4" href="{{route('liste_reservation_partenaire')}}">
                                {{__('Review comme partenaire')}}
                            </a>
                        </li>
                        <li class="nav-item me-lg-4">
                            <a class="nav-link fw-bolder py-lg-4" href="{{route('liste_reservation_client')}}">
                                {{__('Review comme client')}}
                            </a>
                        </li>
                        @else
                        <li class="nav-item me-lg-4">
                            <a class="nav-link fw-bolder py-lg-4" href="{{route('register')}}">
                               Inscription
                            </a>
                        </li>
                        <li class="nav-item me-lg-4">
                            <a class="nav-link fw-bolder py-lg-4" href="{{route('login')}}">
                                Connexion
                            </a>
                        </li>
                        @endauth
                        <li class="nav-item dropdown me-lg-4">
                            <a class="nav-link fw-bolder dropdown-toggle py-lg-4" href="#" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Commencer
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('ajouterAnnonce')}}">Publier une annonce</a></li>
                                <li><a class="dropdown-item" href="{{route('mesAnnonces')}}"> {{__('Mes Annonces')}}</a></li>
                                
                              </ul>
                        </li>
                    </ul>
                </div>
                <!-- / Main Navigation-->
    
                <!-- Navbar Icons-->
                <ul class="list-unstyled mb-0 d-flex align-items-center">
    
                    <!-- Navbar Toggle Icon-->
                    <li class="d-inline-block d-lg-none">
                        <button
                            class="btn btn-link px-2 text-decoration-none navbar-toggler border-0 d-flex align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-line ri-lg align-middle"></i>
                        </button>
                    </li>
                    <!-- /Navbar Toggle Icon-->
    
                    <!-- Navbar Search-->
                    {{-- <li class="ms-1 d-inline-block">
                        <button
                            class="btn btn-link px-2 text-decoration-none d-flex align-items-center"
                            data-pr-search>
                            <i class="ri-search-2-line ri-lg align-middle"></i>
                        </button>
                    </li> --}}
                    <!-- /Navbar Search-->
    
                   
    
                    <!-- Navbar Login-->
                  
                    <!-- /Navbar Login--
    
                </ul>
                <!-- Navbar Icons-->
    
         
         <!-- Navbar Cart-->
         <!-- Navbar Cart-->
         @auth
        <li class="ms-1 d-inline-block position-relative">
             <div class="profile-dropdown navbar-list">
                 <div onclick="toggle()" class="profile-dropdown-btn">
                   <div class="profile-img">
                     <img src=" {{asset(Auth::user()->profile)}}" alt="" class="profile-img">
                     <i class="fa-solid fa-circle"></i>
                   </div>
         
                   <span> {{Auth::user()->name}}
                     <i class="fa-solid fa-angle-down"></i>
                   </span>
                 </div>
         
                 <ul class="profile-dropdown-list">
                   <li class="profile-dropdown-list-item">
                     <a href="{{ url('/profile/edit')}}">
                       <i class="fa-regular fa-user"></i>
                       Edit Profile
                     </a>
                   </li>

                   <li class="profile-dropdown-list-item">
                     <a href="{{ url('/profile/update_password')}}">
                       <i class="fa-regular fa-user"></i>
                       Edit Password
                     </a>
                   </li>
                   <hr />
         
                   <li class="profile-dropdown-list-item">
                     <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout').submit()">
                       <i class="fa-solid fa-arrow-right-from-bracket"></i>
                       Log out
                     </a>
                   </li>
                 </ul>
               </div>
               <form id="logout"  method="POST" action="{{route('logout')}}">
                 @csrf
               </form>
         </li>
         @endauth
         <!-- /Navbar Cart-->

     </ul>
     <!-- Navbar Icons-->

 </div>
</div>
    </nav>
<script>
let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
if (!btn.contains(e.target)) classList.remove("active");
});

</script>

<script src="{{ asset('./assets/js/vendor.bundle.js') }}"></script>
    
<!-- Theme JS -->
<script src="{{ asset('./assets/js/theme.bundle.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</div>

    <!-- / Navbar-->    <!-- / Navbar-->