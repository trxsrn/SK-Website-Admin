<?php 
    $navbarTitle = "Content Editor";
    include_once 'navbar.php' 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/content_editor.css">
</head>
<body>
    <div class="content">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Home')" id="defaultOpen">Home Page <i class="fa-solid fa-chevron-right"></i></button>
            <button class="tablinks" onclick="openTab(event, 'About')">About<i class="fa-solid fa-chevron-right"></i></button>
            <button class="tablinks" onclick="openTab(event, 'Content')">The Council<i class="fa-solid fa-chevron-right"></i></button>
            <button class="tablinks" onclick="openTab(event, 'Contact')">Contact<i class="fa-solid fa-chevron-right"></i></button>
        </div>

        <div id="Home" class="tabcontent">
            <div class="headers">
                <h2>Home Page</h2>
                <div class="buttons">
                    <button class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button class="btn save-btn"><i class="fa-regular fa-floppy-disk"></i>Save</button>
                </div>
            </div>
            <hr>
            <h3>Banner</h3>
            <button class="banner-preview">Choose Image</button>
           <input type="file"> 
           <input type="file"> 
           <input type="file"> 
           <input type="file"> 
           <input type="file"> 
           <h3>SK Chairman Thoughts</h3>
           <input type="file">
           <input type="text">
           <input type="text">
        </div>

        <div id="About" class="tabcontent">
            <div class="headers">
                <h2>About Us</h2>
                <div class="buttons">
                    <button class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button class="btn save-btn"><i class="fa-regular fa-floppy-disk"></i>Save</button>
                </div>
            </div>
            <hr>
            <label for="">Description</label>
            <textarea name="" id=""></textarea>
            <label for="">Mission</label>
            <textarea name="" id=""></textarea>
            <label for="">Vision</label>
            <textarea name="" id=""></textarea>  
        </div>

        <div id="Content" class="tabcontent">
            <div class="headers">
                <h2>Council</h2>
                <div class="buttons">
                    <button class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button class="btn save-btn"><i class="fa-regular fa-floppy-disk"></i>Save</button>
                </div>
            </div>
            <hr>
        </div>

        <div id="Contact" class="tabcontent">
            <div class="headers">
                <h2>Contact</h2>
                <div class="buttons">
                    <button class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button class="btn save-btn"><i class="fa-regular fa-floppy-disk"></i>Save</button>
                </div>
            </div>
            <hr>
            <label for="">Facebook</label>
            <input type="text">
            <label for="">Twitter</label>
            <input type="text">
            <label for="">Youtube</label>
            <input type="text">
            <label for="">Instagram</label>
            <input type="text">
            <label for="">Phone Number</label>
            <input type="text">
            <label for="">Landline</label>
            <input type="text">
            <label for="">Location</label>
            <input type="text">
        </div>


    <script>
    function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</body>
</html>