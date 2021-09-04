<?php
    $PAGE_TITLE = "Календарь";
    $PAGE_JS = Array();  
    include "include/header.php";
?>

    <div class="for-cal" id="for-cal">
        <div id="calendar"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
<?php
    include "include/footer.php";
?>