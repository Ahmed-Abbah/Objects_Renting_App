
@include('header')

@include('navbar3')


<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300);
@import url(https://fonts.googleapis.com/css?family=Pacifico);

* {
	font-size: 16px;
}

input:focus,
button:focus {
	outline: none;
}

button:hover,
.reset:hover {
	opacity: .8;
}

button:active,
.reset:active {
	opacity: .5;
}

.container2 {
	width: 620px;
	position: relative;
	top:450px; 
	left: 50%;
	transform: translate(-50%, -50%);
	padding:50px;
	background: linear-gradient(159deg, #e7eaf6 3.01%, rgb(221, 221, 221) 74.45%);
  font-size: 3vw;
	margin: max(1rem, 3vw);
	border: 0.35rem solid;
	padding: 3vw;
	border-image: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn) 30;
	animation: borderRotate var(--d) linear infinite forwards;
  max-height:1000px;
}
.box:nth-child(2) {
	border-image: radial-gradient(ellipse at var(--gradX) var(--gradY), var(--c1), var(--c1) 10%, var(--c2) 40%) 30;
	animation: borderRadial var(--d) linear infinite forwards;
}

@keyframes borderRotate {
	100% {
		--angle: 420deg;
	}
}

@keyframes borderRadial {
	20% {
		--gradX: 100%;
		--gradY: 50%;
	}
	40% {
		--gradX: 100%;
		--gradY: 100%;
	}
	60% {
		--gradX: 50%;
		--gradY: 100%;
	}
	80% {
		--gradX: 0%;
		--gradY: 50%;
	}
	100% {
		--gradX: 50%;
		--gradY: 0%;
	}
}


.steps {
	margin-bottom: 10px;
	position: relative;
	height: 25px;
}

.steps > div {
	position: absolute;
	top: 0;
	-webkit-transform: translate(-50%);
	-ms-transform: translate(-50%);
	transform: translate(-50%);
	height: 25px;
	padding: 0 5px;;
	display: inline-block;
	width: 80px;
	text-align: center;
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
}

.steps > div > span {
	line-height: 25px;
	height: 25px;
	margin: 0;
	color: #777;
	font-family: 'Roboto', sans-serif;
	font-size: .9rem;
	font-weight: 300;
}

.steps > div > .liner {
	position: absolute;
	height: 2px;
	width: 0%;
	left: 0;
	top: 50%;
	margin-top: -1px;
	background: #999;
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
}

.step-one {
	left: 0;
}

.step-two {
	left: 50%;
	clip: rect(0, 0px, 25px, 0px);
}

.step-three {
	left: 100%;
	clip: rect(0, 0px, 25px, 0px);
}

.line {
	width: 100%;
	height: 5px;
	background: #ddd;
	position: relative;
	border-radius: 10px;
	overflow: visible;
	margin-bottom: 50px;
}

.line .dot-move {
	position: absolute;
	top: 50%;
	left: 0%;
	width: 15px;
	height: 15px;
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	background: #ddd;
	border-radius: 50%;
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
}

.line .dot {
	position: absolute;
	top: 50%;
	width: 15px;
	height: 15px;
	left: 0;
	background: #ddd;
	border-radius: 50%;
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
	-webkit-transform: translate(-50%, -50%) scale(.5);
	-ms-transform: translate(-50%, -50%) scale(.5);
	transform: translate(-50%, -50%) scale(.5);
}

.line .dot.zero {
	left: 0%;
	background: #bbb;
}

.container2.slider-one-active .dot.zero {
	background: #5892fc;
}

.line .dot.center {
	left: 50%;
	background: #bbb
}

.line .dot.full {
	left: 100%;
	background: #bbb
}

.slider-ctr {
	width: 100%;
	overflow: hidden;
}

.slider {
	overflow: hidden;
	width: 1500px;
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
	-webkit-transform: translate(0px) scale(1);
	-ms-transform: translate(0px) scale(1);
	transform: translate(0px) scale(1);
	
}

.container2.slider-one-active .slider-two,
.container2.slider-one-active .slider-three {
	-webkit-transform: scale(.5);
	-ms-transform: scale(.5);
	transform: scale(.5);
}

.container2.slider-two-active .slider-one,
.container2.slider-two-active .slider-three {
	-webkit-transform: scale(.5);
	-ms-transform: scale(.5);
	transform: scale(.5);
}

.container2.slider-three-active .slider-one,
.container2.slider-three-active .slider-two {
	-webkit-transform: scale(.5);
	-ms-transform: scale(.5);
	transform: scale(.5);
}

.slider-one,
.slider-two,
.slider-three {
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
}

.slider-form {
	float: left;
	width:500px;
	text-align: center;
}

.slider-form h2 {
	font-size: 1.5rem;
	font-family: 'Roboto', sans-serif;
	font-weight: 300;
	margin-bottom: 50px;
	color: #999;
	position: relative;
}

.slider-form h2 .yourname {
	font-weight: 400;
}

.slider-form h3 {
	font-size: 1.5rem;
	font-family: 'Roboto', sans-serif;
	font-weight: 300;
	margin-bottom: 50px;
	line-height: 1.5;
	color: #999;
	position: relative;
}

.slider-form h3 .balapa {
	font-family: 'Pacifico', sans-serif;
	display: inline-block;
	color: #5892fc;
	text-decoration: none
}

/* .slider-form [type="text"] {
	width: 100%;
	box-sizing: border-box;
	padding: 15px 20px;
	background: #fafafa;
	border: 1px solid transparent;
	color: #777;
	border-radius: 50px;
	margin-bottom: 50px;
	font-size: 1rem;
	font-family: 'Roboto', sans-serif;
	position: relative;
	z-index: 99;
} */

<!-- HTML !-->


/* CSS */
#button-5 {
  align-items: center;
  background-clip: padding-box;
  background-color: #fa6400;
  border: 1px solid transparent;
  border-radius: .25rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

#button-5:hover,
#button-5:focus {
  background-color: #fb8332;
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
}

