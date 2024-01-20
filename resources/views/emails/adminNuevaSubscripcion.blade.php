<!DOCTYPE html>
<html>
<head>
    <title>Nueva Suscripción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.5;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nueva Suscripción</h1>
        <p>Hola Administrador,</p>
        <p>Se ha registrado un nuevo suscriptor con el siguiente correo electrónico: <strong>{{ $email }}</strong></p>
        <p>Revisa el panel de administración para más detalles.</p>
        <p>Saludos cordiales,</p>
        <p>El equipo de Cookisfy</p>
        <a href="http://www.cookisfy.local/admin/admin-dashboard" class="btn-primary">Ir al Panel de Administración</a>
    </div>
</body>
</html>
