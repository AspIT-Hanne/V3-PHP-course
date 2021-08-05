<?php
    // Extract current page from $_SERVER variable and separate path in array
    // folder1  /  folder2  /  folder3  /  filename.ext
    $temp = explode("/", $_SERVER['PHP_SELF']);
    // move last entry of exploded array (which is the filename + extension) to array currentpage
    $currentpage = $temp[count($temp)-1];
    // divide filename and extension and move only filename to variable currentpage
    $currentpage = explode(".", $currentpage)[0]."active";
    // set the variable of the current page to "active" - if current page is diary then $$currentpage is $diaryactive and this variable now contains the value "active" to use in adding the "active" css-class and style the current page as active for the user
    $$currentpage = "active";
?>

<nav class="navbar navbar-light navbar-expand-lg bg-light mb-3">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?php echo $indexactive; ?>">Forside</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $plantbaseactive; ?>" href="plantbase.php">Plantebasen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $calendaractive; ?>" href="calendar.php">Kalender</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $diaryactive; ?>" href="diaryIJTEST.php">Min havedagbog</a>
        </li>
    </ul>
</nav>