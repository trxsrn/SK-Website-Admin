<?php 
    $navbarTitle = "Dashboard";
    include_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <div class="content">
        <div class="greetings">
            <p>Good Morning</p>
            <h1>Administrator</h1>
        </div>
        <div class="section">
            <div class="metrics">
                <div class="announce">
                    <div class="summary">
                        <div class="icon">
                            <i class="fa-solid fa-bullhorn icon"></i>
                        </div>
                        <div class="count">
                            <p class="count-label">Posted Announcements<i class="fa-solid fa-chevron-right" style="font-size: 12px"></i></p>
                            <p class="total-count">100</p>
                        </div>
                    </div>
                    <div class="details">
                        <div class="total">
                            <p class="count-label">Total</p>
                            <p class="sub-total">100</p>
                        </div>
                        <div class="total">
                            <p class="count-label">Drafts</p>
                            <p class="sub-total">100</p>
                        </div>
                    </div>
                </div>
                <div class="announce">
                    <div class="summary">
                        <div class="icon">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="count">
                            <p class="count-label">Upcoming Events</p>
                            <p class="total-count">100</p>
                        </div>
                    </div>
                    <div class="details">
                        <div class="total">
                            <p class="count-label">Total</p>
                            <p class="sub-total">100</p>
                        </div>
                        <div class="total">
                            <p class="count-label">Drafts</p>
                            <p class="sub-total">100</p>
                        </div>
                    </div>
                </div>
                <div class="announce">
                    <div class="summary">
                        <div class="icon">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <div class="count">
                            <p class="count-label">Projects</p>
                            <p class="total-count">100</p>
                        </div>
                    </div>
                    <div class="details">
                        <div class="total">
                            <p class="count-label">Total</p>
                            <p class="sub-total">100</p>
                        </div>
                        <div class="total">
                            <p class="count-label">Drafts</p>
                            <p class="sub-total">100</p>
                        </div>
                    </div>
                </div>
                <div class="announce">
                    <div class="summary">
                        <div class="icon">
                            <i class="fa-solid fa-comment"></i>
                        </div>
                        <div class="count">
                            <p class="count-label">Feedbacks</p>
                            <p class="total-count">100</p>
                        </div>
                    </div>
                    <div class="details">
                        <div class="total">
                            <p class="count-label">Total</p>
                            <p class="sub-total">100</p>
                        </div>
                        <div class="total">
                            <p class="count-label">Drafts</p>
                            <p class="sub-total">100</p>
                        </div>
                    </div>
                </div>
                <div class="announce">
                    <div class="summary">
                        <div class="icon">
                            <i class="fa-regular fa-file"></i>
                        </div>
                        <div class="count">
                            <p class="count-label">Reports</p>
                            <p class="total-count">100</p>
                        </div>
                    </div>
                    <div class="details">
                        <div class="total">
                            <p class="count-label">Total</p>
                            <p class="sub-total">100</p>
                        </div>
                        <div class="total">
                            <p class="count-label">Drafts</p>
                            <p class="sub-total">100</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="calendar-of-events">
                    <p class="title">Calendar of Events</p>
                    <div class="calendar">
                        <div class="month-year" id="month-year"></div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tbody id="calendar-body">
                                <!-- Calendar dates will be generated here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="events">
                        <p class="header">Event</p>
                        <p>No scheduled event for today. </p>   
                    </div>
                </div>
                <div class="activity-log">
                    <p class="title">Activity Log</p>
                    <table>
                        <thead>
                            <th>Activity</th>
                            <th>Time</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function generateCalendar() {
        const now = new Date();
        const currentYear = now.getFullYear();
        const currentMonth = now.getMonth();
        const today = now.getDate();

        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        document.getElementById('month-year').textContent = monthNames[currentMonth] + " " + currentYear;

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

        const calendarBody = document.getElementById('calendar-body');
        calendarBody.innerHTML = ''; // Clear previous calendar

        let date = 1;
        for (let i = 0; i < 6; i++) { // 6 rows (weeks)
            const row = document.createElement('tr');

            for (let j = 0; j < 7; j++) { // 7 columns (days)
                const cell = document.createElement('td');

                if (i === 0 && j < firstDay) {
                    cell.textContent = '';
                } else if (date > lastDate) {
                    break;
                } else {
                    cell.textContent = date;
                    if (date === today) {
                        cell.classList.add('today');
                    }
                    date++;
                }
                row.appendChild(cell);
            }
            calendarBody.appendChild(row);
        }
    }

    generateCalendar();
    </script>    
</body>
</html>