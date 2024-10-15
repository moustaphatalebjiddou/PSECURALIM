<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PSECURALIM</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <!-- Toaster Notification -->
  <link rel="stylesheet" href="{{ asset('toaster/toastr.min.css') }}">
  <head>
    <!-- ... autres balises ... -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
</head>
<style>
    .table-container {
    height: 500px; /* Ajustez la hauteur selon vos besoins */
    overflow-y: auto;
}

</style>

<style>
    @media print {
        /* Masquer tous les éléments que vous ne voulez pas voir lors de l'impression */
        .navbar, /* Barres de navigation */
        .main-footer, /* Footer */
        .head
         /* Si vous ne voulez pas voir le wrapper de contenu */
        .btn, /* Boutons (comme le bouton d'impression lui-même) */
        .card-header { /* En-tête de la carte */
            display: none !important;
        }
        /* Rendre le contenu principal plus visible */
        .card-body {
            display: block !important;
        }
         /* Styles pour garder les éléments alignés */
         .logo-container, .title-container, .contact-info {
            display: inline-block;
            vertical-align: top;
        }

        /* Forcer la taille et les proportions lors de l'impression */
        .logo-container {
            width: 20%; /* Garde le logo sur 20% de l'espace */
        }

        .title-container {
            width: 40%; /* Garde le titre centré */
            text-align: center;
        }

        .contact-info {
            width: 30%; /* Garde les infos à droite */
            text-align: right;
        }

        /* S'assurer que les images ne s'étendent pas trop */
        img {
            max-height: 100px;
        }

        /* Ajustement des marges et tailles pour impression */
        h3, h4, p {
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }

        .row, .col-md-12 {
            margin: 0;
            padding: 0;
        }

        /* Désactiver certains éléments si nécessaire */
        .no-print {
            display: none !important;
        }
    }

/* Debut Difficulte rencontrees defille */
.scrolling-text-container {
    background-color: #3d4ad7; /* Couleur de fond */
    border: 2px solid #3d4ad7; /* Bordure */
    padding: 5px 10px; /* Padding ajusté pour ajouter un peu d'espace */
    border-radius: 25px; /* Coins arrondis */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Ombre */
    overflow: hidden; /* Masquer le débordement */
    max-width: 100%; /* Limiter la largeur */
    height: 60px; /* Hauteur fixe */
    position: relative; /* Position relative pour le texte */
}

.scrolling-text {
    display: flex; /* Utilisation de flexbox */
    align-items: center; /* Centrer verticalement */
    white-space: nowrap; /* Pas de retour à la ligne */
    position: absolute; /* Positionner le texte défilant */
    animation: scrolling 20s linear infinite; /* Animation de défilement (vitesse réduite) */
}

.scrolling-item {
    font-size: 14px; /* Réduction de la taille de la police */
    color: #f1eeee; /* Couleur du texte */
    padding: 0 15px; /* Espacement autour du texte */
    font-weight: bold; /* Mettre le texte en gras */
}

@keyframes scrolling {
    0% {
        transform: translateX(100%); /* Commencer à droite */
    }
    100% {
        transform: translateX(-100%); /* Finir à gauche */
    }
}

h3 {
    text-align: center; /* Centrer le titre */
    margin: 0; /* Enlever la marge */
    font-family: 'Arial', sans-serif; /* Police */
    font-size: 16px; /* Taille du titre */
    color: #333; /* Couleur du titre */
}
/* fin Difficulte rencontrees defille */



</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('template/images/loading_1.gif') }}" alt="Loading" height="60" width="60">
  </div>

  <!-- Navbar -->
    @include('backend.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('backend.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <small><strong>Copyright &copy;<script type="text/javascript">
        document.write(new Date().getFullYear());
      </script> <a href="#">GEREM SARL</a></strong>Tous droits réservés.

    <div class="float-right d-none d-sm-inline-block">
        <p class="footer-heart">
            Fait avec <g-emoji class="g-emoji" alias="heart" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png">
                <img class="emoji" alt="heart" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png">
            </g-emoji> par <a href="https://moustaphatalebjiddou.github.io/" target="_blank">Moustapha Taleb Jiddou</a>
          </p>
        </div>
    </small>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- Start Toaster & Sweet Alert -->
  <script src="{{ asset('toaster/toastr.min.js') }}"></script>
  <script src="{{ asset('toaster/sweetalert.min.js') }}"></script>

    <script>
        @if (Session::has('messege'))
        var type="{{ Session::get('alert-type','info') }}"
        switch(type){
        case 'info':
        toastr.info("{{ Session::get('messege') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('messege') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('messege') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('messege') }}");
        break;
        }
        @endif
</script>



<script>
$(document).on("click", "#delete", function(e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Êtes-vous sûr de vouloir supprimer ?",
        text: "Si vous supprimez, cela sera supprimé définitivement !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Données conservées !");
        }
    });
});

</script>



