
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD RAMEUR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <div class="container text-center">
            <div class="row">
                <div class="col s12">
                    <h1>CRUD RAMEUR</h1>
                    <br>
                    <hr>
                    <a href ="/ajouter" class="btn btn-primary">Ajouter un rameur</a>
                    <br>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Iden</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Poste</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rameurs as $rameur)
                            <tr>
                                <td>{{ $rameur->id }}</td>
                                <td>{{ $rameur->nom }}</td>
                                <td>{{ $rameur->pre }}</td>
                                <td>{{ $rameur->age }}</td>
                                <td>{{ $rameur->email }}</td>
                                <td>{{ $rameur->tel }}</td>
                                <td>{{ $rameur->niv }}</td>
                                <td>{{ $rameur->created_at }}</td>
                                <td>
                                    <a href="/modifier/{{ $rameur->id }}" class="btn btn-primary">Modifier</a>
                                    <a href="/supprimer/{{ $rameur->id }}" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </body>
</html>
