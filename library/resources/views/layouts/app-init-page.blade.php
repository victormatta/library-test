<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card {
            border: 1px solid rgba(0, 0, 0, 0.1); /* Borda leve */
        }
        
        .card:hover {
            transform: scale(1.05); /* Aumenta o tamanho do card ao passar o mouse */
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3); /* Sombra mais pronunciada */
        }
    </style>
</head>
<body class="bg-primary text-white vh-100 d-flex justify-content-center align-items-center">
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>