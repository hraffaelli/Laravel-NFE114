
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
            <h1>MODIFICATION RAMEUR</h1>
            <div class="alert alert-success">
                @if (session('status'))
                   {{session('status')}}
               @endif
                @foreach ($errors->all() as $error)
                <li class="alert erreur"> {{$error}} </li>
               @endforeach
            </div>

           <ul>
           @foreach ($errors->all() as $error)
                <li class="alert erreur"> {{$error}} </li>

           @endforeach
           </ul>

           <form action="/modifier-traitement" method="GET" class="form-group">
            @csrf

            <input type="text" class="form-control" id="id" name="id"  style="display: none;" value="{{ $rameurs->id}}">
            <input type="text" class="form-control" id="id_user_fk" name="id_user_fk"  style="display: none;" value="{{ $rameurs->id_user_fk}}">

                <div class="row">
                    <div class="col">
                        <hr>
                        <form>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="{{ $rameurs->nom}}">
                            </div>
                            <div class="mb-3">
                                <label for="pre" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="pre" name="pre" value="{{ $rameurs->pre}}">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="{{ $rameurs->age}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">@mail</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $rameurs->email}}">
                            </div>
                            <div class="mb-3">
                              <label for="tel" class="form-label">Téléphone</label>
                             <input type="text" class="form-control" id="tel" name="tel" value="{{ $rameurs->tel}}" >
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Poste</label>
                               <input type="text" class="form-control" id="niv" name="niv" value="{{ $rameurs->niv}}">
                            </div>

                            <button type="submit" class="btn btn-primary">MODIFIER</button>
                            <br>
                            <br>
                            <a href="/rameur" class="btn btn-danger"> Revenir à la liste des rameurs</a>
                        </form>

                    </div>
                </div>
            </form>
        </div>

  </body>
</html>
