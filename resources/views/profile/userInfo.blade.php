@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('navbar3')
<body>
  

<div class="wrapper">
  <div class="profile-top">
    <div class="profile-image" style="background-image: url('{{ asset($user->profile) }}');"></div>
  </div>

  <div class="profile-bottom">
    <div class="profile-infos">
      <div class="main-infos">
        <h3 class="name">{{$user->name}} {{$user->prenom}}</h3>
      </div>
 
      <p class="ville"><ion-icon name="location"></ion-icon>{{$user->ville}}</p>
    </div>

    <div class="profile-stats"  style="display: flex; justify-content: center;">
      
      
      @php
  $moyenne = $avg; // remplacer 3.5 par la valeur de $moyenne récupérée
  $full_stars = floor($moyenne); // nombre d'étoiles pleines
  $half_star = ($moyenne - $full_stars >= 0.5); // true si une demi-étoile est nécessaire
  @endphp

<div class="stat-item">
  <p class="stat"> {{$avg}} </p>
  @for ($i = 0; $i < $full_stars; $i++)
    <span class="fa fa-star checked"></span>
  @endfor
  @if ($half_star)
    <span class="fa fa-star-half-o checked"></span>
  @endif
  @for ($i = 0; $i < 5 - $full_stars - $half_star; $i++)
    <span class="fa fa-star"></span>
  @endfor
</div>


    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" style="2000px">
          <div class="modal-content"  style=" width: 600px;margin-left:270px;background-color:#151C35">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="color:#fff;margin-left:120px;font-size:25px">Review sur {{$user->name}} {{$user->prenom}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="container2">
                      <div class="board">
                          @php
                          // $AnnonceID =$user->id;
                              // $partenaire= DB ::table('users')
                              //    ->join('annonces', 'users.id', '=', 'annonces.id_partenaire')
                              //    ->groupBy('users.id','users.name','users.prenom','users.profile')
                              //    ->select('users.id','users.name','users.prenom','users.profile')
                              //    ->where('annonces.id',$AnnonceID)
                              //    ->first();
                               $id_user= $user->id;
                              
     
                                 $reviews=  DB::table('reviews')
                                 ->where('id_partenaire', '=', $id_user)
                                 ->get();

                                 
                                 $reviews2=  DB::table('reviews')
                                 ->where('id_client', '=', $id_user)
                                 ->get();

                        
                               
                               
                                
                     @endphp
                      
              
                          <!-- Slider main container -->
                          <div class="swiper" style="margin-left:-137px;margin-top:-60px;width: 190%">
                              <!-- Additional required wrapper -->
                              <div class="swiper-wrapper" style="width: 200px">
                              <!-- Slides -->
                                 
                              @foreach ($reviews as $key=> $review)
                              @php
                              $id_partenaire2=$review->id_client;
                                  $partenaire=  DB::table('users')
                                
            
                                  ->where('id', '=', $id_partenaire2)
                                  
          
                                  ->first();
                              @endphp
                              @if ($partenaire->isBlocked == 0)
                                  <div class="swiper-slide" >
                                      <div class="flex2">
                                          <div class="comments2">
                                        
                                              {{$review->commantaire_client_partenaire}}
                                          </div>
                                          <div class="profile2">
                                              <img src="{{asset($partenaire->profile)}}" alt="">
                                              <a href="#">  {{$partenaire->name}}  {{$partenaire->prenom}}</a>
                                          
                                          </div>
                                      </div>
                                  </div>
                                @endif
                              @endforeach
                              @foreach ($reviews2 as $key=> $review)
                              @php
                              $id_client2=$review->id_partenaire;
                                  $client=  DB::table('users')
                                
            
                                  ->where('id', '=', $id_client2)
                                  
          
                                  ->first();
                              @endphp
                                @if ($client->isBlocked == 0)
                                  <div class="swiper-slide" >
                                      <div class="flex2">
                                          <div class="comments2">
                                        
                                              {{$review->commantaire_partenaire_client}}
                                          </div>
                                          <div class="profile2">
                                              <img src="{{asset($client->profile)}}" alt="">
                                              <a href="#">  {{$client->name}}  {{$client->prenom}}</a>
                                          
                                          </div>
                                      </div>
                                  </div>
                                  @endif
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


  </div>
  <div style="text-align: center;">
    <button class="button-17" id="rev" role="button">Display Review</button>
  </div>
  

</div>

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
<script
  type="module"
  src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
></script>
<script
  nomodule
  src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
></script>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap");



.wrapper {
  background-color:#a3a9ccb8;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset,
  rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
  rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
  width: 400px;
  height: 480px;
  margin-left:35%;
  margin-top: 30px;
}

.checked {
  color: orange;
}
.grey {
  color: #999999;
}

.profile-top {
  height: 100px;
  width: 500px;

  background-position: center;
  background-size: cover;
  position: relative;
}

.profile-image {

  background-position: center;
  background-size: cover;
  position: relative;
  width: 150px;
  height: 150px;
  overflow: hidden;
  border-radius: 50%;
  border: 3px solid white;
  position: absolute;
  bottom: 0;
  left: 40%;
  transform: translate(-50%, 50%);
}

.profile-bottom {
  margin-top: 75px;
  padding: 25px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.main-infos {
  display: flex;
  align-items: center;
  font-size: 28px;
  margin-bottom: 5px;
}

.name {
  font-weight: 700;
  margin-right: 15px;
}

.email {
  font-size: 14px;
  margin-bottom: 25px;
}

.ville {
  font-size: 20px;
  margin-bottom: 45px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.ville ion-icon {
  margin-right: 5px;
  color: #388eff;
}

.profile-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  width: 100%;
  margin-bottom: 20px;
  align-items: center;
  margin-top:-20px;
}

.stat-item:not(:last-child) {
  border-right: 1px solid black;
}

.stat-item{
  height: 40px;
  justify-content: center;
  align-items: center;
  
}

.stat {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 0;
}

.button-17 {
  align-items: center;
  appearance: none;
  background-color: #fff;
  border-radius: 24px;
  border-style: none;
  box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
  box-sizing: border-box;
  color: #3c4043;
  cursor: pointer;
  display: inline-flex;
  fill: currentcolor;
  font-family: "Google Sans",Roboto,Arial,sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  justify-content: center;
  letter-spacing: .25px;
  line-height: normal;
  max-width: 100%;
  overflow: visible;
  padding: 2px 24px;
  position: relative;
  text-align: center;
  text-transform: none;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: auto;
  will-change: transform,opacity;
  z-index: 0;
}

.button-17:hover {
  background: #F6F9FE;
  color: #174ea6;
}

.button-17:active {
  box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
  outline: none;
}

.button-17:focus {
  outline: none;
  border: 2px solid #4285f4;
}

.button-17:not(:disabled) {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}

.button-17:not(:disabled):hover {
  box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
}

.button-17:not(:disabled):focus {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}

.button-17:not(:disabled):active {
  box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
}

.button-17:disabled {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}
</style>

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
height: 70vh;
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
height: 20%;
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
</style>