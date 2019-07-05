<p> rango:<input type="text" name="datefilter" value="" /></p>
<script type="text/javascript">
$(function() {
  $('input[name="datefilter"]').daterangepicker({
    'showDropdowns': true,
         ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
       'autoUpdateInput': false,

      'locale': {

          cancelLabel: 'Clear'
    "startDate": "07/05/2019",
    "endDate": "07/05/2020"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {

      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

  });
  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {

      $(this).val('');

  });



});

</script>