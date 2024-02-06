
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLANNIFICATION SESSION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <div class="container text-center">
            <div class="row">
                <div class="col s12">
                    <h1>SESSION CHOISI</h1>
                    <br>
                    <br>
                    <a href ="/ajouter-session" class="btn btn-primary">Ajouter une session</a>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Valide</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sessions as $session)
                            <tr>
                                <td>{{ $session->id }}</td>
                                <td>{{ $session->date }}</td>
                                <td>{{ $session->heure }}</td>
                                <td>{{ $session->valide }}</td>
                                <td>{{ $session->created_at }}</td>
                                <td>
                                    <a href="/modifier-session/{{ $session->id }}" class="btn btn-primary">Modifier</a>
                                    <a href="/supprimer-session/{{ $session->id }}" class="btn btn-danger">Supprimer</a>
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