<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "word", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

    <script>
        $(document).ready(function() {
            $('#wilaya').on('change', function() {
                let wilayaId = $(this).val();
                $.get(`/moughataas/${wilayaId}`, function(data) {
                    $('#moughataa').prop('disabled', false).empty().append('<option value="">Sélectionner une Moughataa</option>');
                    $('#commune').prop('disabled', true).empty().append('<option value="">Sélectionner une Commune</option>');
                    $('#localite').prop('disabled', true).empty().append('<option value="">Sélectionner une Localité</option>');
                    $('#perimetre').prop('disabled', true).empty().append('<option value="">Sélectionner un Périmètre</option>');

                    $.each(data, function(index, moughataa) {
                        $('#moughataa').append(`<option value="${moughataa.id}">${moughataa.nom}</option>`);
                    });
                }).fail(function() {
                    $('#moughataa').prop('disabled', true).empty().append('<option value="">Erreur de chargement</option>');
                });
            });

            $('#moughataa').on('change', function() {
                let moughataaId = $(this).val();
                $.get(`/communes/${moughataaId}`, function(data) {
                    $('#commune').prop('disabled', false).empty().append('<option value="">Sélectionner une Commune</option>');
                    $('#localite').prop('disabled', true).empty().append('<option value="">Sélectionner une Localité</option>');
                    $('#perimetre').prop('disabled', true).empty().append('<option value="">Sélectionner un Périmètre</option>');

                    $.each(data, function(index, commune) {
                        $('#commune').append(`<option value="${commune.id}">${commune.nom}</option>`);
                    });
                }).fail(function() {
                    $('#commune').prop('disabled', true).empty().append('<option value="">Erreur de chargement</option>');
                });
            });

            $('#commune').on('change', function() {
                let communeId = $(this).val();
                $.get(`/localites/${communeId}`, function(data) {
                    $('#localite').prop('disabled', false).empty().append('<option value="">Sélectionner une Localité</option>');
                    $('#perimetre').prop('disabled', true).empty().append('<option value="">Sélectionner un Périmètre</option>');

                    $.each(data, function(index, localite) {
                        $('#localite').append(`<option value="${localite.id}">${localite.nom}</option>`);
                    });
                }).fail(function() {
                    $('#localite').prop('disabled', true).empty().append('<option value="">Erreur de chargement</option>');
                });
            });

            $('#localite').on('change', function() {
                let localiteId = $(this).val();
                $.get(`/perimetres/${localiteId}`, function(data) {
                    $('#perimetre').prop('disabled', false).empty().append('<option value="">Sélectionner un Périmètre</option>');

                    $.each(data, function(index, perimetre) {
                        $('#perimetre').append(`<option value="${perimetre.id}">${perimetre.nom}</option>`);
                    });
                }).fail(function() {
                    $('#perimetre').prop('disabled', true).empty().append('<option value="">Erreur de chargement</option>');
                });
            });
        });

        $(document).ready(function() {
    // Lors du changement de la wilaya
    $('#wilaya').on('change', function() {
        let wilayaId = $(this).val();
        $('#moughataa').prop('disabled', false);
        $.get(`/moughataas/${wilayaId}`, function(data) {
            $('#moughataa').empty().append('<option value="">Sélectionner une Moughataa</option>');
            $.each(data, function(key, value) {
                $('#moughataa').append('<option value="'+ value.id +'">'+ value.nom_du_moughataa +'</option>');
            });
        });
        $('#commune').empty().prop('disabled', true);
        $('#localite').empty().prop('disabled', true);
        $('#perimetre').empty().prop('disabled', true);
    });

    // Lors du changement de la moughataa
    $('#moughataa').on('change', function() {
        let moughataaId = $(this).val();
        $('#commune').prop('disabled', false);
        $.get(`/communes/${moughataaId}`, function(data) {
            $('#commune').empty().append('<option value="">Sélectionner une Commune</option>');
            $.each(data, function(key, value) {
                $('#commune').append('<option value="'+ value.id +'">'+ value.nom_du_commune +'</option>');
            });
        });
        $('#localite').empty().prop('disabled', true);
        $('#perimetre').empty().prop('disabled', true);
    });

    // Lors du changement de la commune
    $('#commune').on('change', function() {
        let communeId = $(this).val();
        $('#localite').prop('disabled', false);
        $.get(`/localites/${communeId}`, function(data) {
            $('#localite').empty().append('<option value="">Sélectionner une Localité</option>');
            $.each(data, function(key, value) {
                $('#localite').append('<option value="'+ value.id +'">'+ value.nom_du_localite +'</option>');
            });
        });
        $('#perimetre').empty().prop('disabled', true);
    });

    // Lors du changement de la localité
    $('#localite').on('change', function() {
        let localiteId = $(this).val();
        $('#perimetre').prop('disabled', false);
        $.get(`/perimetres/${localiteId}`, function(data) {
            $('#perimetre').empty().append('<option value="">Sélectionner un Périmètre</option>');
            $.each(data, function(key, value) {
                $('#perimetre').append('<option value="'+ value.id +'">'+ value.nom_du_perimetre +'</option>');
            });
        });
    });
});

    </script>

</body>
</html>
