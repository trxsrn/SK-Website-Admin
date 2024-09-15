document.getElementById("openNewAnnouncementFormbtn").addEventListener("click", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "newAnnouncement.html", true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        // Insert fetched content into modal body
        document.getElementById("newAnnouncementmodalBody").innerHTML = xhr.responseText;
        // Show the modal
        var modal = new bootstrap.Modal(document.getElementById('newAnnouncementModal'));
        modal.show();
        // hotelgenerateImageInputs();
        // hotelgenerateID();
    }
    };
    xhr.send();
});