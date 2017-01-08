@extends('layouts.app')

@section('css')

    <link href="{{asset('css/calendar/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/calendar/fullcalendar.print.css')}}" rel="stylesheet" media="print">
@endsection
@section('content') 
<div class="row-fluid">

<div class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-xs-12 col-sm-10 col-lg-10">    <button class="btn btn-dark" style="width:100% !important" onclick="window.location.href='{{url('Prospeccion/create')}}';">Levantar prospección</button>
</div>
</div>
 <div id='calendar'></div>

 
@endsection



@section('js')
      <script src="{{asset('js/moment/moment.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/fastclick.js')}}"></script>
    <script src="{{asset('js/calendar/lang_fullcalendar.js')}}"></script>
<script>
/*$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
         lang: 'es'
    })

});


	$(document).ready(function() {
		var initialLangCode = 'es';

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '{{date("Y-m-d")}}',
			lang: initialLangCode,
			buttonIcons: true, // show the prev/next text
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
	
				 
			]
		});

 
	});
*/

</script>
    <script>
      $(window).load(function() {
        var date = new Date(),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear(),
            started,
            categoryClass;

        var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
			},
		  lang:'es',
		  defaultDate: '{{date("Y-m-d")}}',
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            $('#fc_create').click();

            started = start;
            ended = end;

            $(".antosubmit").on("click", function() {
              var title = $("#title").val();
              if (end) {
                ended = end;
              }

              categoryClass = $("#event_type").val();

              if (title) {
                calendar.fullCalendar('renderEvent', {
                    title: title,
                    start: started,
                    end: end,
                    allDay: allDay
                  },
                  true // make the event "stick"
                );
              }

              $('#title').val('');

              calendar.fullCalendar('unselect');

              $('.antoclose').click();

              return false;
            });
          },
          eventClick: function(calEvent, jsEvent, view) {
            $('#fc_edit').click();
            $('#title2').val(calEvent.title);

            categoryClass = $("#event_type").val();

            $(".antosubmit2").on("click", function() {
              calEvent.title = $("#title2").val();

              calendar.fullCalendar('updateEvent', calEvent);
              $('.antoclose2').click();
            });

            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
		@foreach($calendario as $dias)
				{
					url: '{{url("Prospeccion/get/".$dias->id_prospeccion)}}',
					title: '{{$dias->prospeccion->cliente->persona->nombre." ".$dias->prospeccion->cliente->persona->apellidoPaterno." ".$dias->prospeccion->cliente->persona->apellidoMaterno." ".$dias->descripcion}}',
					start: '{{$dias->fecha}}'
				},
			@endforeach
          ],
          
             color: 'yellow',   // an option!
    textColor: 'black',
        });
      });
</script>
@endsection


