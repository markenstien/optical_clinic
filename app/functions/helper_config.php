<?php   

    /**
     * REQUIRE HERE THE HELPER LOADERS
     */


    function __generateTimeSlots($start = "08:00", $end = "22:00", $intervalHours = SCHEDULING['service_time_per_time_slot']) {
        $slots = [];

        $startTime = new DateTime($start);
        $endTime = new DateTime($end);

        while ($startTime < $endTime) {
            $slotStart = $startTime->format('h:i A');
            $startTime->modify("+{$intervalHours} hours");
            $slotEnd = $startTime->format('h:i A');

            $slots[] = "$slotStart - $slotEnd";
        }
        return $slots;
    }