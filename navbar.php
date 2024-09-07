<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISLAP ADMIN</title>
    <link rel="icon" href="assets/img/sk_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="topnav-bar">
        <div class="menu">
            <li onclick="openNav()"><i class="fa-solid fa-bars"></i></li>
        </div>
        <div class="topbar-left">
            <li onclick="toggleMode()"><i id="mode-icon" class="fa-solid fa-moon"></i></li>
            <li><i class="fa-solid fa-bell"></i></li>
            <li><i class="fa-solid fa-gear"></i></li>
            <li><i class="fa-solid fa-user"></i> &nbsp &nbsp Administrator &nbsp &nbsp<i class="fa-solid fa-caret-down"></i></li>
        </div>
    </div>
    <div class="sidenav" id="sidenav">
        <li onclick="closeNav()"><i class="fa-solid fa-x closebtn"></i></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="head-sublinks"><a href="">Content Management <i class="fa-solid fa-caret-down"></i></a>
            <ul class="sublinks">
                <li><a href="content_editor.php">Content Editor</a></li>
                <li><a href="banner.php">Banner</a></li>
                <li><a href="">Announcements</a></li>
                <li><a href="">Events</a></li>
                <li><a href="">Projects</a></li>
                <li><a href="">Transparency</a></li>
                <li><a href="">Governance</a></li>
                <li><a href="">Surveys and Polls</a></li>
            </ul>
        </li>
        <li class="head-sublinks"><a href="">Community Engagement <i class="fa-solid fa-caret-down"></i></a>
            <ul class="sublinks">
                <li><a href="">Public Feedback</a></li>
                <li><a href="">Polls & Survey Result</a></li>
            </ul>
        </li>
        <li class="head-sublinks"><a href="">Site Settings <i class="fa-solid fa-caret-down"></i></a>
            <ul class="sublinks">
                <li><a href="">General Settings</a></li>
                <li><a href="">SEO Settings</a></li>
            </ul>
        </li>
        <li class="head-sublinks"><a href="">Security <i class="fa-solid fa-caret-down"></i></a>
            <ul class="sublinks">
                <li><a href="">Activity Log</a></li>
                <li><a href="">Access Control</a></li>
                <li><a href="">Back Up & Control</a></li>
            </ul>
        </li>
        <li class="head-sublinks"><a href="">Reports & Analytics <i class="fa-solid fa-caret-down"></i></a>
            <ul class="sublinks">
                <li><a href="">Site Analytics</a></li>
                <li><a href="">Content Performance</a></li>
            </ul>
        </li>
        <li class="head-sublinks"><a href="">Help & Support <i class="fa-solid fa-caret-down"></i></a></li>
    </div>
    <script>
        function openNav() {
            document.getElementById("sidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("sidenav").style.width = "0";
        }

        function toggleMode() {
            document.body.classList.toggle("dark-mode");
            const icon = document.getElementById("mode-icon");
            if (document.body.classList.contains("dark-mode")) {
                icon.classList.remove("fa-moon");
                icon.classList.add("fa-sun");
            } else {
                icon.classList.remove("fa-sun");
                icon.classList.add("fa-moon");
            }
        }
    </script>
</body>
</html>
