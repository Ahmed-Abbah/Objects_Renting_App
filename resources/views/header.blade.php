<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Page Meta Tags-->
<meta charset="utf-8">

<link
rel="stylesheet"
href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">


<link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.5/sweetalert2.min.css" integrity="sha512-jfENzOrDgjZ8tPZCC5gm5O5ySWVWUhEx8dO5xJRXOhHlZwIdpcVmB2C4Tp4X9i2RVG7Ry+M01NFG7kv0F3qKRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- SweetAlert JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.5/sweetalert2.min.js" integrity="sha512-iP+7VnE3z3F7VUIj58LiaBo7Vlbbi+N3sNUszJFyW+VBxjv2QfLwkpz/foZuy+jGjT0yJm+lFbC0kr8WfOmkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}" />
<link rel="stylesheet" href="{{asset('assets/css/profileDropdown.css')}}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}" />




<!-- Google Fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />

<!-- Fix for custom scrollbar if JS is disabled-->
<noscript>
    <style>
      /**
      * Reinstate scrolling for non-JS clients
      */
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
      <style>
        .form-check-input1 {
                width: 1em;
                height: 1em;
                margin-top: .25em;
                vertical-align: top;
                background-color: #fff;
                background-repeat: no-repeat;
                background-position: 50%;
                background-size: contain;
                border: 1px solid rgba(0,0,0,.25);
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                transition: background-color .15s ease-in-out,background-position .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        

      /**
      * Reinstate scrolling for non-JS clients
      */
      .simplebar-content-wrapper {
        overflow: auto;
      }

    .rating input[type="radio"] {
    display: none;
    }

    .rating label {
    color: #ccc;
    font-size: 30px;
    cursor: pointer;
    }

    .rating label:before {
    content: "\2606";
    }

.rating input[type="radio"]:checked ~ label:before {
content: "\2605";
color: #ffc107;
/* Colorer les étoiles précédentes */
~ label:before {
    color: #ffc107;
}
}

.rating input[type="radio"]:not(:checked) ~ label:hover,
.rating input[type="radio"]:not(:checked) ~ label:hover ~ label {
color: #ffdc75;
}

.rating input[type="radio"]:not(:checked) ~ label:before {
content: "\2605";
}

.rating input[type="radio"]:not(:checked) ~ label:hover:before,
.rating input[type="radio"]:not(:checked) ~ label:hover ~ label:before {
content: "\2605";
color: #ffdc75;
}

.rating input[type="radio"]:checked ~ label:hover:before,
.rating input[type="radio"]:checked ~ label:hover ~ label:before {
color: #ffc107;
}


 

    </style>
</noscript>

<!-- Page Title -->
<title>Location des objets</title>

</head>
<body class="">

  <!-- Navbar -->
  <div class="position-relative z-index-30"></div>

        