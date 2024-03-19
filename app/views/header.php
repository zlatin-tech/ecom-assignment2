<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?url=Main/index">Landing Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?url=Contact/index">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?url=Contact/read">See Messages</a>
                </li>
                <li class="nav-item">
                    <form action="" method="POST">
                        <input type="text" name="searchWord" placeholder="search">
                        <input type="submit" name="submit" value="Search">
                    </form>    
                </li>
            </ul>
        </div>
    </nav>