<?php 
    $navbarTitle = "Announcements";
    include_once 'navbar.php' ;
    include 'assets/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/announcements.css">
</head>
<body>
    <div class="content">
        <div class="metrics">
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-pen"></i>
                </div>
                <div class="details">
                    <p>Draft</p>
                    <p>100</p>
                </div>
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div class="details">
                    <p>Published</p>
                    <p>100</p>
                </div>
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-box-archive"></i>
                </div>
                <div class="details">
                    <p>Archived</p>
                    <p>100</p>
                </div>
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-hourglass-start"></i>
                </div>
                <div class="details">
                    <p>Scheduled</p>
                    <p>100</p>
                </div>     
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <div class="details">
                    <p>Total</p>
                    <p>100</p>
                </div>  
            </div>
            
        </div>
        <div class="announcements">
            <form action="" method="post">
                <div class="searchbytext">
                    <input type="text" placeholder="Enter any keywords"/>
                </div>
                <div class="sortandfilter">
                    <label for="searchby">Search by:</label>
                    <input type="date" name="searchby" id="">
                    <label for="filter">Filter</label>
                    <select name="filter" id="filter">
                        <option value="Active">Active</option>
                        <option value="Drafts">Drafts</option>
                        <option value="Archived">Archived</option>
                    </select>
                </div>
                <div class="addnew">
                    <button id="openNewAnnouncementFormbtn" data-bs-toggle="modal" data-bs-target="#newAnnouncementModal">NEW ANNOUNCEMENT</button>
                </div>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Date Modified</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody1">
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/openForm.js"></script>
    <script>
        // Fetch data from the server
        fetch('assets/getAnnouncements.php')
        .then(response => response.json()) // Convert the response to JSON
        .then(data => {
            const tbody = document.getElementById('tbody1');
            
            // Loop through the data and create table rows
            data.forEach(event => {
                const row = document.createElement('tr');

                // Create table cells for each column
                const subjectCell = document.createElement('td');
                subjectCell.textContent = event.subject;

                const date_createdCell = document.createElement('td');
                date_createdCell.textContent = event.date_created;

                const statusCell = document.createElement('td');
                statusCell.textContent = event.status;

                // Action cell (could be buttons or links)
                const actionCell = document.createElement('td');

                //Edit button 
                const editButton = document.createElement('button');
                editButton.innerHTML = '<i class="fas fa-edit"></i> Edit';  // Icon and text
                actionCell.appendChild(editButton);
                
                // Delete button 
                const deleteButton = document.createElement('button');
                deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i> Delete';  // Icon only
                actionCell.appendChild(deleteButton);

                //Publish button
                const publishButton = document.createElement('button');
                publishButton.innerHTML = '<i class="fa-solid fa-upload"></i> Publish';  // Icon and text
                actionCell.appendChild(publishButton);
                
                //Duplicate button 
                const duplicateButton = document.createElement('button');
                duplicateButton.innerHTML = '<i class="fa-solid fa-copy"></i> Duplicate';  // Icon only
                actionCell.appendChild(duplicateButton);

                // Append cells to the row
                row.appendChild(subjectCell);
                row.appendChild(date_createdCell);
                row.appendChild(statusCell);
                row.appendChild(actionCell);

                // Append the row to the tbody
                tbody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
    </script>
</body>
</html>