<?php
    $defaultImage = _path_asset('main-assets/img/Brown And Cream Beige Beauty Facial Skincare Instagram Story.png');
    $image = db_get_images(_asset_key('PRODUCT_IMAGES'), $service->id)[0]->full_url ?? '';
?>
<?php build('content') ?>
    <div class="container">
        <div class="card">
            <a class="btn" href="<?php echo _route('appointment:create')?>" 
                    style="background:#eee; color:black">❌ Cancel</a>
            <div class="card-body">
                <h2><?php echo $service->name?> - <?php echo $service->price_custom?></h2>
                <p><?php echo $service->description?></p>
                <div>
                    <h4>Products</h4>
                    <?php foreach($service->items as $key => $row) :?>
                        <span class="badge badge-primary"><?php echo $row->service?> (<?php echo $row->quantity_per_usage?>)</span>
                    <?php endforeach?>
                </div>
            </div>
        </div>

        <?php echo wDivider()?>
        <div class="card">
            <?php if(empty(request()->input('doctor_id'))) :?>
                <div class="card-body">
                    <h2>Doctors</h2>
                    <?php foreach($doctors as $key => $doctor) :?>
                        <a href="<?php echo _route('appointment:create', [
                            'page' => request()->input('page'),
                            'service_id' => request()->input('service_id'),
                            'doctor_id' => $doctor->user_id,
                            '#calendarSelection'
                        ])?>" class="box <?php echo $doctor->is_disabled ? 'disabled-link' : ''?>">
                            <div>
                                <h3><?php echo $doctor->first_name?> <?php echo $doctor->last_name?></h3>
                            </div>
                        </a>
                    <?php endforeach?>
                </div>
                <?php else:?>
                <div class="card-body">
                    <p style="margin: 0px;">Attending Doctor</p>
                    <h1 style="margin: 0px;">✅<?php echo $doctor->last_name?>, <?php echo $doctor->first_name?></h1>
                    <?php echo wDivider()?>
                    <a href="<?php echo _route('appointment:create', [
                        'page' => request()->get('page'),
                        'service_id' => request()->get('service_id')
                    ])?>" class="box">
                        <div>Change</div>
                    </a>
                </div>
            <?php endif?>
        </div>

        <?php echo wDivider()?>
        
            <?php
                $valid = true;
                $requiredFields = [
                    'service_id',
                    'doctor_id'
                ];

                foreach($requiredFields as $key => $row) {
                    if(!in_array($row, array_keys(request()->get()))) {
                        $valid = false;
                    }
                }
            ?>

            <?php if($valid) :?>
                <div class="card">
                    <div class="card-body">
                        <?php if(empty(request()->get('date'))) :?>
                            <div>
                                <h2>Calendar</h2>
                                <div class="calendar" id="calendarSelection">
                                    <div class="calendar-header">
                                    <button id="prev-month">&#8592;</button>
                                    <div id="month-year"></div>
                                    <button id="next-month">&#8594;</button>
                                    </div>
                                    <div class="calendar-days" id="calendar-days"></div>
                                </div>
                            </div>
                        <?php else:?>
                            <h3><?php echo request()->get('date')?></h3>
                            <?php echo wDivider()?>
                            <a href="<?php echo _route('appointment:create', [
                                'page' => request()->get('page'),
                                'service_id' => request()->get('service_id'),
                                'doctor_id' => request()->get('doctor_id')
                            ])?>" class="box">
                                <div>Change</div>
                            </a>
                            
                            <?php if(empty(request()->get('time'))) :?>
                                <h4 id="timeSelection">Available Time</h4>
                                <?php
                                    $generateTimeSlots = __generateTimeSlots(SCHEDULING['office_open'], SCHEDULING['office_close']);

                                    foreach($generateTimeSlots as $key => $row) {
                                        $time = explode('-', $row);
                                        $startTime = trim($time[0]);
                                        $isFullyBookedHour = false;

                                        if(isset($groupByStartTime[$startTime])) {
                                            if(count($groupByStartTime[$startTime]) >= SCHEDULING['max_customer_per_service_time_slot']) {
                                                $isFullyBookedHour = true;
                                            }
                                        }
                                        ?> 
                                            <a href="<?php echo _route('appointment:create', [
                                                'page' => request()->get('page'),
                                                'service_id' => request()->get('service_id'),
                                                'doctor_id' => request()->get('doctor_id'),
                                                'date' => request()->get('date'),
                                                'time' => seal($row),
                                                '#CustomerDetailForm'
                                            ])?>" class="book-appointment box <?php echo $isFullyBookedHour ? 'disabled-link' : ''?>">
                                            <div><?php echo $row?></div>
                                        </a>
                                        <?php
                                    }
                                ?>
                            <?php else:?>
                                <h4>Time Reserved : <?php echo unseal(request()->get('time'))?></h4>
                                <a href="<?php echo _route('appointment:create', [
                                    'page' => request()->get('page'),
                                    'service_id' => request()->get('service_id'),
                                    'doctor_id' => request()->get('doctor_id'),
                                    '#calendarSelection'
                                ])?>" class="box">
                                    <div>Change</div>
                                </a>
                            <?php endif?>
                            
                        <?php endif?>
                    </div>
                    
                </div> 
            <?php endif?>

            <?php if(!empty(request()->get('time'))) :?>
                <div class="card">
                    <div class="card-body">
                        <h4 id="CustomerDetailForm">Customer Information </h4>
                        <?php
                            Form::open([
                                'method' => 'post'
                            ]);

                            Form::hidden('guest_data','guest_date');
                        ?>
                        <div class="form-group">
                            <?php __($userForm->getRow('first_name')) ?>
                        </div>

                        <div class="form-group">
                            <?php __($userForm->getRow('last_name')) ?>
                        </div>

                        <div class="form-group">
                            <?php __($userForm->getRow('email')) ?>
                        </div>

                        <div class="form-group">
                            <?php __($userForm->getRow('phone_number', [
                                'required' => false
                            ])) ?>
                        </div>

                        <input type="submit" role="submit" class="btn" style="background-color: #4caf50; color:#fff" value="Book Appointment">

                        <?php Form::close() ?>
                    </div>
                </div> 
            <?php endif?>
    </div>
