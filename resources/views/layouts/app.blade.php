<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coalition V2 Dev Test</title>
    <style>
        .container{
            margin: 100px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-outline {
            margin-bottom: 20px;
        }

        .form-outline label.form-label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            transition: border-color 0.2s, box-shadow 0.2s;
            color: black;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 8px rgba(128, 189, 255, 0.25);
            outline: none;
        }

        .form-check-label {
            font-size: 14px;
            color: #6c757d;
        }

        .btn {
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.2s, box-shadow 0.2s;
        }

        .btn-info {
            background-color: #17a2b8 !important;
            border-color: #17a2b8;
            color: #fff;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .invalid-feedback {
            display: block;
            color: #e3342f;
            font-size: 14px;
        }

        @media (max-width: 576px) {
            form {
                padding: 15px;
            }

            .btn {
                font-size: 16px;
                padding: 8px 15px;
            }

            .form-control {
                font-size: 14px;
            }
        }



        .edit-button {
            background-color: lightblue;
            border: none;
            color: white;
            padding: 7px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        table {
            margin: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            color: black;
        }


    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav>

</nav>

<main>
    @yield('content')
</main>

<footer>

</footer>

@stack('ajax-script')
</body>
</html>