#button-5:hover {
  transform: translateY(-1px);
}

#button-5:active {
  background-color: #c85000;
  box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
  transform: translateY(0);
}

/* CSS */



#button-84 {
  align-items: center;
  background-color: initial;
  background-image: linear-gradient(#464d55, #25292e);
  border-radius: 8px;
  border-width: 0;
  box-shadow: 0 10px 20px rgba(0, 0, 0, .1),0 3px 6px rgba(0, 0, 0, .05);
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  flex-direction: column;
  font-family: expo-brand-demi,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 18px;
  height: 52px;
  justify-content: center;
  line-height: 1;
  margin: 0;
  outline: none;
  overflow: hidden;
  padding: 0 32px;
  text-align: center;
  text-decoration: none;
  transform: translate3d(0, 0, 0);
  transition: all 150ms;
  vertical-align: baseline;
  white-space: nowrap;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

#button-84:hover {
  box-shadow: rgba(0, 1, 0, .2) 0 2px 8px;
  opacity: .85;
}

#button-84:active {
  outline: 0;
}

#button-84:focus {
  box-shadow: rgba(0, 0, 0, .5) 0 0 0 3px;
}

@media (max-width: 420px) {
  #button-84 {
    height: 48px;
  }
}


.slider-form [type="text"]:focus {
	background: #fcfcfc;
	border: 1px solid #ddd;
}

/* .slider-form button, */
.reset {
  display: inline-block;
  text-decoration: none;
	background: #5892fc;
	border: none;
	color: white;
	padding: 10px 25px;
	font-size: 1rem;
	border-radius: 3px;
	cursor: pointer;
	font-family: 'Roboto', sans-serif;
	font-weight: 300;
	position: relative;
}

/*  emot */

.label-ctr {
	margin-bottom: 50px;
}

label.radio {
	height: 55px;
	width: 55px;
	display: inline-block;
	margin: 0 10px;
	background: transparent;
	position: relative;
	border-radius: 50%;
	cursor: pointer
}

