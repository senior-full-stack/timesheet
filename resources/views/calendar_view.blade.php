@extends('layouts.front_layouts.front_design')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" id="user_id" value="{{ session('user_id') }}" />
<br><br><br>
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered calendar">
            
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light calendar bordered">
                            <div class="portlet-title ">
                                <div class="caption">
                                    <i class="icon-calendar font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="calendar_view"> </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#calendar_view').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($calendar_view_content as $task)
                {
                    title : '{{ $task->project_name }}',
                    start : '{{ $task->start }}'
                },
                @endforeach
            ]
        })
        //calendar_view_load();
        function calendar_view_load () {
            var user_id=$("#user_id").val();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/calendar_view_load',
                data: {user_id: user_id},
                success: function(data) {
                    {{-- AppCalendar.init(data.calendar_view_content) --}}
                    console.log(data.calendar_view_content);
                    
                }
            });
        }
        // AppCalendar.init();
    });


var AppCalendar = function() {

return {
    //main function to initiate the module
    init: function(event_data) {
        this.initCalendar(event_data);
    },

    initCalendar: function(event_data) {

        if (!jQuery().fullCalendar) {
            return;
        }

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var h = {};
        
        if (App.isRTL()) {
            if ($('#calendar_view').parents(".portlet").width() <= 720) {
                $('#calendar_view').addClass("mobile");
                h = {
                    right: 'title, prev, next',
                    center: '',
                    left: 'agendaDay, agendaWeek, month, today'
                };
            } else {
                $('#calendar_view').removeClass("mobile");
                h = {
                    right: 'title',
                    center: '',
                    left: 'agendaDay, agendaWeek, month, today, prev,next'
                };
            }
        } else {
            if ($('#calendar_view').parents(".portlet").width() <= 720) {
                $('#calendar_view').addClass("mobile");
                h = {
                    left: 'title, prev, next',
                    center: '',
                    right: 'today,month,agendaWeek,agendaDay'
                };
            } else {
                $('#calendar_view').removeClass("mobile");
                h = {
                    left: 'title',
                    center: '',
                    right: 'prev,next,today,month,agendaWeek,agendaDay'
                };
            }
        }
        $('#calendar_view').fullCalendar('destroy'); // destroy the calendar
        $('#calendar_view').fullCalendar({ //re-initialize the calendar
                header: h,
                defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
                slotMinutes: 15,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.className = $(this).attr("data-class");

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar_view').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: event_data
            });


    }

};

}();


</script>
@endsection