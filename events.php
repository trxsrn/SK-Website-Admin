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
            <input type="text" placeholder="Search.." class="form-control" id="searchInput" oninput="searchTable()">
            <button>Make new Event</button>
            <table width="100%">
                    <thead>
                        <tr>
                            <th>Event ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
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