label.radio input {
	visibility: hidden
}

label.radio input:checked + .emot {
	-webkit-transform: scale(1.25);
	-ms-transform: scale(1.25);
	transform: scale(1.25);
}

label.radio input:checked + .emot,
label.radio input:checked + .emot .mouth {
	border-color: #5892fc;
}

label.radio input:checked + .emot:before,
label.radio input:checked + .emot:after {
	background: #5892fc;
}

label.radio .emot {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background: #fafafa;
	border-radius: 50%;
	border: 2px solid #ddd;
	-webkit-transition: .3s all ease;
	transition: .3s all ease;
}

label.radio .emot:before {
	content: "";
	position: absolute;
	top: 15px;
	left: 15px;
	width: 5px;
	height: 10px;
	background: #ddd;
}

label.radio .emot:after {
	content: "";
	position: absolute;
	top: 15px;
	right: 15px;
	width: 5px;
	height: 10px;
	background: #ddd;
}

label.radio .emot .mouth {
	position: absolute;
	bottom: 10px;
	right: 15px;
	left: 15px;
	height: 15px;
	border-radius: 50%;
	border: 3px solid #ddd;
	background: transparent;
	clip: rect(0, 35px, 10px, 0);
}

label.radio .emot .mouth.smile {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	transform: rotate(180deg);
}

label.radio .emot .mouth.sad {
	-webkit-transform: translateY(50%);
	-ms-transform: translateY(50%);
	transform: translateY(50%);
}

/*	center */

.container2.center .line .dot-move {
	left: 50%;
	-webkit-animation: .3s anim 1;
}

.container2.center .line .dot.center {
	background: #5892fc;
}

.container2.center .slider {
	-webkit-transform: translate(-500px);
	-ms-transform: translate(-500px);
	transform: translate(-500px);
}

.container2.center .step-two {
	clip: rect(0, 100px, 25px, 0px);
}

.container2.center .step-one .liner {
	width: 100%;
}

/*	full */

.container2.full .line .dot-move {
	left: 100%;
	-webkit-animation: .3s anim 1;
}

.container2.full .line .dot.full {
	background: #5892fc;
}

.container2.full .slider {
	-webkit-transform: translate(-1000px);
	-ms-transform: translate(-1000px);
	transform: translate(-1000px);
}

.container2.full .step-two,
.container2.full .step-three {
	clip: rect(0, 100px, 25px, 0px);
}

.container2.full .step-one .liner,
.container2.full .step-two .liner {
	width: 100%;
}
#rightDiv{
	width: 200px;
	position: absolute;
	top: 400px; 
	left: 20px;
	transform: translate(-50%, -50%);
}

@import url("https://fonts.googleapis.com/css?family=Raleway:400");

* {
	box-sizing: border-box;
}
	.parent {position: relative;
  bottom: 0;
  
  display: flex;
  justify-content: flex-start;
  align-items: center;

}

.back {
  margin-right: 120px;
  background-color: #fff; /* set the background color */
  border: 1px solid #ccc; /* add a border */
  border-radius: 4px; /* round the corners */
  color: #333; /* set the text color */
  font-size: 16px; /* set the font size */
  padding: 10px 20px; /* add some padding */
  text-align: center; /* center the text */
  text-decoration: none; /* remove the underline */
  display: inline-block; /* make the button inline */
}
.back:hover {
  background-color: #f1f1f1; /* change the background color on hover */
  cursor: pointer; /* change the cursor to a pointer on hover */
}
	</style>
<body>
<div class="position-absolute z-index-0 top-10 bottom-0 start-0 end-0"  style="height:965px;">
                <!-- Swiper Info -->
                <div class="swiper-container overflow-hidden bg-light w-100 h-100"
                  data-swiper
                  data-options='{
                    "slidesPerView": 1,
                    "speed": 2000,
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
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/img6.jpg);"> 
                      </div>
                    </div>
                    <div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/img5.jpg);"> 
                      </div>
                    </div>
					<div class="swiper-slide position-relative">
                      <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="background-image: url(./assets/images/slideshows/img4.jpg);"> 
                      </div>
                    </div>
                  </div> 
                
                </div>
                </div></div>
                <!-- / Swiper Info-->            
