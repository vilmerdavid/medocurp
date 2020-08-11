<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de ASSIST</title>

    <style>
    
        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }
        .badge-warning {
            color: #212529;
            background-color: #ffc107;
        }

        table {
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
       .np-logo {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 20%;
            height: 75px;
        }
    </style>


</head>
<body>
    
@include('fichas_pi.test.informe',['ficha'=>$ficha])

</body>
</html>