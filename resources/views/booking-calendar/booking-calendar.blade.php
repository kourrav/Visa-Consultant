<script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<div class="container">
    <h2>Book an Appointment</h2>

    <!-- Calendar section -->
    <div id="calendar"></div>

    <!-- Time slots -->
    <div id="time-slots">

    </div>

    <!-- Booking form -->
    <form action="/booking" method="POST">
        @csrf
        <input type="hidden" name="startTime" id="startTime">
        <input type="hidden" name="endTime" id="endTime">
        <div>
            <label for="name">First and Last Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email (optional)</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="address">Address (optional)</label>
            <input type="text" id="address" name="address">
        </div>
        <div>
            <label for="phone">Phone Number (optional)</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div>
            <label for="notes">Notes (optional)</label>
            <textarea id="notes" name="notes"></textarea>
        </div>
        <button type="submit">Book</button>
    </form>
</div>

<!-- Include FullCalendar and initialize -->
<script src="https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize the calendar with available slots
        $('#calendar').fullCalendar({
            events: @json($availableSlots),
            selectable: true,
            select: function (start, end) {
                // Set selected time range in hidden inputs
                $('#startTime').val(start.format());
                $('#endTime').val(end.format());
            }
        });
    });
</script>