<div class="container2 slider-one-active">
  <div class="steps">
    <div class="step step-one">
      <div class="liner"></div>
      <span></span>1er étape
    </div>
    <div class="step step-two">
      <div class="liner"></div>
      <span></span>2éme étape
    </div>
    <div class="step step-three">
      <div class="liner"></div>
      <span></span>3éme étape
    </div>
  </div>
  <div class="line">
    <div class="dot-move"></div>
    <div class="dot zero"></div>
    <div class="dot center"></div>
    <div class="dot full"></div>
  </div>
  <div class="slider-ctr">
  
    <div class="slider">
	<form method="POST" action="{{route('creerAnnonce')}}"  enctype="multipart/form-data" >
        @csrf
		<div class="slider-form slider-one">
    <h3 class="title-checkout" style="color:black;">Nouvelle Annonce</h3>
		<h5 class="title-checkout">Qu'est ce que vous proposez ?</h5>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
					<label for="categorie" class="form-label">Catégorie</label>
						<select class="form-select" id="categorie" name="categorie"  required="">
							<option value="">Veuillez selectionner une catégorie</option>
							@foreach($categories as $categorie)
								<option id="$objet->id_categorie" value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="objet" class="form-label" id="objLabel">Objet</label>
						<select class="form-select" id="objet"  name="objet" required>
						<option value="">Veuillez selectionner un objet</option>
							@foreach($objets as $objet)
								<option id="{{$objet->id_categorie}}" value="{{$objet->id}}">{{$objet->nom_objet}}</option>
							@endforeach
						</select>
						<small id="objetAddMssg">Vous pouvez toujours ajouter de nouveaux objets <a href="{{route('ajouterObjet')}}">ici</a> .</small>
					</div>
				</div>
			</div>
			<div class="col-12">
                        <div class="form-group">
                          
                        	<label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titre" placeholder="Titre" name="titre" value="{{ old('titre')}}" required autofocus>
                        </div>
                        </div>
                    
                        <!-- Description-->
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" placeholder="Description" aria-label="With textarea" value="{{old('description')}}" name="description"></textarea>
                          </div>
                        </div>
                        
						<button id="button-84" class="first next" role="button">Continuer</button>
            


        </div>


      <div class="slider-form slider-two">
        <!-- Date Debut-->
        <small style="color:black;display:block;margin:10px;font-size:bold;">
        Veuillez cocher les images de votre objet que vous voulez partager.
    </small>
    <div id='images-container'></div>
		
                      	
						  
					<div class="row">
						<br>
                      	<div class="col-12 border-top">
							
						  <div class="form-group" style="margin-top:30px;">
                        	<h5>Voulez vous ajouter des images additionnel pour cette annonce ?</h5>
							
                      	</div>
		
                        <center>
    
    <!-- @foreach ($objets as $objet)    
        @if(!is_null($objet->images))
            @foreach ($objet->images as $image)
                <div style="border: 2px solid #ddd; padding: 10px; display: inline-block; margin: 10px; position: relative;">
                    <label style="position: absolute; top: -10px; right: -10px;">
                        <input type="checkbox" name="images[]" value="{{ $image->image }}" style="display: none;">
                        
                    </label>
                    <img src="{{ asset('storage/images/annonce/' . $image->image) }}" alt="{{ $image->image }}" width="200" style="cursor: pointer;">
                    <div class="selected-text" style="position: absolute; top: 10px; left: 10px; background-color: rgba(0, 255, 0, 0.5); color: white; padding: 5px; display: none;">
                    <i class="bi bi-check">Selectionné</i>

                    </div>
                </div>
            @endforeach
        @endif
    @endforeach -->

    
    
</center>




