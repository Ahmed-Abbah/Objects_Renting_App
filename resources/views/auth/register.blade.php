@include('header')
<link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
@include('navbar3')

<div class="container2">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>SignUp</h1>
        <!-- Name -->
        <div class="row">
        <div class="t-input inline-input">  
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder=".">
            <label for="name">{{ __('Nom') }}</label>
            <div class="b-line"></div>
            @if ($errors->has('name'))
            <div style="margin-left: -12px;">
                <p style="
                color:red;font-size:9px;">{{ $errors->first('name') }}</p>
            </div>
        @endif
        </div>

        <!-- Email Address -->
        <div class="t-input inline-input">
            <input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required autofocus placeholder=".">
            <label for="prenom">{{ __('prenom') }}</label>
            <div class="b-line"></div>
        @if ($errors->has('prenom'))
            <div style="margin-left: -12px;">
                <p style="
                color:red;font-size:9px;">{{ $errors->first('prenom') }}</p>
            </div>
        @endif
        </div>
        </div>
        
        <div class="row">
        <div class="t-input inline-input">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder=".">
            <label for="email">{{ __('Email') }}</label>
            <div class="b-line"></div>
        @if ($errors->has('email'))
            <div style="margin-left: -12px;">
                <p style="
                color:red;font-size:11px;">{{ $errors->first('email') }}</p>
            </div>
        @endif
        </div>
         <!-- Telephone  -->
         <div class="t-input inline-input">
            <input id="telephone" type="text" name="tel"   value="{{ old('tel') }}" required placeholder=".">
            <label for="telephone">{{ __('Numero Telephone') }}</label>
            <div class="b-line"></div>
        @if ($errors->has('tel'))
            <div style="margin-left: -12px;">
                <p style="
                color:red;font-size:9px;">{{ $errors->first('tel') }}</p>
            </div>
        @endif
        </div>
    </div>

    <div class="row">
        <!-- Password -->
        <div class="t-input inline-input" >
            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="." oninput="checkPassword()" >
            <label for="password">{{ __('Password') }}</label>
           
            <span toggle="#password" class="password-toggle-icon"></span>
            <div class="b-line"></div>
            <div style="margin-left: -20px;">
                <p id="lengthError" style="display: none;
                color:red;font-size:9px;">password doit contenir au moins 8 caractères.</p>
            </div>
             
        </div>

        <!-- Confirm Password -->
        <div class="t-input inline-input">
            <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="." oninput="checkPassword()" >
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <div class="b-line"></div>
            <div style="margin-left: -20px;">
                <p id="password_nonmatch" style="display: none;
                color:red;font-size:9px;">Les mots de passe ne correspondent pas.</p>
                <p id="password_match" style="display: none;
                color:green;font-size:9px;">Les mots de passe correspondent .</p>
            </div>
        </div>
    </div>
        
    <div class="row">
        <!-- Adresse -->
        <div class="t-input inline-input">
            <input id="Adresse" type="text" name="adresse"  value="{{ old('adresse') }}" required placeholder=".">
            <label for="Adresse">{{ __('Adresse') }}</label>
            <div class="b-line"></div>
        </div>
        <!-- Ville -->
        <div class="t-input inline-input">
            <input id="Ville" type="text" name="ville"  value="{{ old('ville') }}" required placeholder=".">
            <label for="Ville">{{ __('Ville') }}</label>
            <div class="b-line"></div>
        </div>
    </div>
        <div class="flex items-center justify-end mt-4 submit">
            <button type="submit" class="ml-4">
                {{ __('Register') }}
            </button>
            <br>
            <a class="lien underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>
<style>
    p{
    position: absolute;
    bottom: -30px;
    display: block;
    width: 100%;
    height: 20px;
    color: $pink;
    font-size: 0.5rem;
    line-height: 20px;

    /* margin-left:-6px; */
    &:after{
        content: 'x';
        position: absolute;
        bottom: 20px;
        right: 0px;
        display: none;
        width: 20px;
        height: 25px;
        font-size: 1rem;
        line-height: 25px;
        text-align: center;
        color: $pink;
    }}

    .lien{
        text-decoration-line: none;
        color: aliceblue;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .flex a:hover{
        color: #f05d23;
    }

</style>
    
{{-- <style>
    .password-toggle-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        background-image: url('eye-icon.png');
        background-repeat: no-repeat;
        background-size: contain;
        cursor: pointer;
      }
</style> --}}

<script>
    function checkPassword() {
        const password = document.getElementById("password").value;
        const lengthError = document.getElementById("lengthError");
        const confirmPassword = document.getElementById("password_confirmation").value;
        const matchError = document.getElementById("password_nonmatch");
        const matched = document.getElementById("password_match")

        // Vérifier la longueur minimale
        if (password.length < 8) {
            lengthError.style.display = "block";
        } else {
            lengthError.style.display = "none";
        }

    if(password.length >0 && confirmPassword >0){
    if (password === confirmPassword) {
    matched.style.display = "block";
    matchError.style.display="none"
    } else {
    matched.style.display = "none";
    matchError.style.display="block"
    }
    }
}
</script>
</body>

</html>