<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<input type="text" name="datefilter" value="" autocomplete="off" data="daterangepicker" />
<script type="text/javascript">

$(function() {
  var masSeisMeses = moment().add(6,'months');
  var max=moment().add(1,'year');
  
  $('input[name="datefilter"]').daterangepicker({
     "minDate": masSeisMeses,
    "maxDate": max,
   "maxSpan": {
        "months": 2
    },
      autoUpdateInput: false,
      locale: {
         "format": "DD/MM/YYYY",
         "firstDay": 1,
          cancelLabel: 'Clear',
           
      },
      

  });
 
  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  });
  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
  });
});

</script>
</html>