<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Filter</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="filter-container">
        <button class="filter-button">Сите настани</button>
        <div class="dropdown">
            <button class="dropbtn">Град</button>
            <div class="dropdown-content">
                <a href="#">City 1</a>
                <a href="#">City 2</a>
                <a href="#">City 3</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Локал?</button>
            <div class="dropdown-content">
                <a href="#">Venue 1</a>
                <a href="#">Venue 2</a>
                <a href="#">Venue 3</a>
            </div>
        </div>
        <button class="filter-button">BRAINSTER</button>
        <button class="filter-button">МОБ</button>
        <button class="filter-button">Лабораториум</button>
        <input type="text" class="search-input" placeholder="search">
    </div>
</body>
</html>
