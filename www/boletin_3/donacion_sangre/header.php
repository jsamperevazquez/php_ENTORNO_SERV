<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Gestión Donantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container-fluid {
            flex: 1;
        }

        input::placeholder {
            color: #a0a0a0;
            font-style: italic;
        }

        table {
            margin: 40px auto;
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: white;
        }

        tr:hover {
            background: #e9f3ff;
        }

        .btn-borrar {
            color: red;
            text-decoration: none;
        }

        .btn-modificar {
            color: green;
            text-decoration: none;
        }

        h2 {
            text-align: center;
            color: burlywood;
            font-family: 'Monaco';
        }
    </style>
</head>

</head>
<header class="bg-primary text-white text-center-py-3">
    <style>
        h1 {
            text-align: center;
        }

        header p {
            text-align: center;
        }
    </style>
    <h1>GESTIÓN DE DONANTES</h1>
    <p>Aplicación para gestión de donantes</p>
</header>

<body>