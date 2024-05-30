<!-- resources/views/emails/notificar.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Notificación</title>
</head>
<body>
    <h1>Enviar Notificación</h1>

    <?php
        use App\Notifications\NuevoMensaje;
        use Illuminate\Support\Facades\Notification;

        Notification::route('mail', 'correo@example.com')->notify(new NuevoMensaje());
    ?>
</body>
</html>