<style>
  .image-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    border: 1px solid black;
    padding: 10px;
  }
  .image-wrapper {
    border: 1px solid #ddd;
    padding: 5px;
    position: relative;
  }
  .image-wrapper label {
    display: block;
    cursor: pointer;
    position: relative;
  }
  .image-wrapper img {
    display: block;
    width: 100%;
    height: auto;
  }
  .image-wrapper input[type="checkbox"] {
    display: none;
  }
  .selected-text {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 255, 0, 0.7);
    color: white;
    font-size: 14px;
    padding: 2px 5px;
    display: none;
    z-index:1;
  }
  .image-wrapper input[type="checkbox"]:checked + .selected-text {
    display: block;
  }
  .image-wrapper input[type="checkbox"]:checked + img {
    border: 2px solid green;
  }
</style>




                          
     
						  
          </div>
					</div>

						<div class="d-flex justify-content-center">
							<div class="btn btn-primary btn-rounded btn-orange btn-orange-chunky"> 
								<label class="form-label text-white m-1 " for="customFile2" >Choisir des Images</label>
								<input name="images[]"   value="images[]" type="file" class="form-control d-none" id="customFile2"  multiple >
							</div>
              
						</div>
				  		
						<center>
            <div id="image-preview"></div>
							<small style="color:black;display:block;margin:10px;font-size:bold;">
							    Veuillez uploader une ou plusieurs images en format(jpg, jpeg, png ou gif) .
							</small>
						</center>
						<br>
						<br>
            
            <script>
$('#objet').on('change', function() {
  var selectedOption = $(this).val();
  $.ajax({
    url: 'getimages',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      'objet_id': selectedOption
    },
    success: function(response) {
      var imagesContainer = $('#images-container');
      imagesContainer.html(response);
      
      // Attach the event listener to the images
      var images = document.getElementsByName('imagesIds[]');
      var imageContainers = document.querySelectorAll('div > img');
      imageContainers.forEach(function(image, index) {
        image.addEventListener('click', function() {
          if (images[index].checked) {
            images[index].checked = false;
            image.parentNode.querySelector('.selected-text').style.display = 'none';
            image.parentNode.style.border = '2px solid #ddd';
          } else {
            images[index].checked = true;
            image.parentNode.querySelector('.selected-text').style.display = 'block';
            image.parentNode.style.border = '2px solid green';
          }
        });
      });
    } 
  });
});
</script>
                      

<div class="parent">
<button class="back">Retour</button>
<button id="button-84" role="button" class="second next">Continuer</button>
</div>

						
       
      </div>
      <div class="slider-form slider-three">
	  <h5 class="title-checkout">Plus d'informations</h5>
    <div class="row">
		<div class="col-md-12">
                          <div class="form-group">
                            <label for="state" class="form-label">Ville</label>
                            </select>
                            <select class="form-select" id="objet" required="" name="ville">
                              <option value="" checked>Selectionner votre ville</option>
                              <option value="casablanca">Casablanca</option>
                              <option value="rabat">Rabat</option>
                              <option value="marrakech">Marrakech</option>
                              <option value="fes">Fes</option>
                              <option value="tangier">Tangier</option>
                              <option value="tetouan">Tétouan</option>
                              <option value="agadir">Agadir</option>
                            </select>
                          </div>
                        </div>
    </div>
	  <div class="row">
						<div class="col-md-6 ">
                          <div class="form-group">
                            <label for="state" class="form-label">Date début</label>
                            <input type="date" class="form-control" name="dateDebut" value="{{ old('dateDebut')}}">
                          </div>
                        </div>
                    
                        <!-- Date fin-->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="zip" class="form-label">Date fin</label>
                            <input type="date" class="form-control" name="dateFin" value="{{ old('dateFin')}}">
                          </div>
						</div>
					</div>
                        <div class="row">
                          <!-- nombre minimum de jours-->
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="firstNameAddress" class="form-label">Nombre de Jours Minimum  </label>
                              <input type="text" class="form-control" id="firstNameAddress" placeholder="Optionnel" value=""  name="nbrJrsMin" value="{{ old('nbrJrsMin')}}" >
                            </div>
                          </div>
                        

						
						<div class="col-md-6">
                          <div class="form-group">
                          
                            <label for="zip" class="form-label">Prix de location par jour</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">MAD</span>
                            </div>
                            <input type="text" class="form-control" id="zip" name="prix" placeholder="Prix de location" required="" value="{{old('prix')}}">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                          </div>
                        </div>
