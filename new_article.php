<?php 
    $navbarTitle = "News";
    include_once 'navbar.php' 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/new_article.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">  
            <div class="headers">
                <div class="ribbon">
                    <div class="text-content">
                        <span>L</span>
                    </div>
                </div>
                <div class="titlebar">
                    <div class="back">
                        <p><a href="news.php">News</a></p>
                    </div>
                </div>
                <div class="buttons">
                        <button type="submit" class="schedbtn">
                            <i class="fa-solid fa-clock"></i> SCHEDULE PUBLISH
                        </button>
                        <button type="submit" class="draftbtn">
                            <i class="fa fa-save"></i> SAVE AS DRAFT
                        </button>
                        <button type="submit" class="publishbtn">
                            <i class="fa-solid fa-upload"></i> PUBLISH
                        </button>
                </div>
            </div>
            <div class="form">
                <div class="img">
                    <img src="https://via.placeholder.com/320x250" style="cursor: pointer;" id="preview" onclick="selectimage()" height="250px" width="320px">
                    <input type="file" name="" id="image" onchange="previewImage()" style="display: none;" accept="image/*">
                    <label for="Source">Source</label>
                    <input type="text" name="Source" class="text-important" placeholder="eg. Facebook: Trixie Soriano">
                    <label for="Link">Link</label>
                    <input type="text" name="Link" class="text-important" placeholder="https://www.facebook.com">
                    <label for="tags">Tags</label>
                    <input type="text" name="tags" class="text-important" required/>   
                </div>
                <div class="article">
                <label for="article_id">Article ID</label>
                <input type="text" name="article_id" class="text-important" disabled/>
                    <label for="title">Title</label>
                    <input type="text" name="title" class="text-important" required/>
                    <label for="body">Body</label>
                    <textarea name="body" id="" cols="30" rows="80" class="text-important" required></textarea>
                </div>
            </div>
        </form>
    </div> 
    <script>
        function selectimage(){
            document.getElementById("image").click();
        }

        function previewImage() {
            var input = document.getElementById('image'); // Get the file input element
            var file = input.files[0]; // Get the selected file

            if (file) {
                var reader = new FileReader(); // Create a FileReader to read the file

                reader.onload = function(e) {
                    var preview = document.getElementById('preview'); // Get the preview image element
                    preview.src = e.target.result; // Set the preview image's src to the file data URL
                };

                reader.readAsDataURL(file); // Read the file and trigger onload
            }
        }
    </script>
</body>
</html>