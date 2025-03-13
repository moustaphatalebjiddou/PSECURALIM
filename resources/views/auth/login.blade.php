<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SECURALIM | Connexion</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- MDBootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css">
  <!-- Custom Styles -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <style>
    body {
      background-color: #eee;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .card {
      border-radius: 15px;

    }
    .gradient-custom-2 {
      background: linear-gradient(to right, #0033a0, #007bff);
    }
    .btn-primary {
      background-color: #0033a0;
      border: none;
    }
    .btn-primary:hover {
      background-color: #002080;
    }
    .btn-outline-danger {
      border-color: #0033a0;
      color: #0033a0;
    }
    .btn-outline-danger:hover {
      background-color: #0033a0;
      color: #fff;
    }
    .form-control {
      border-radius: 50px;
      font-size: 16px;
      height: 50px;
    }
    .form-label {
      font-size: 16px;
    }
    .text-custom {
      color: #0033a0;
    }
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      width: 100%;
      background-image: url("{{ asset('template/images/imageag2.jpg') }}");
      background-size: cover; /* Assure que l'image couvre toute la surface */
      background-position: center; /* Centre l'image */
      background-attachment: fixed; /* Fixe l'image pour un effet de parallaxe */
      background-repeat: no-repeat; /* Évite la répétition de l'image */
    }
  </style>
</head>
<body>
<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-8 col-lg-10">
        <div class="card rounded-6 text-black">
          <div class="row g-0">
            <!-- Left Column -->
            <div class="col-lg-6">
              <div class="card-body p-md-0 mx-md-3">
                <div class="text-center">
                  <img src="{{ asset('template/images/logogereme.jpg') }}" style="width: 80px; height:80px;" alt="Logo">
                  <img src="{{ asset('template/images/Logo-Finance-par-l-Union-europeenne.jpg') }}" style="width: 150px; height:150px;" alt="Logo">
                  <img src="{{ asset('template/images/ENABE1L.png') }}" style="width: 90px; height:100px;" alt="Logo">
                  <h4 class="mt-0 mb-4 pb-0 text-custom">Bienvenue</h4>
                </div>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <p class="text-center">Veuillez vous connecter à votre compte</p>
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                    <label class="form-label" for="email">Email</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" />
                    <label class="form-label" for="password">Mot de passe</label>
                  </div>
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-primary btn-block fa-lg mb-3">Se connecter</button>
                    <a class="text-muted" href="{{ route('password.request') }}">Mot de passe oublié?</a>
                  </div>

                </form>
              </div>
            </div>
            <!-- Right Column -->
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-5">Groupe d'etudes et de recherches multiples</h4>
                <h6>Bienvenue sur la plateforme PSECURALIM créée par le Bureau GEREM pour gérer les données du projet SECURALIM.</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MDBootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>
</html>