</div>
                        </div>
						
                      <div class="pt-4 mt-4 border-top d-flex justify-content-between align-items-center">
                        <!-- Shipping Same Checkbox-->
                        <div class="form-group form-check m-0">
                          <input type="checkbox" class="form-check-input" id="same-address" checked>
                          <label class="form-check-label" for="same-address">Aucun jour spécifique</label>
                          
                        </div>
                      </div>
					  <div class="billing-address checkout-panel d-none">
                    <div >
                    <div class="form-check" >
                        <input class="form-check-input " type="checkbox" value="Lundi" name="jours[]" id="flexCheckDefault">
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
                        <input class="form-check-input" type="checkbox" value="Dimanche" name="jours[]" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Dimanche
                        </label>
                    </div>
                    </div>
                    </div>
					<div class="parent">
<button class="back">Retour</button>
<button id="button-84" role="button" type="submit">Publier</button>
</div>
					
      </div>
    </div>
</form>
  </div>
</div>



<script>
// Select all buttons and input field
var $buttons = $(".first, .second, .back, .reset");
var $input = $("input");
var $name = $(".name");
var $yourname = $(".yourname");
var $ctr = $(".container2");

// Add click event listener to all buttons
$buttons.on("click", function(e) {
  var $this = $(this);
  
  // Handle click based on button class
  if ($this.hasClass("first")) {
    $ctr.addClass("center slider-two-active").removeClass("full slider-one-active");
  } else if ($this.hasClass("second")) {
    $ctr.addClass("full slider-three-active").removeClass("center slider-two-active slider-one-active");
    $name = $input.val(); // update the $name variable with the new input value
    if ($name == "") {
      $yourname.html("Anonymous!");
    } else {
      $yourname.html($name + "!");
    }
  } else if ($this.hasClass("back")) {
    if ($ctr.hasClass("slider-three-active")) {
      $ctr.removeClass("slider-three-active full").addClass("center slider-two-active");
    } else if ($ctr.hasClass("slider-two-active")) {
      $ctr.removeClass("slider-two-active center").addClass("slider-one-active");
    }
    $name = $(".name").text(); // reset $name to its original value
  } else if ($this.hasClass("reset")) {
    $ctr.removeClass("slider-three-active full center slider-two-active slider-one-active");
    $input.val(""); // clear the input field
    $name = $(".name").text(); // reset $name to its original value
    $yourname.html(""); // clear the output element
  }
  
  // Update button text and prevent default action
  $this.delay(0).queue(function() {
    $this.text($this.data("original-text"));
  });
  e.preventDefault();
});

</script>



<script>
                            const categorieSelect = document.getElementById("categorie");
                            const objetSelect = document.getElementById("objet");
                            const objLabel = document.getElementById("objLabel");
							const objAddMssg = document.getElementById("objetAddMssg");

                            const objetOptions = objetSelect.querySelectorAll("option");


                            objetSelect.style.display = "none";
                            objLabel.style.display="none";
							objAddMssg.style.display="none";


                            categorieSelect.addEventListener("change", () => {
                              
                              if (categorieSelect.value !== "") {
                                
                                objetSelect.style.display = "block";
                                objLabel.style.display="block";
								objAddMssg.style.display="block";
                                
                                
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
								objAddMssg.style.display="none";
                                
                                
                                objetOptions.forEach(option => {
                                  option.style.display = "none";
                                });
                              }
                            });

                        </script>

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
                      </script>



@include('footer')
<body>