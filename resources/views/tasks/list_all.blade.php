<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
        }

        .bg-image {
            /* The image used */
            background-image: url("{{ asset('img/abstract-square.jpg') }}");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .bg-image::before {
            /* Add the blur effect */
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(2px);
            -webkit-filter: blur(2px);
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 90%;
        }
    </style>

</head>
<body>
<!-- Login Form  with transparent card -->
<div class="bg-image">
    <div class="container">
        <div class="card bg-transparent shadow">
            <div class="card-body">
                @php if(!empty($tasks)): @endphp
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>By</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->attributes->name }}</td>
                            <td>{{ $task->attributes->description }}</td>
                            <td>{{ $task->relationships->user_name }}</td>
                            <td>{{ $task->attributes->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @php else: @endphp
                <div class="alert alert-warning" role="alert">
                    <h4>No task found yet...</h4>
                </div>
                @php endif @endphp
            </div>
        </div>
    </div>
</div>

<!-- Jquery And Popper JS CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
