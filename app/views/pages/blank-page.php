<?php build('content') ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Your Appointment has been sent</h1>
                <p>your appointment details has been sent to your email</p>
            </div>
        </div>
        
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
<?php loadTo('appointment_booking/base')?>