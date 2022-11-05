<?php
use twbs\bootstrap;

?>

<html lang="ru_RU">
<head>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/lineicons.css" />
    <link rel="stylesheet" href="/assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.rtl.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-grid.rtl.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-reboot.rtl.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-utilities.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-utilities.rtl.css" />
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/books" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="20" height="40"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">Меню</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/books" class="nav-link">All Books</a></li>
                <li class="nav-item"><a href="/books/create" class="nav-link">Add Book</a></li>
                <li class="nav-item"><a href="/books/year" class="nav-link">Search For Year</a></li>
                <li class="nav-item"><a href="/books/top" class="nav-link">Top 100 authors</a></li>
                <li class="nav-item"><a href="/books/genre" class="nav-link">Genre</a></li>
            </ul>
        </header>
    </div>
</head>
<body>
