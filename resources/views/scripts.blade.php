<script src="{{ asset('jquery/jquery.js') }}"></script>
<script src="{{ asset('jquery/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('js/agency.js') }}"></script>
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/masked-input.js') }}"></script>
<script src="{{ asset('dist/politespace.js') }}"></script>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<script>
    $( function() {
    $( "#datepicker" ).datepicker({
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Augosto", "Septiembre", "Octubre", "Noviembre", "Diciembere" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Jue", "Vie", "Sab" ],
        maxDate: "+15d",
        minDate: "+1d",
        dateFormat: 'yy-mm-dd',
      });
    });
    // $( "#datepicker" ).datepicker({
    //
    // });
</script>
<script>
    jQuery( function(){
        jQuery( document ).trigger( "enhance" );
    });
</script>
