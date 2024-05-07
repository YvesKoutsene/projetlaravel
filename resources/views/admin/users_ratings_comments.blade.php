<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes et commentaires</title>
</head>
<body>
<h1>Notes et commentaires de tous les utilisateurs</h1>

<table border="1">
    <thead>
    <tr>
        <th>User</th>
        <th>Université</th>
        <th>Notes attribuées</th>
        <th>Commentaires</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($notesCommentaires as $nc)
        <tr>
            <td>{{ $nc['user']->name }}</td>
            <td rowspan="{{ $nc['notes']->count() + 1 }}">{{ $nc['notes']->isNotEmpty() ? $nc['notes']->first()->university->name : 'Aucune note attribuée' }}</td>
        </tr>
        @if($nc['notes']->isNotEmpty())
            @foreach ($nc['notes'] as $note)
                <tr>
                    <td>{{ $note->criteria->criteria_name }}</td>
                    <td>{{ $note->rating }}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="2">
                @if($nc['commentaires']->isNotEmpty())
                    @foreach ($nc['commentaires'] as $commentaire)
                        <p>{{ $commentaire->university->name }} - {{ $commentaire->comment }}</p>
                    @endforeach
                @else
                    <p>Aucun commentaire.</p>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
