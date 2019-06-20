<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="datepicker.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  <?php 
  $tmp=\sisWeb\Semana::where('propiedad_id','=',$propiedad->id)->get();?>
  var disableddates = [<?php $tmp?>];



function DisableSpecificDates(date) {
    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
    return [disableddates.indexOf(string) == -1];
  }

  $(document).ready(function(){
    $('input').datepicker({beforeShowDay: function(date){   return [date.getDay() == 1, '']; }});
});

 
      $(function () {                
        $("#datepicker").datepicker({
          firstDay: 1,
          monthNames: ['Enero', 'Febreo', 'Marzo',
          'Abril', 'Mayo', 'Junio',
          'Julio', 'Agosto', 'Septiembre',
          'Octubre', 'Noviembre', 'Diciembre'],
          dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
          showButtonPanel: "true",
          minDate:"+6m",
          maxDate:"+1y",
          beforeShowDay: DisableSpecificDates,
        });

});
    </script>
</head>
<body>

<p>Date: <input type="text" id="datepicker" name="date" autocomplete="off"></p>

 
</body>
</html>