<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<input date-range-picker id="daterange4" name="daterange4" class="form-control date-picker" type="text" ng-model="dateRange" clearable="true" options="dateRangeOptions" />

<script>
  $(function () {
  $('input[name="daterange"]').daterangepicker({
    "showWeekNumbers": true,
  });
});

$('#duration').on('apply.daterangepicker', function (ev, picker) {
  alert('apply clicked!');
});
</script>



