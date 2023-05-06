@include('header')
@include('navbar3')

    <!-- / Navbar-->    <!-- / Navbar-->

    <!-- Main Section-->
    <style>
  .center {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
  }

  body{    
  }
  nav{
    
 
  }



  section{
    background-color:white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4);
    width:500px;
    
    border:1px solid black;
    border-radius:5px;
  }

 

  

  button{
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }
  textarea{
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }


.form-ctrl {
    position: relative;
    margin: 15px 0;
    width: 660px;
}

.form-ctrl input {
    border: 0;

    border-bottom: 2px solid #333;
    padding-top: 15px;
    display: block;
    font-size: 18px;
    font-family: 'Muli', sans-serif;
    width: 100%;
    transition: 0.1s ease-in;
}

.form-ctrl input:focus, 
.form-ctrl input:valid {
    border-bottom-color: darksalmon;
    outline: none;
}

.form-ctrl input:focus + label span ,
.form-ctrl input:valid + label span{
    color: darksalmon;
    transform: translateY(-30px);
}

.form-ctrl label {
    position: absolute;
    top: 15px;
    left: 10px;
}

.form-ctrl label span {
    display: inline-block;
    font-size: 18px;
    min-width: 5px;
    transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.form-grp2 {
    position: relative;
    margin: 15px 0;
    width: 660px;
}

.form-grp2 select {
    border: 0;

    border-bottom: 2px solid #333;
    padding-top: 15px;
    display: block;
    font-size: 18px;
    font-family: 'Muli', sans-serif;
    width: 100%;
    transition: 0.1s ease-in;
}

.form-grp2 select:focus, 
.form-grp2 select:valid {
    border-bottom-color: darksalmon;
    outline: none;
}

.form-grp2 select:focus + label span ,
.form-grp2 select:valid + label span{
    color: darksalmon;
    transform: translateY(-30px);
}

.form-grp2 label {
    position: absolute;
    top: 15px;
    left: 10px;
}

.form-grp2 label span {
    display: inline-block;
    font-size: 18px;
    min-width: 5px;
    transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.form-grp1 {
    position: relative;
    margin: 15px 0;
    width: 660px;
}

.form-grp1 select {
    border: 0;

    border-bottom: 2px solid #333;
    padding-top: 15px;
    display: block;
    font-size: 18px;
    font-family: 'Muli', sans-serif;
    width: 100%;
    transition: 0.1s ease-in;
}

.form-grp1 select:focus, 
.form-grp1 select:valid {
    border-bottom-color: darksalmon;
    outline: none;
}

.form-grp1 select:focus + label span ,
.form-grp1 select:valid + label span{
    color: darksalmon;
    transform: translateY(-30px);
}

.form-grp1 label {
    position: absolute;
    top: 15px;
    left: 10px;
}

.form-grp1 label span {
    display: inline-block;
    font-size: 18px;
    min-width: 5px;
    transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

  
</style>
<body>
    <div class="position-absolute top-10 bottom-0 start-0 end-0"  style="height:965px; z-index: -3;">
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

    <section class="mt-4 container " style="max-width: 750px;" >
        <!-- Page Content Goes Here -->
        <form method="POST" action="{{route('creerObjet')}}"  enctype="multipart/form-data" >
        @csrf
        <h1 class="mb-4 display-5 fw-bold text-center" style="margin-top:30px;">Ajouter un Nouveau Objet</h1>
            
            <div class="row g-md-1 mt-4 center">
           
                <!-- Checkout Panel Left -->
                <div class="col-12 col-lg-6 col-xl-7" style="margin-top:5px;">
                    <!-- Checkout Panel Contact -->
                    <div class="checkout-panel">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <center>{{ session('success') }}</center>
                            </div>
                        @endif
                      <center><h5 class="title-checkout">Qu'est ce que vous proposez ?</h5></center>
                      <div class="row">
                        <!-- Catégorie-->
                        <div class="col-12 center" style="outline: none;">
                          <div class="form-grp1">
                            
                            <select class="form-select" id="categorie" name="categorie"  required="">
                              <option value="#">Veuillez selectionner une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option id="$objet->id_categorie" value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>
                                @endforeach
                            </select>
                            <label for="categorie" class="form-label">Catégorie</label>
                          </div>
                          <script>
                              const selects1 = document.querySelectorAll('.form-grp1 select');
                            const labels1 = document.querySelectorAll('.form-grp1 label');

                            labels1.forEach(label => {
                                label.innerHTML = label.innerText
                                    .split('')
                                    .map((letter, idx) => `<span style="
                                            transition-delay: ${idx * 50}ms
                                        ">${letter}</span>`)
                                    .join('');
                            });
                          </script>
                        
                        </div>
                        
        

                        <!-- Titre-->
                        <div class="col-12 center">
                          <div class="form-ctrl">
                            <input type="text" class="" id="titre" placeholder="" name="titre" value="" required />
                            <label>Nom Objet</label>
                          </div>
                          <script>
                              const inputs = document.querySelectorAll('.form-ctrl input');
                            const labels = document.querySelectorAll('.form-ctrl label');

                            labels.forEach(label => {
                                label.innerHTML = label.innerText
                                    .split('')
                                    .map((letter, idx) => `<span style="
                                            transition-delay: ${idx * 50}ms
                                        ">${letter}</span>`)
                                    .join('');
                            });
                          </script>
                        </div>
                      

                      <div class="col-12 center">
                          <div class="form-grp2">
                        
                            <select class="form-select" id="objet" required="" name="etat_c">
                              <option value="#" >Veuillez selectionner l'etat de l'objet</option>
                              <option value="Neuf/Nouveau">Neuf / Nouveau</option>
                              <option value="Comme neuf">Comme neuf</option>
                              <option value="Utilisé / D'occasion">Utilisé / D'occasion</option>
                              <option value="Remis à neuf / Rénové">Remis à neuf / Rénové</option>
                              
                            </select>
                            <label>Etat</label>
                            
                          </div>

                          <script>
                              const selects2 = document.querySelectorAll('.form-grp2 select');
                            const labels2 = document.querySelectorAll('.form-grp2 label');

                            labels2.forEach(label => {
                                label.innerHTML = label.innerText
                                    .split('')
                                    .map((letter, idx) => `<span style="
                                            transition-delay: ${idx * 50}ms
                                        ">${letter}</span>`)
                                    .join('');
                            });
                          </script>
                       </div> 
                        
                      
                    

                    <div class="row">
            <br>
                        <div class="col-12 border-top">
              
              <div class="form-group" style="margin-top:30px;">
                          <h5>Images</h5>
              
                        </div>
                          <div class="d-flex justify-content-center mb-4">
                <div id="image-preview">
                  <img src="{{ asset('assets/images/logos/AddImageLogo.png') }}"
                  class="rounded-circle" alt="example placeholder" style="width: 200px;" />
                </div>
              </div>
                        </div>
          </div>

            <div class="d-flex justify-content-center">
              <div class="btn btn-primary btn-rounded btn-orange btn-orange-chunky"> 
                <label class="form-label text-white m-1 " for="customFile2" >Choisir des Images</label>
                <input name="images[]"   value="{{old('images[]')}}" type="file" class="form-control d-none" id="customFile2"  multiple />
                
              </div>
            </div>

            <center>
              <small style="color:black;display:block;margin:10px;font-size:bold;">
              Veuillez uploader une ou plusieurs images en format(jpg, jpeg, png ou gif) .
              </small>
            </center>
            <br>
            <br>
       
      </div>
                      
                    </div>                  <!-- Checkout Shipping Method-->
                    
                    <button  class="btn btn-dark w-100"  type="submit" >Ajouter</button>     

                    </div>
                    </form>
                    <br>

                  </div>
                <!-- / Checkout Panel Left -->
                    
                <!-- Checkout Panel Summary -->
                
                <!-- /Checkout Panel Summary -->
            </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
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


    <!-- Footer-->
@include('footer')

</body>
