@include('header')
<link rel="stylesheet" href="{{asset('assets/css/update_password.css')}}">
@include('navbar3')

<div class="mainDiv">
  <div class="cardStyle">
    <form action="{{ route('user-password.update') }}" method="post"id="signupForm">
      @csrf
      @method('PUT')
     
      <h2 class="formTitle">
        Modifier Mot de passe
      </h2>
    
      
      <div class="inputDiv">
        <label class="inputLabel" for="Current_Password">Current Password</label>
        <input type="password" id="Current_Password" name="current_password">
        @error('current_password')
            <div>
              {{$message}}
            </div>
        @enderror
      </div>
      
      
    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" id="password" name="password" required>
    </div>

    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="password_confirmation">
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" id="submitButton" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
        <span>Continue</span>
        <span id="loader"></span>
      </button>
    </div>
      
  </form>
  </div>
</div>
