
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">

    
    @include('navbar3')
    <section class="mt-0 ">
        <div class="container">
            <div class="container2">
                <form method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Name -->

                    <div class="profile-box">
                        <img src="{{asset(Auth::user()->profile)}}" alt="" class="profile-pic">
                        <input type="file" name="profile" id="profile">
                        <label for="profile" id="uploadBtn">choose photo</label>
                    </div>
                    
                    <div class="row">
                    <div class="t-input inline-input">  
                        <input id="name" type="text" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus placeholder=".">
                        <label for="name">{{ __('Name') }}</label>
                        <div class="b-line"></div>
                    </div>
            
                    <!-- Email Address -->
                    <div class="t-input inline-input">
                        <input id="email" type="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" required placeholder=".">
                        <label for="email">{{ __('Email') }}</label>
                        <div class="b-line"></div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="t-input inline-input">
                        <input id="prenom" type="text" name="prenom" value="{{ old('prenom') ?? auth()->user()->prenom }}" required autofocus placeholder=".">
                        <label for="prenom">{{ __('prenom') }}</label>
                        <div class="b-line"></div>
                    </div>
                    <!-- Telephone  -->
                    <div class="t-input inline-input">
                        <input id="telephone" type="text" name="tel" value="{{old('tel') ?? auth()->user()->tel}}" required placeholder=".">
                        <label for="telephone">{{ __('Numero Telephone') }}</label>
                        <div class="b-line"></div>
                    </div>
                    </div>

                    
                    <div class="row">
                    <!-- Adresse -->
                    <div class="t-input inline-input">
                        <input id="Adresse" type="text" name="adresse" value="{{old('adresse') ?? auth()->user()->adresse}}" required placeholder=".">
                        <label for="Adresse">{{ __('Adresse') }}</label>
                        <div class="b-line"></div>
                    </div>
                    <!-- Ville -->
                    <div class="t-input inline-input">
                        <input id="Ville" type="text" name="ville" value="{{old('ville') ?? auth()->user()->ville}}" required placeholder=".">
                        <label for="Ville">{{ __('Ville') }}</label>
                        <div class="b-line"></div>
                    </div>
                    </div>
                        <div class="flex items-center justify-end mt-4 submit">
                            <button type="submit" class="ml-4">
                                {{ __('Edit') }}
                            </button>
                            <button type="button" data-toggle="modal" data-target="#confirmModal">Désactiver</button>
                    </div>
                </form>
              
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmModalLabel">Confirmer l'action</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    "Êtes-vous sûr de vouloir désactiver votre compte ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <form method="Get" action="{{route('desactiver')}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

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
          
    <style>
                .profile-box{

                    text-align: center;
                    /* padding: 10px 90px; */
                    
                    margin-bottom: 20px;    
                    
                    
                    height:100px;
            width: 100px;
            position: relative;
            /* top: 50%; */
            /* left: 50%; */
            /* transform: translate(-50%,-50%); */
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid grey;  
                }

                .profile-pic{
                    height: 100%;
            width: 100%;

                }

                #profile{
                    display: none;

                }

                #uploadBtn{
                    height: 30px;
                    width: 100%;
                    position: absolute;
                    bottom: 0;
                    margin-bottom: 0;
                    left: 50%;
                    transform: translateX(-50%);
                    text-align: top center;
                    background: rgba(0, 0, 0, 0.7);
                    color:#fff;
                    line-height: 30px;
                    font-family: sans-serif;
                    font-size: 10px;
                    cursor: pointer;
                    display: none;
                }
    </style>

    <script>
        //declearing html elements

const imgDiv = document.querySelector('.profile-box');
const img = document.querySelector('.profile-pic');
const file = document.querySelector('#profile');
const uploadBtn = document.querySelector('#uploadBtn');

//if user hover on img div 

imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

//if we hover out from img div

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});

//lets work for image showing functionality when we choose an image to upload

//when we choose a foto to upload

file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); //FileReader is a predefined function of JS

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

    }
});
    </script>
    </section>
    </body>

    </html>
