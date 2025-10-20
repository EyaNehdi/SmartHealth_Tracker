<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h1>Nouveau message de contact</h1>

    <p><strong>De :</strong> {{ $data['name'] }} ({{ $data['email'] }})</p>
    <p><strong>Sujet :</strong> {{ $data['subject'] }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $data['message'] }}</p>

    <hr>
    <p><small>Envoyé le : {{ now()->format('d/m/Y H:i') }}</small></p>
</body>
</html>
