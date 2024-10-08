<?php 
    $navbarTitle = "Events";
    include_once 'navbar.php';
    include 'assets/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/events.css">
</head>
<body>
    <div class="content">
        <div class="metrics">
            <div class="announce">
                <div class="icon">
                    <i class="fa-regular fa-calendar"></i>
                </div>
                <div class="details">
                    <p>Upcoming</p>
                    <p>100</p>
                </div>
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-repeat"></i>
                </div>
                <div class="details">
                    <p>Ongoing</p>
                    <p>100</p>
                </div>
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="details">
                    <p>Completed</p>
                    <p>100</p>
                </div>
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="details">
                    <p>Cancelled</p>
                    <p>100</p>
                </div>     
            </div>
            <div class="announce">
                <div class="icon">
                    <i class="fa-solid fa-pen"></i>
                </div>
                <div class="details">
                    <p>Drafts</p>
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
    <script>
        // Fetch data from the server
        fetch('assets/getEvents.php')
        .then(response => response.json()) // Convert the response to JSON
        .then(data => {
            const tbody = document.getElementById('tbody1');
            
            // Loop through the data and create table rows
            data.forEach(event => {
                const row = document.createElement('tr');

                // Create table cells for each column
                const eventIdCell = document.createElement('td');
                eventIdCell.textContent = event.event_id;

                const titleCell = document.createElement('td');
                titleCell.textContent = event.title;

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
                row.appendChild(eventIdCell);
                row.appendChild(titleCell);
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