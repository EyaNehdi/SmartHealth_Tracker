<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau paiement reçu</title>
</head>
<body>
    <h2>💰 Nouveau paiement reçu</h2>

    <p>Bonjour Admin,</p>

    <p>L'utilisateur <strong>{{ $user->name }}</strong> ({{ $user->email }})
       vient de payer pour l'activité suivante :</p>

    <ul>
        <li><strong>Nom de l’activité :</strong> {{ $activity->nom }}</li>
        <li><strong>Prix :</strong> {{ $activity->prix }} €</li>
        <li><strong>Date du paiement :</strong> {{ now()->format('d/m/Y H:i') }}</li>
    </ul>

    <p>Connectez-vous au tableau de bord pour consulter les détails.</p>

    <p>– Équipe {{ config('app.name') }}</p>
</body>
</html>
