document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendario');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid'],
        //defaultDate: '2019-04-12',
        editable: true,
        eventLimit: true,
        events: '../controle/detalhes_calendario.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function (info) {
            info.jsEvent.preventDefault(); // don't let the browser navigate

            $('#visualizar #id').text(info.event.id);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #end').text(info.event.end.toLocaleString());
            $('#visualizar').modal('show');
        }
    });

    calendar.render();
});


