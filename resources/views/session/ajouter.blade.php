<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD RAMEUR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Appel de la Feuille de style minifiée De l'extension Datepicker -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

</head>
  <body>
    <!-- Extension jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Extension DATEPICKER -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Noyau JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script pour activation du datepicker -->
    <script src="script.js"></script>


    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="form-group">
              <div class="form-group">
                  <div class="datepicker date input-group">
                      <input type="text" placeholder="Choisir une date" class="form-control" id="reservationDate">
                      <div class="input-group-append"><span class="input-group-text px-4"><i class="bi bi-calendar3"></i></span></div>
                  </div>
              </div>
                </div>
            </div>
        </div>
      </div>

        <div class="container">
            <h1>CREATION RAMEUR</h1>
            <div class="alert alert-success">
                @if (session('status'))
                   {{session('status')}}
               @endif
               @foreach ($errors->all() as $error)
                <li class="alert erreur"> {{$error}} </li>
               @endforeach
            </div>

           <form action="/ajouter-session/traitement" method="GET" class="form-group">
                <div class="row">
                    <div class="col">
                        <hr>
                        <form>
                            <div class="mb-3">
                                <label for="heure_session" class="form-label">Heure de session </label>
                                <input type="text" style="text-transform: uppercase;" maxlength="20" class="form-control" id="heure_session" name="heure_session" >
                            </div>

                            <div class="form-group">
                                <label for="date_session" class="form-label">Date prévu pour la session</label>
                                <div class="datepicker date input-group">
                                    <input type="text" placeholder="Choisir une date" class="form-control" id="reservationDate">
                                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                                </div>
                            </div>




                            <button type="submit" class="btn btn-primary">AJOUTER</button>
                            <br>
                            <br>
                            <a href="/rameur" class="btn btn-danger"> Revenir à la liste des rameurs</a>
                        </form>

                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
