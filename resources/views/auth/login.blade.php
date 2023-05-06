{{-- @include('nav') --}}
@include('header')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@include('navbar3')
<div class="container2">
  <form method="POST" action="{{ route('login')}}">
    @csrf
    <h1>Login</h1>

      @if ($errors->any())
          <div class="alert alert-danger" >
                 <p style="font-size: 12px; margin-bottom: 0px;">L'email ou mot de passe sont invalide </p>
          </div>
      @endif
    <div class="username t-input">
      <input type="email" required="" id="username"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="." />
      <label for="username">Email</label>
      <div class="b-line"></div>
    </div>
    <div class="password t-input">
      <input type="password" required="" id="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="." />
      <label for="password">Password</label>
      <div class="b-line"></div>
    </div>

    <button  type="submit" style="margin-right: 30%;">Log in</button>

    <style>
      .alert-danger{
        border-radius: 10px;
      }
      .alert-danger p{
        color: red;
        font-weight: 900;
      }
    </style>
  </form>
</div>


</body>
</html>