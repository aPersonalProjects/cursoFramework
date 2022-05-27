<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo isset($d->tittle) ? $d->tittle . ' - ' . get_sitename() : 'Bienvenido - ' . get_sitename(); ?></title>
    <style>
        .bg-gradient {
            background: rgba(80, 80, 80, 1);
        }
    </style>
</head>

<body class="<?php echo isset($d->bg) && $d->bg === 'dark' ? 'bg-gradient' : 'bg-light' ?>" style="padding: 200px 0px;">
    <!-- Ends inc_header .php-->