<?php endbuild()?>
<?php build('styles') ?>
    <style>
        a.box {
            text-decoration: none;
            color: #000;
            display: inline-block;
            border: 1px solid #000;
            padding: 12px;
            border-radius: 5px;
            margin-right: 20px;
            margin-bottom: 30px;
        }

        a.box:hover {
            background-color: rgba(154,111,70,.4);
            color: #fff;
        }


        .calendar {
        width: 320px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 20px;
        }

        .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .calendar-header button {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        }

        .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        text-align: center;
        margin-top: 10px;
        }

        .day a {
        display: block;
        padding: 10px;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
        transition: background 0.2s, color 0.2s;
        }

        .day a:hover {
        background: #007bff;
        color: white;
        }

        #month-year {
        font-weight: bold;
        }
        </style>
<?php endbuild()?>

<?php build('scripts')?>
<script>
    const daysContainer = document.getElementById("calendar-days");
    const monthYear = document.getElementById("month-year");
    const prevBtn = document.getElementById("prev-month");
    const nextBtn = document.getElementById("next-month");

    let currentDate = new Date();

    // Example: list of disabled dates (YYYY-MM-DD)
    const disabledDates = [
        
    ];

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        if(!monthYear) {
            return;
        }
        monthYear.textContent = `${monthNames[month]} ${year}`;
        daysContainer.innerHTML = "";

        // Blank days before month start
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement("div");
            daysContainer.appendChild(emptyDiv);
        }

        // Days with links
        for (let day = 1; day <= lastDate; day++) {
            const dayDiv = document.createElement("div");
            dayDiv.classList.add("day");

            const dateStr = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
            const dateObj = new Date(year, month, day);
            const dayOfWeek = dateObj.getDay(); // 0 = Sunday, 6 = Saturday

            const link = document.createElement("a");
            link.textContent = day;

            // Disable weekends, past dates, or custom disabled dates
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Ignore time part

            if (disabledDates.includes(dateStr)) {
                // Custom disabled dates (red)
                link.classList.add("disabled");
                link.style.color = "red";
                link.style.pointerEvents = "none";
            } else if (dateObj < today) {
                // Past dates (light gray)
                link.classList.add("disabled");
                link.style.color = "lightgray";
                link.style.pointerEvents = "none";
            } else {
                // Normal clickable day
                link.href = updateDateInUrl(window.location.href, dateStr);
            }


            dayDiv.appendChild(link);
            daysContainer.appendChild(dayDiv);
        }
    }


    // Reuse your date update function
    function updateDateInUrl(url, newDate) {
    const [base, queryString] = url.split("?");
    const params = new URLSearchParams(queryString);
    params.set("date", newDate);
    return `${base}?${params.toString()}#timeSelection`;
    }

    if(prevBtn) {
        // Navigation
        prevBtn.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });
    }
    

    if(nextBtn) {
        nextBtn.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });
    }

    // Initial render
    renderCalendar();

    document.querySelectorAll('.disabled-link').forEach(el => {
        el.style.pointerEvents = 'none';
        el.style.opacity = '0.9';  // optional: makes them look disabled
        el.style.backgroundColor = 'red';
    });

    <?php if(!empty(whoIs())) :?>
        var elems = document.getElementsByClassName('book-appointment');
        var confirmIt = function (e) {
            if (!confirm('Are you sure you want to book this appointment?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    <?php endif?>
</script>
<?php endbuild()?>
<?php loadTo('appointment_booking/base')?>