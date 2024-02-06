<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD RAMEUR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
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

           <form action="/ajouter/traitement" method="GET" class="form-group">
                <div class="row">
                    <div class="col">
                        <hr>
                        <form>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" style="text-transform: uppercase;" maxlength="20" class="form-control" id="nom" name="nom" >
                            </div>
                            <div class="mb-3">
                                <label for="pre" class="form-label">Prénom</label>
                                <input type="text" style="text-transform: uppercase;" maxlength="20" class="form-control" id="pre" name="pre" >
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="age" >
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">@mail</label>
                                <input type="text" class="form-control" id="email" name="email" >
                            </div>
                            <div class="mb-3">
                              <label for="tel" class="form-label">Téléphone</label>
                             <input type="text" class="form-control" id="tel" name="tel" >
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Poste</label>
                               <input type="text" class="form-control" id="niv" name="niv" >
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
