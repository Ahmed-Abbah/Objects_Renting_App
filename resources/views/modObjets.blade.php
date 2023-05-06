@include('header')

@include('navbar2')

<body style="">
<section class="mt-5 container " >

<form method="POST" action="{{ route('modObjets', ['id' => $objet->id]) }}" class="form-group" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input class="form-control @error('title') is-invalid @enderror" type="text" name="nom_objet" value="{{ $objet->nom_objet }}"><br>
    
    <select class="form-select" name="id_categorie">
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}" {{ $categorie->id == $objet->id_categorie ? 'selected' : '' }}>
                {{ $categorie->nom_categorie }}
            </option>
        @endforeach
    </select><br>
    
    <select class="form-select" name="etat_c"><br>
    <option value="" selected disabled>Selectionner l'etat</option>
    <option value="Neuf/Nouveau" {{ $objet->etat_c == 'Neuf/Nouveau' ? 'selected' : '' }}>Neuf / Nouveau</option>
    <option value="Comme neuf" {{ $objet->etat_c == 'Comme neuf' ? 'selected' : '' }}>Comme neuf</option>
    <option value="Utilisé / D'occasion" {{ $objet->etat_c == "Utilisé / D'occasion" ? 'selected' : '' }}>Utilisé / D'occasion</option>
    <option value="Remis à neuf / Rénové" {{ $objet->etat_c == 'Remis à neuf / Rénové' ? 'selected' : '' }}>Remis à neuf / Rénové</option>
    </select><br>

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


    <button class="btn btn-dark w-100" type="submit">Enregistrer</button>
</form>
</section>
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