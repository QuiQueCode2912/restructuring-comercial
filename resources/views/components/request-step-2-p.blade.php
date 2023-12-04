<?php
$from_hour = session()->get('00N3m00000QMwta-hour', null);
$to_hour = session()->get('00N3m00000QMwtf-hour', null);

if (is_null($from_hour)) {
    session()->put('00N3m00000QMwta-hour', date('H') . ':00');
}

if (is_null($to_hour)) {
    session()->put('00N3m00000QMwtf-hour', date('H') + 1 . ':00');
}

$designs = json_decode(html_entity_decode($designs ?? ''));
$configuration = [];
if ($designs) {
    foreach ($designs as $design) {
        $configuration[$design->layout] = $design->max_pax;
    }
}

?>


<script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script crossorigin src="https://momentjs.com/downloads/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">




<input type="hidden" id="franja-seleccion" value="<?php echo session()->get('franja'); ?>" />
<?php $grupos = json_decode(html_entity_decode($grupos)); ?>
<style>
    @media (hover: hover) {
        .spBtn:hover {
            background-color: #C3E0E5;
        }
    }

    .spBtn.disabled:hover {
        background-color: transparent;
    }

    .spBtn {
        border: 1px solid #007bff;
        border-color: #007bff;
        border-radius: 0.25rem;
        cursor: pointer;
        color: transparent;
        width: 140px;
        height: 33px;
        text-align: center;
        vertical-align: middle;
        font-weight: 400;
        font-size: small;
        display: inline-block;
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .spBtn.disabled {
        border: 1px solid silver;
        color: silver;
    }

    .spBtn.selected {
        background-color: #007bff;
        color: #fff;
    }

    .spBtn.secundary {
        background-color: #007bff;
        color: transparent;
    }

    .tDiv {
        -webkit-user-select: none;
        /* Safari */
        -ms-user-select: none;
        /* IE 10 and IE 11 */
        user-select: none;
    }

    .col-width {
        width: 75%
    }

    .input-cant-personas {
        width: 10%
    }

    .stl-persons {
        right: 0;
        top: 0;
    }

    .stl-persons input {
        width: 28%;
        border-radius: 0.25rem;
    }

    .icon-bt {
        font-size: 18px;
    }

    .spinner-styles {
        padding-top: 150px;
        background-color: rgba(255, 255, 255, 0.7);
    }

    .unclickable {
        cursor: not-allowed;
        pointer-events: none;
        border: 1px solid silver;
        color: silver;
    }

    .espacios-seleccionados {
        display: flex;
        flex-flow: wrap;
        gap: 5px;
    }
</style>

<div id="pageMessages"></div>
<script>
    function chkCambio(e) {
        console.log('hereeeee');
        var fecha = $("#start-date").val();
        var nombreVenue = e.target.getAttribute("data-venuename")
        var tarCont = e.target.id;
        //tarCont = "#" + tarCont.replace('chk','');
        var tarChk = e.target.id;
        tarChk = "#" + tarChk;



        $(tarChk).off('mouseenter mouseleave');

        var franja = "<?php echo session()->get('franja'); ?>";
        var clave = tarCont.substr(tarCont.length - 18);
        var reemplazar = false;

        if (!$(tarChk).hasClass("selected") && !$(tarChk).hasClass("disabled")) {

            if (franja == 'dia') {
                $("[id$='" + clave + "']").not('.disabled').not(tarChk).addClass("secundary");
                $("[id$='" + clave + "']").not('.disabled').not(tarChk).removeClass("selected");
                createAlert('', '',
                    '<b>Se marcaron todas las horas?</b><br/>Descuida! En reserva diaria se marcan todos los espacios del día porque puedes venir a cualquier hora!',
                    'info', true, true, 'pageMessages');
                reemplazar = true;
            }
            $(tarCont).css('color', '');
            if (franja == 'mes') {
                var sePermite = almacenarVenueMensual(tarCont, fecha, nombreVenue, reemplazar);
                if (!sePermite) {
                    createAlert('', '',
                        '<b>Sólo se permiten 4 horas por semana!</b><br/>Puedes cambiar tus horas seleccionadas para esta semana si lo deseas.',
                        'warning', true, true, 'pageMessages');
                    console.log("No se permite!");

                } else {
                    $(tarChk).not('.disabled').addClass("selected");
                }
            } else {
                console.log("tarChk: " + tarChk + " tarCont: " + tarCont + " nombreVenue: " + nombreVenue);
                if (franja == 'hora') {
                    var sePermite = almacenarVenue(tarCont, fecha, nombreVenue, reemplazar);
                    if (!sePermite) {
                        createAlert('', '',
                            '<b>Sólo se permiten 2 horas por día!</b><br/>Puedes cambiar tus horas seleccionadas para este día si lo deseas.',
                            'warning', true, true, 'pageMessages');
                        console.log("No se permite!");
                        return false;
                    }
                    validateBasketCourt(e.target.dataset.venueid, e.target.dataset.time, false);
                } else {
                    almacenarVenue(tarCont, fecha, nombreVenue, reemplazar);
                }
                $(tarChk).not('.disabled').addClass("selected");
                $(tarChk).not('.disabled').removeClass("secundary")
            }
        } else {
            eliminarVenue(tarCont, fecha, nombreVenue);
            if (franja == 'dia') {
                $("[id$='" + clave + "']").not('.disabled').removeClass("secundary");
            }
            $(tarChk).removeClass("selected");
            validateBasketCourt(e.target.dataset.venueid, e.target.dataset.time, true);

        }
        console.log('chkCambio: ' + tarCont + ' / ' + fecha);

    }


    function prevDate() {
        $('#nextDay').prop('disabled', true);
        $("[id^='show']").prop('disabled', false);
        var fechaSel = $("#start-date").val();
        let date = new Date(fechaSel);
        date.setDate(date.getDate() - 1);
        $('#start-date').data('daterangepicker').setStartDate(date.toISOString().slice(0, 10));
        $('#start-date').data('daterangepicker').setEndDate(date.toISOString().slice(0, 10));
        //$('#start-date').data('daterangepicker').element.trigger("apply.daterangepicker", this);
        $('#start-date').trigger('apply');
    }

    function nextDate() {
        $('#prevDay').prop('disabled', true);
        $("[id^='show']").prop('disabled', false);
        var fechaSel = $("#start-date").val();
        let date = new Date(fechaSel);
        date.setDate(date.getDate() + 1);
        //   $('input.datepicker#start-date').val(date.toISOString().slice(0, 10));



        $('#start-date').data('daterangepicker').setStartDate(date.toISOString().slice(0, 10));
        $('#start-date').data('daterangepicker').setEndDate(date.toISOString().slice(0, 10));
        $('#start-date').trigger('apply');

    }

    function goToDate(e) {
        var buttonId = e.id;
        var fecha = buttonId.substring(4);
        $('#start-date').data('daterangepicker').setStartDate(fecha);
        $('#start-date').data('daterangepicker').setEndDate(fecha);
        $('#start-date').trigger('apply');
    }

    function showVenueInfo(nombre, facilidades, capacidad, preciohora, preciomediodia, preciodia, preciomes, foto) {
        $('#venueinfoModalLongTitle').text(nombre);
        $('#capacidadLbl').text(capacidad + ' personas');

        var facilidad = "No";

        if (facilidades.indexOf("Luminarias") !== -1) {
            facilidad = "Sí";
        }
        $('#luminariasLbl').text(facilidad);

        facilidad = "No";

        if (facilidades.indexOf("Graderías") !== -1) {
            facilidad = "Sí";
        }
        $('#graderiasLbl').text(facilidad);

        $('#capacidadLbl').text(capacidad + ' personas');
        if (preciohora > 0) {
            $('#hourGrp').show();
            $('#hourLbl').html('desde $' + preciohora + ' <span style="color: #0088ff">*</span>');
        } else {
            $('#hourGrp').hide();
        }
        if (preciomediodia > 0) {
            $('#halfGrp').show();
            $('#halfLbl').html('desde $' + preciomediodia + ' <span style="color: #0088ff">*</span>');
        } else {
            $('#halfGrp').hide();
        }
        if (preciodia > 0) {
            $('#dayGrp').show();
            $('#dayLbl').html('desde $' + preciodia + ' <span style="color: #0088ff">*</span>');
        } else {
            $('#dayGrp').hide();
        }
        //if(preciomes > 0)
        //{
        //$('#monthGrp').show();
        //$('#monthLbl').html('desde $' + preciomes + ' <span style="color: #0088ff">*</span>');
        //} else { $('#monthGrp').hide(); }
        $('#venue_photo').attr('src', foto);
        window.location.hash = "tab1";
        $('#venueinfoModalLong').modal('show');
    }

    function smoothScroll(element, target, duration) {
        console.log('*** HACIENDO SCROLL ***');
        var start = element.scrollLeft,
            change = target - start,
            startTime = performance.now(),
            val, now, elapsed, t;

        function animateScroll() {
            now = performance.now();
            elapsed = (now - startTime) / 1000;
            t = (elapsed / duration);

            element.scrollLeft = start + change * easeInOutQuad(t);

            if (t < 1)
                window.requestAnimationFrame(animateScroll);
        };

        // Esta es una función de easing que puede ser modificada para cambiar la
        // velocidad de la animación en diferentes puntos.
        function easeInOutQuad(t) {
            return t < .5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
        };

        animateScroll();
    }

    var el = document.getElementById('tabContainer');

    // Desplazarse a la derecha
    smoothScroll(el, el.scrollWidth, 1);

    setTimeout(function() {
        smoothScroll(el, 0, 1);
    }, 600);
    alert('*** HACIENDO SCROLL ***');
</script>
<x-error-message />
<div class="request-step" id="update-target" style="margin-top:0px;">
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="conflictoModalLong" tabindex="-1" role="dialog"
            aria-labelledby="conflictoModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="conflictoModalLongTitle">Conflicto de fechas!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Hemos detectado que uno de los espacios que habías seleccionado ya ha sido confirmado para otro
                        evento o para mantenimiento y tendremos que excluirlo en tu solicitud. Lamentamos el
                        inconveniente.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="venueinfoModalLong" tabindex="-1" role="dialog"
            aria-labelledby="venueinfoModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="venueinfoModalLongTitle">Información del Venue</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="tabs">
                        <div class="tabpage-container">
                            <div id="tab2" class="tabpage">
                                <a class="a2" href="#tab2">Imágen</a>
                                <div class="tabpage-content">
                                    <img id="venue_photo" class="tabpage-img" src="" alt="img" />
                                </div>
                            </div>
                            <div id="tab1" class="tabpage">
                                <a class="a1" href="#tab1">Información</a>
                                <div class="tabpage-content">

                                    <div class="modal-body">



                                        <div class="col-12">

                                            <div class="characteristics">
                                                <div class="characteristics-item">
                                                    <div class="characteristics-text1">
                                                        Cuenta con luminarias
                                                    </div>
                                                    <div id="luminariasLbl" class="characteristics-text2">No</div>
                                                </div>

                                                <div class="characteristics-item">
                                                    <div class="characteristics-text1">

                                                        @if ($parentid != '02i3m00000Fx0PEAAZ')
                                                            Cuenta con graderías
                                                        @else
                                                            Sala de observación
                                                        @endif

                                                    </div>
                                                    <div id="graderiasLbl" class="characteristics-text2">No</div>
                                                </div>

                                                <div class="characteristics-item">
                                                    <div class="characteristics-text1">
                                                        Capacidad máxima
                                                    </div>
                                                    <div id="capacidadLbl" class="characteristics-text2">
                                                        0 personas
                                                    </div>
                                                </div>

                                                <div id="hourGrp" class="characteristics-item">
                                                    <div class="characteristics-text1">
                                                        Precio por hora
                                                    </div>
                                                    <div id="hourLbl" class="characteristics-text2">
                                                        desde $0.00
                                                        <span style="color: #0088ff">*</span>
                                                    </div>
                                                </div>

                                                <div id="halfGrp" class="characteristics-item">
                                                    <div class="characteristics-text1">
                                                        Precio por medio día
                                                    </div>
                                                    <div id="halfLbl" class="characteristics-text2">
                                                        desde $0.00
                                                        <span style="color: #0088ff">*</span>
                                                    </div>
                                                </div>

                                                <div id="dayGrp" class="characteristics-item">
                                                    <div class="characteristics-text1">
                                                        Precio por día entero
                                                    </div>
                                                    <div id="dayLbl" class="characteristics-text2">
                                                        desde $0.00
                                                        <span style="color: #0088ff">*</span>
                                                    </div>
                                                </div>

                                                <!--<div id="monthGrp" class="characteristics-item">
                                  <div class="characteristics-text1">
                                    Precio por mes
                                  </div>
                                  <div id="monthLbl" class="characteristics-text2">
                                    desde $0.00
                                    <span style="color: #0088ff">*</span>
                                  </div>
                                </div>-->
                                            </div>
                                            <br />
                                            <small><span style="color:#0088ff">*</span>
                                                Los precios no incluyen catering ni impuestos locales
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <h4>Cuéntanos algunos datos de tu reserva</h4>
        <div class="row form-error-message">
            <div class="col-12">Sólo tienes que completar los datos que faltan</div>
        </div>
        <input id="venueId" type="text" value="<?php echo session()->get('00N3m00000Pb23w'); ?>" style="display:none" />
        <div class="row">


            <div class="col-12 col-md-12" style="display:none">
                <div style="margin-bottom:8px;"><small>Tu reserva es para</small></div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:100%">
                    <label
                        class="btn btn-outline-primary {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Adulto' ? 'active' : '' }}"
                        style="width:33%">
                        <input type="radio" name="00N3m00000QeGyG" id="option1" value="Adulto"
                            {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Adulto' ? 'checked' : '' }}>Adulto
                    </label>
                    <label
                        class="btn btn-outline-primary {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Niño' ? 'active' : '' }}"
                        style="width:33%">
                        <input type="radio" name="00N3m00000QeGyG" id="option2" value="Niño"
                            {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Niño' ? 'checked' : '' }}>Niño
                    </label>
                    <label
                        class="btn btn-outline-primary {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Jubilado' ? 'active' : '' }}"
                        style="width:33%">
                        <input type="radio" name="00N3m00000QeGyG" id="option3" value="Jubilado"
                            {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Jubilado' ? 'checked' : '' }}>Jubilado
                    </label>
                </div>
            </div>
            <br /><br />
            <div class="col-12 col-md-12">
                <div style="margin-bottom:8px;margin-top:8px"><small>Día a reservar</small></div>
                <div class="form-group" style="display:flex">
                    <button id="prevDay" onclick="this.disabled=true;prevDate();return false;"
                        class="btn btn-primary" style="width:70px;margin-right:7px;">&lt;</button>
                    <input type="text" class="form-control datepicker" data-setavailablehours="true"
                        name="00N3m00000QMwta" id="start-date" placeholder="Fecha de inicio"
                        value="<?php echo session()->get('00N3m00000QMwta', old('00N3m00000QMwta')); ?>">
                    <button id="nextDay" onclick="this.disabled=true;nextDate();return false;"
                        class="btn btn-primary " style="width:70px;margin-left:7px;">&gt;</button>
                </div>
            </div>


            <div class="col-12 col-md-12">
                @if ($parentid == '02i3m00000DiduZAAR')
                    <div><small>Selecciona el horario (la duración de cada turno es de una(1) hora)</small></div>
                @else
                    <div><small>Selecciona el horario (puedes reservar en múltiples días)</small></div>
                @endif

                <div id="overlay" class=""
                    style="padding-top:150px;background-color: rgba(255,255,255,0.7);">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <br />Buscando disponibilidad...
                </div>
                <center>

                    <style>
                        table {
                            border-collapse: separate;
                            border-spacing: 0;
                            /* border-top: 1px solid grey; */
                        }

                        td,
                        th {
                            margin: 0;
                            /* border: 1px solid grey; */
                            white-space: nowrap;
                            border-top-width: 0px;
                        }

                        .tDiv {
                            overflow-x: scroll !important;

                            margin-left: 5.5em;
                            overflow-y: visible;
                            padding: 0;
                            font-size: small;
                            font-family: sans-serif;
                        }

                        .headcol {
                            position: absolute;
                            width: 5em;
                            left: 15px;
                            top: auto;
                            border-top-width: 1px;
                            /*only relevant for first row*/
                            margin-top: 7px;
                            /*compensate for top border*/
                            padding-left: 5px;
                            font-family: 'Roboto', sans-serif;
                        }

                        .long {
                            /* background: white; */
                            width: 143px;
                        }

                        .chkHide {
                            //display: none;
                            width: 0px;
                            height: 0px;
                        }

                        .noHover {
                            margin-bottom: 0px !important;
                            width: 140px !important;
                            height: unset !important;
                            font-size: small;
                        }

                        .request .request-step {
                            margin-top: 0px;
                        }

                        .circle {
                            margin-left: 5px;
                            margin-top: auto;
                            margin-bottom: auto;
                            border: 0.1em solid black;
                            border-radius: 100%;
                            height: 1.3em;
                            width: 1.3em;
                            text-align: center;
                        }

                        .circle p {
                            font-size: 0.8em;
                            font-weight: bold;
                            font-family: sans-serif;
                            color: black;
                        }

                        .col-head {
                            white-space: normal;
                            word-wrap: break-word;
                            font-family: 'Roboto', sans-serif;
                        }
                    </style>
                    <?php $newValue = 'testing'; ?>


                    <?php //PISCINA HORARIOS
                    ?>
                    <?php
                    
                    if ($parentid == '02i3m00000DiduZAAR') {
                        class Timetable
                        {
                            public $startTime;
                            public $startTimeToShow;
                            public $endTime;
                            public $endTimeToShow;
                        }
                    
                        $timeOne = new Timetable();
                        $timeOne->startTime = '05-30';
                        $timeOne->startTimeToShow = '05:30 AM';
                        $timeOne->endTime = '06-30';
                        $timeOne->endTimeToShow = '06:30 AM';
                    
                        $timeTwo = new Timetable();
                        $timeTwo->startTime = '07-00';
                        $timeTwo->startTimeToShow = '07:00 AM';
                        $timeTwo->endTime = '08-00';
                        $timeTwo->endTimeToShow = '08:00 AM';
                    
                        $timeThree = new Timetable();
                        $timeThree->startTime = '08-30';
                        $timeThree->startTimeToShow = '08:30 AM';
                        $timeThree->endTime = '09-30';
                        $timeThree->endTimeToShow = '09:30 AM';
                    
                        $timeFour = new Timetable();
                        $timeFour->startTime = '10-00';
                        $timeFour->startTimeToShow = '10:00 AM';
                        $timeFour->endTime = '11-00';
                        $timeFour->endTimeToShow = '11:00 AM';
                    
                        $timeFive = new Timetable();
                        $timeFive->startTime = '11-30';
                        $timeFive->startTimeToShow = '11:30 AM';
                        $timeFive->endTime = '12-30';
                        $timeFive->endTimeToShow = '12:30 PM';
                    
                        $timeSix = new Timetable();
                        $timeSix->startTime = '13-00';
                        $timeSix->startTimeToShow = '01:00 PM';
                        $timeSix->endTime = '14-00';
                        $timeSix->endTimeToShow = '02:00 PM';
                    
                        $timeSeven = new Timetable();
                        $timeSeven->startTime = '14-30';
                        $timeSeven->startTimeToShow = '02:30 PM';
                        $timeSeven->endTime = '15-30';
                        $timeSeven->endTimeToShow = '03:30 PM';
                    
                        $timeOct = new Timetable();
                        $timeOct->startTime = '16-00';
                        $timeOct->startTimeToShow = '04:00 PM';
                        $timeOct->endTime = '17-00';
                        $timeOct->endTimeToShow = '05:00 PM';
                    
                        $timeNine = new Timetable();
                        $timeNine->startTime = '17-30';
                        $timeNine->startTimeToShow = '05:30 PM';
                        $timeNine->endTime = '18-30';
                        $timeNine->endTimeToShow = '06:30 PM';
                    
                        $timeTen = new Timetable();
                        $timeTen->startTime = '19-00';
                        $timeTen->startTimeToShow = '07:00 PM';
                        $timeTen->endTime = '20-00';
                        $timeTen->endTimeToShow = '08:00 PM';
                    
                        $lsTimeTables = [$timeOne, $timeTwo, $timeThree, $timeFour, $timeFive, $timeSix, $timeSeven, $timeOct, $timeNine, $timeTen];
                    
                        //Sabado
                        $timeOneS = new Timetable();
                        $timeOneS->startTime = '08-00';
                        $timeOneS->startTimeToShow = '08:00 AM';
                        $timeOneS->endTime = '09-00';
                        $timeOneS->endTimeToShow = '09:00 AM';
                    
                        $timeTwoS = new Timetable();
                        $timeTwoS->startTime = '09-00';
                        $timeTwoS->startTimeToShow = '09:00 AM';
                        $timeTwoS->endTime = '10-00';
                        $timeTwoS->endTimeToShow = '10:00 AM';
                    
                        $timeThreeS = new Timetable();
                        $timeThreeS->startTime = '10-00';
                        $timeThreeS->startTimeToShow = '10:00 AM';
                        $timeThreeS->endTime = '11-00';
                        $timeThreeS->endTimeToShow = '11:00 AM';
                    
                        $timeFiveS = new Timetable();
                        $timeFiveS->startTime = '11-00';
                        $timeFiveS->startTimeToShow = '11:00 AM';
                        $timeFiveS->endTime = '12-00';
                        $timeFiveS->endTimeToShow = '12:00 PM';
                    
                        $timeSixS = new Timetable();
                        $timeSixS->startTime = '12-00';
                        $timeSixS->startTimeToShow = '12:00 PM';
                        $timeSixS->endTime = '13-00';
                        $timeSixS->endTimeToShow = '01:00 PM';
                    
                        $timeSevenS = new Timetable();
                        $timeSevenS->startTime = '13-00';
                        $timeSevenS->startTimeToShow = '01:00 PM';
                        $timeSevenS->endTime = '14-00';
                        $timeSevenS->endTimeToShow = '02:00 PM';
                    
                        $timeEigthS = new Timetable();
                        $timeEigthS->startTime = '14-30';
                        $timeEigthS->startTimeToShow = '02:30 PM';
                        $timeEigthS->endTime = '15-30';
                        $timeEigthS->endTimeToShow = '03:30 PM';
                    
                        $timeNineS = new Timetable();
                        $timeNineS->startTime = '16-00';
                        $timeNineS->startTimeToShow = '04:00 PM';
                        $timeNineS->endTime = '17-00';
                        $timeNineS->endTimeToShow = '05:00 PM';
                    
                        $timeTenS = new Timetable();
                        $timeTenS->startTime = '17-30';
                        $timeTenS->startTimeToShow = '05:30 PM';
                        $timeTenS->endTime = '18-30';
                        $timeTenS->endTimeToShow = '06:30 PM';
                    
                        $lsTimeTablesS = [$timeSevenS, $timeEigthS, $timeNineS, $timeTenS];
                    
                        //Domingo
                        $timeOneD = new Timetable();
                        $timeOneD->startTime = '08-00';
                        $timeOneD->startTimeToShow = '08:00 AM';
                        $timeOneD->endTime = '09-00';
                        $timeOneD->endTimeToShow = '09:00 AM';
                    
                        $timeTwoD = new Timetable();
                        $timeTwoD->startTime = '09-30';
                        $timeTwoD->startTimeToShow = '09:30 AM';
                        $timeTwoD->endTime = '10-30';
                        $timeTwoD->endTimeToShow = '10:30 AM';
                    
                        $timeThreeD = new Timetable();
                        $timeThreeD->startTime = '11-00';
                        $timeThreeD->startTimeToShow = '11:00 AM';
                        $timeThreeD->endTime = '12-00';
                        $timeThreeD->endTimeToShow = '12:00 PM';
                    
                        $timeFourD = new Timetable();
                        $timeFourD->startTime = '12-00';
                        $timeFourD->startTimeToShow = '12:00 PM';
                        $timeFourD->endTime = '13-00';
                        $timeFourD->endTimeToShow = '01:00 PM';
                    
                        $timeFiveD = new Timetable();
                        $timeFiveD->startTime = '13-00';
                        $timeFiveD->startTimeToShow = '01:00 PM';
                        $timeFiveD->endTime = '14-00';
                        $timeFiveD->endTimeToShow = '02:00 PM';
                    
                        $timeSixD = new Timetable();
                        $timeSixD->startTime = '14-30';
                        $timeSixD->startTimeToShow = '02:30 PM';
                        $timeSixD->endTime = '15-30';
                        $timeSixD->endTimeToShow = '03:30 PM';
                    
                        $timeNineD = new Timetable();
                        $timeNineD->startTime = '16-00';
                        $timeNineD->startTimeToShow = '04:00 PM';
                        $timeNineD->endTime = '17-00';
                        $timeNineD->endTimeToShow = '05:00 PM';
                    
                        $timeSevenD = new Timetable();
                        $timeSevenD->startTime = '17-30';
                        $timeSevenD->startTimeToShow = '05:30 PM';
                        $timeSevenD->endTime = '18-30';
                        $timeSevenD->endTimeToShow = '06:30 PM';
                    
                        $lsTimeTablesD = [$timeOneD, $timeTwoD, $timeThreeD, $timeFourD, $timeFiveD, $timeSixD, $timeNineD, $timeSevenD];
                    }
                    ?>


                    @if ($parentid == '02i3m00000DiduZAAR')
                        <input class="form-control" required type="hidden" name="ReservasSeleccionadas"
                            id="ReservasSeleccionadas" width="100%" />
                        <div id="root"></div>
                    @else
                        <div class="tDiv   ">
                            <div class="btn-group-toggle" data-toggle="buttons" id="tabContainer">
                                <table>
                                    <tbody>
                                        <tr style="text-align: -webkit-center;">
                                            <th class="headcol"></th>
                                            <?php $hayNocturnos = 0; ?>
                                            <?php if ($grupos) : ?>
                                            <?php foreach ($grupos as $grupo) : ?>
                                            <?php if ($grupo->name !='PISCINA RECREATIVA') : ?>
                                            <td>
                                                <div id="diaDisclaimer" data-toggle="popover" data-placement="bottom"
                                                    style="top: -130px;" title="Dismissible popover"
                                                    data-content="And here's some amazing content. It's very engaging. Right?">
                                                    <a href=""
                                                        onclick="showVenueInfo('{{ $grupo->name }}','{{ $grupo->venue_facilities }}','<?php echo $configuration ? max($configuration) : 0; ?>','{{ $grupo->hour_fee }}','{{ $grupo->mid_day_fee }}','{{ $grupo->all_day_fee }}','{{ $grupo->monthly_fee }}','{{ $grupo->image }}')"
                                                        style=""><b>{{ $grupo->name }}</b></a>
                                                </div>
                                            </td>
                                            <?php
                                            if ($grupo->nightcharge == 1) {
                                                $hayNocturnos = 1;
                                            }
                                            $facilidadesVenue = $grupo->venue_facilities;
                                            if (strpos($facilidadesVenue, 'Luminarias') !== false) {
                                                $hayNocturnos = 1;
                                            }
                                            ?>
                                            <?php endif ?>

                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </tr>
                                        <?php
                                        if($parentid !== '02i3m00000DiduZAAR'){
                                                $horaInicial = 7;
                                                $horaFinal = 20;
                                                $incrementosFranja = 1;
                                                for ($horaActual = $horaInicial; $horaActual <= $horaFinal; $horaActual += $incrementosFranja)
                                                {
                                                $horaActualSTR = "";
                                                $horaActual24STR = "";
                                                $horaFinalSTR = "";
                                                $THoraInicial = "AM";
                                                $THoraFinal = "AM";
                                                $hActual = $horaActual;
                                                $hFinal = $horaActual + $incrementosFranja;
                                                if($hFinal > 12)
                                                {
                                                    $THoraFinal = "PM";
                                                    $hFinal -= 12;
                                                }
                                                if($hActual > 12)
                                                {
                                                    $THoraInicial = "PM";
                                                    $hActual -= 12;
                                                }
                                                
                                                if($hActual < 10)
                                                {
                                                    $horaActualSTR = "0" . (string) $hActual;
                                                }
                                                else
                                                {
                                                    $horaActualSTR = (string) $hActual;
                                                }
                                                if($hFinal < 10)
                                                {
                                                    $horaFinalSTR = "0" . (string) $hFinal;
                                                }
                                                else
                                                {
                                                    $horaFinalSTR = (string) $hFinal;
                                                }
                                                if($horaActual < 10)
                                                {
                                                    $horaActual24STR = "0" . (string) $horaActual;
                                                }
                                                else
                                                {
                                                    $horaActual24STR = (string) $horaActual;
                                                }
                                        ?>
                                        <?php if($horaActual <= 17 || $hayNocturnos == 1) : ?>
                                        <tr id="trHora{{ $horaActual24STR }}">
                                            <th id="lblHora{{ $horaActual24STR }}"
                                                style="font-family: 'Roboto', sans-serif;" class="headcol">
                                                {{ $horaActualSTR }}:00 {{ $THoraInicial }}</th>
                                            <?php if ($grupos) : ?>
                                            <?php foreach ($grupos as $grupo) : ?>
                                            <?php
                                            $facilidadesVenue = $grupo->venue_facilities;
                                            $luminarias = 0;
                                            // echo 'XYZ: ' . $facilidadesVenue;
                                            if (strpos($facilidadesVenue, 'Luminarias') !== false) {
                                                $luminarias = 1;
                                            }
                                            ?>
                                            <td class="long">
                                                <?php if($horaActual <= 17 || ($luminarias == 1 && $horaActual > 17)) : ?>
                                                <div class="spBtn" data-venuename="{{ $grupo->name }}"
                                                    data-venueid="{{ $grupo->id }}"
                                                    data-time="{{ $horaActual24STR }}"
                                                    id="chkhora{{ $horaActual24STR }}{{ $grupo->id }}"
                                                    name="chkhora{{ $horaActual24STR }}{{ $grupo->id }}"
                                                    onclick="chkCambio(event)">


                                                    <!-- btn noHover shadow-none btn-outline-primary
                        <input class="chkHide" data-venuename="{{ $grupo->name }}" id="chkhora{{ $horaActual24STR }}{{ $grupo->id }}" name="chkhora{{ $horaActual24STR }}{{ $grupo->id }}" type="checkbox" autocomplete="off" onchange="chkCambio(event)" />
                        -->
                                                    {{ $horaActualSTR }}:00{{ $THoraInicial }} -
                                                    {{ $horaFinalSTR }}:00{{ $THoraFinal }}

                                                </div>
                                                <?php endif ?>
                                            </td>
                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </tr>
                                        <?php endif ?>
                                        <?php } ?>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif




                </center>
            </div>

        </div>
        @if ($parentid != '02i3m00000DiduZAAR')
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="description"><small>Espacios que deseas reservar</small></label>
                        <input class="form-control" required type="hidden" name="ReservasSeleccionadas"
                            id="ReservasSeleccionadas" width="100%" value='<?php echo session()->get('ReservasSeleccionadas', old('ReservasSeleccionadas')); ?>' />
                        <div class="row">
                            <div id="espaciosSeleccionados" class="col-12 col-md-12"
                                style="display: flex; flex-flow: wrap; gap: 5px;">

                                <a id="esPlaceholder" href="#"><small>Debes seleccionar al menos un
                                        espacio!</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($venue ?? '') : ?>
            <div class="row" style="margin-top:10px; display: none;">
                <div class="col-12 col-md-12">
                    <div class="form-group-preview"
                        style="background:#ffffff; border:1px solid #000000; padding:12px 20px">
                        Venue: <?php echo $venue; ?>
                    </div>
                </div>

            </div>
            <?php endif ?>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="description"><small>Describe tu
                                reserva</small>&nbsp;&nbsp;&nbsp;<?php if ($grupos[0]->parent_id == '02i3m00000DiduVAAR') {
                                    echo "<a href='#'><small>(obligatorio)</small></a>";
                                } else {
                                    echo '<small>(opcional)</small>';
                                } ?></label>
                        <textarea name="description" <?php if ($grupos[0]->parent_id == '02i3m00000DiduVAAR') {
                            echo 'required';
                        } else {
                            echo '';
                        } ?> id="description"><?php echo session()->get('description', old('description')); ?></textarea>
                    </div>
                </div>

            </div>
            <div class="row buttons">
                <div class="col-12 text-center">
                    <a href="/cotizacion/datos-contacto" class="btn btn-primary">Anterior</a>
                    <button type="submit" class="btn btn-primary submit-form">Siguiente</button>
                </div>
            </div>
        @endif
    </div>

    @if ($parentid == '02i3m00000DiduZAAR')
        <script>
            var phpVariable = @json($grupos);
            var jsonSchedules = @json($lsTimeTables);
            var jsonSchedulesSaturday = @json($lsTimeTablesS);
            var jsonSchedulesSunday = @json($lsTimeTablesD);
            var moment = moment();
        </script>
    @endif

    @if ($parentid == '02i3m00000DiduZAAR')
        <script type="text/babel">    
            const App = () => {
                    const buttonRef = React.useRef(null);

                    const [groups, setGroups] = React.useState([]);

                    const [selectedHour, setSelectedHour] = React.useState([]);

                    
                    const [schedules, setSchedules] = React.useState([]);
                    const [schedulesSaturday, setSchedulesSaturday] = React.useState([]);
                    const [schedulesSunday, setSchedulesSunday] = React.useState([]);

                    const [isRefresh, setIsRefresh] = React.useState(false);

                    const [cantPersonas, setCantPersonas] = React.useState(1);


                    const [persAssist, setPersAssist] = React.useState(0);

                    const [isNext, setIsNext] = React.useState(true);


                    const [venue, setVenue] = React.useState(null);


                    





                    /**
                     *  Variable to store  the  input from  daterangepicker
                    */
                    const [currentDay, setCurrentDay] = React.useState(null);
                    const [currentSchedule, setCurrentSchedule] = React.useState(null);

                    /**
                     * Slots Selected comming from  SALESFORCE PRODUCTION 
                    */
                    const [slotsSelected, setSlotsSelected] = React.useState([]);

                      /**
                     * Boolean para saber si esta cargando 
                    */
                    const [isLoading, setIsLoading] = React.useState(true);



                    //Personas que van a asistir
                    const [persAdults, setPersAdults] = React.useState(0);
                    const [persChilds, setPersChilds] = React.useState(0);
                    const [persJub, setPersJub] = React.useState(0);

                    


                    React.useEffect(()=>{
                        if(currentDay == null ){
                            const date = new Date();
                            const dayOfWeek = date.getDay();
                            setCurrentDay(dayOfWeek);
                        }
                    },[currentDay])
                    

                    React.useEffect(() => {
                        // Access the PHP variable here
                        if(phpVariable){
                            setGroups([phpVariable[0]]);
                        }
                        if(jsonSchedules){
                            setSchedules(jsonSchedules);
                        }

                        if(jsonSchedulesSaturday){
                            setSchedulesSaturday(jsonSchedulesSaturday);
                        }
                        if(jsonSchedulesSunday){
                            setSchedulesSunday(jsonSchedulesSunday);
                        }

                    }, [phpVariable,jsonSchedules,jsonSchedulesSunday,jsonSchedulesSaturday]);

            

                    
                    React.useEffect(() => {
                        // Add an event listener to capture the custom event
                        const eventListener = async(event) => {    
                            setIsLoading(false); 
                            const dayOfWeek = moment(event.detail.currentDate).day();
                            setCurrentDay(dayOfWeek);
                            setCurrentSchedule(event.detail.currentDate);
                            //setSelectedHour([]);
                            $("[id^='chkhora']").removeClass("selected");
                            $("[id^='chkhora']").removeClass("secundary");
                          
                            setIsNext(false);
                        };

                        //event dispach from  CORE.JS LINE 143
                        window.addEventListener('dateSelected', eventListener);

                        // Clean up the event listener when the component unmounts
                        return () => {
                            window.removeEventListener('dateSelected', eventListener);
                        };
                    }, []);

                        
                    React.useEffect(() => {
                        // Add an event listener to capture the custom event
                        const eventListener = async(event) => {
                            if(event.detail.slotsSelected) setSlotsSelected(JSON.parse(event.detail.slotsSelected));
                            setIsLoading(true);
                        };

                        //event dispach from  CORE.JS LINE 160
                        window.addEventListener('slotsSelected', eventListener);

                        // Clean up the event listener when the component unmounts
                        return () => {
                            window.removeEventListener('slotsSelected', eventListener);
                        };
                    }, []);
                    /*
                    const  handleSelectHour = (hourSelected,index,time,currentTime)=>{
                        console.log('Init hours');
                        
                        //Rest time to persons
                        setPersAdults(0);
                        setPersChilds(0);
                        setPersJub(0);

                        setVenue(hourSelected);
                        setIsRefresh(true);
                        let newArr = [...groups]; // copying the old datas array
                        var targetDate = moment(newArr[index].selectedStartTime, 'YYYY-MM-DD hh:mm A');
                        var targetDateTwo = moment(newArr[index].selectedStartTimeTwo, 'YYYY-MM-DD hh:mm A');
                        let dateCurrentSelOne = moment(currentTime).format('YYYY-MM-DD');


                        var sePermite = window.almacenarVenue(newArr[index].Id, dateCurrentSelOne, newArr[index].name, false);
                        if (!sePermite) {
                            createAlert('', '',
                                '<b>Sólo se permiten 2 horas por día!</b><br/>Puedes cambiar tus horas seleccionadas para este día si lo deseas.',
                                'warning', true, true, 'pageMessages');
                            console.log("No se permite!");
                            return false;
                        }

                        

                        if(newArr[index].selected == true  &&  targetDate.isSame(currentTime)){
                            newArr[index].selected=false;
                            newArr[index].startTime='';

                            let dateCurrentSelOne = moment(newArr[index].selectedStartTime).format('YYYY-MM-DD');
                            
                            if( targetDate.isSame(targetDateTwo,'day')){
                                window.agregarBoton(dateCurrentSelOne,1);
                            }else{
                                window.eliminarBoton(dateCurrentSelOne);
                            }

                            newArr[index].selectedStartTime ='';
                            targetDate = '';
                           


                        }else if(!newArr[index].selected && !newArr[index].startTimeTwo){
                            newArr[index].selected=true;
                            newArr[index].selectedTime = time.startTimeToShow + '-'+ time.endTimeToShow;
                            newArr[index].startTime = time.startTime;
                            newArr[index].endTime = time.endTime;
                            newArr[index].selectedStartTime = currentSchedule ?  currentSchedule+' '+time.startTimeToShow :  moment().format('YYYY-MM-DD')+' ' +time.startTimeToShow;
                            targetDate = moment(newArr[index].selectedStartTime,'YYYY-MM-DD hh:mm A');
                            window.agregarBoton(moment(newArr[index].selectedStartTime).format('YYYY-MM-DD'),1);
                        }

                        if(newArr[index].selected == true && !newArr[index].selectedTwo && !targetDate.isSame(currentTime)){
                            newArr[index].selectedTwo=true;
                            newArr[index].selectedTimeTwo = time.startTimeToShow + '-'+ time.endTimeToShow;
                            newArr[index].startTimeTwo = time.startTime;
                            newArr[index].endTimeTwo = time.endTime;
                            newArr[index].selectedStartTimeTwo = currentSchedule ?  currentSchedule+' '+time.startTimeToShow :  moment().format('YYYY-MM-DD')+' ' +time.startTimeToShow;
                            targetDateTwo = moment(newArr[index].selectedStartTimeTwo,'YYYY-MM-DD hh:mm A');
                            
                            let dateCurrentSelOne = moment(newArr[index].selectedStartTime).format('YYYY-MM-DD');
                            let dateCurrentSelTwo = moment(newArr[index].selectedStartTimeTwo).format('YYYY-MM-DD');

                            if(dateCurrentSelOne == dateCurrentSelTwo ){
                                window.agregarBoton(dateCurrentSelTwo,2);
                            }else{
                                window.agregarBoton(dateCurrentSelTwo,1);
                            }


                        }else if(newArr[index].selectedTwo == true && targetDateTwo.isSame(currentTime)){
                            newArr[index].selectedTwo=false;
                            newArr[index].startTimeTwo='';

                            let dateCurrentSelOne = moment(newArr[index].selectedStartTime).format('YYYY-MM-DD');
                            let dateCurrentSelTwo = moment(newArr[index].selectedStartTimeTwo).format('YYYY-MM-DD');

                            if(dateCurrentSelOne == dateCurrentSelTwo ){
                                window.agregarBoton(dateCurrentSelTwo,1);
                            }else{
                                window.eliminarBoton(dateCurrentSelTwo);
                            }

                            newArr[index].selectedStartTimeTwo ='';
                            targetDateTwo = '';
                            
                          
                            
                        }

                      
                        if(!newArr[index].selectedTwo && !newArr[index].selected){
                            let dateCurrentSelTwo = moment(newArr[index].selectedStartTimeTwo).format('YYYY-MM-DD');
                            let dateCurrentSelOne = moment(newArr[index].selectedStartTime).format('YYYY-MM-DD');
                            window.eliminarBoton(dateCurrentSelOne);
                            window.eliminarBoton(dateCurrentSelTwo);
                        }
                        

                        
                      

                   
                        setGroups(newArr);
                        setSelectedHour([...selectedHour,newArr[0]]);
                        
                        
                        if(slotsSelected){
                            let cantPers = 0;
                            
                            slotsSelected.forEach(slot => {
                                if(slot.StartDateTime){
                                    let convertStartTime = moment.utc(slot.StartDateTime);
                                    convertStartTime.subtract(5,'hours');
                                    
                                   // Get the hours and minutes
                                   var hours = convertStartTime.format('HH');
                                   var minutes = convertStartTime.format('mm');

                                   var [startHours, startMinutes] = time.startTime.split('-');
                                   if(hours === startHours && minutes === startMinutes && slot.Cantidad_de_asistentes__c){
                                        cantPers+=slot.Cantidad_de_asistentes__c;
                                   }
                                }
                            });
                             let totalPers = 25-cantPers;
                            if(totalPers<=0){
                                setPersAssist(0);
                            }else{
                                setPersAssist(totalPers);
                            }
                            
                        }
                        setIsRefresh(false);

                    }*/


                    const  handleAdultsSum = (e,id)=>{
                        e.preventDefault();
                        setSelectedHour((prevData) =>
                            prevData.map((item) => {
                                if(item.id === id &&  item.totalPers!=0 && item.persAdults > -1)  return { ...item, totalPers: item.totalPers - 1,persAdults:item.persAdults + 1  } 
                                return  item
                            })
                        );

                    }

                    const  handleAdultsRest = (e,id)=>{
                        e.preventDefault();
                        setSelectedHour((prevData) =>
                            prevData.map((item) => {
                                if(item.id === id &&  item.totalPers >-1 && item.persAdults > 0)  return { ...item, totalPers: item.totalPers + 1,persAdults:item.persAdults - 1  } 
                                return  item
                            })
                        );

                    }


                    const  handleChildSum = (e,id)=>{
                        e.preventDefault();
                     
                        setSelectedHour((prevData) =>
                            prevData.map((item) => {
                                if(item.id === id &&  item.totalPers!=0 && item.persChilds > -1)  return { ...item, totalPers: item.totalPers - 1,persChilds:item.persChilds + 1  } 
                                return  item
                            })
                        );
                    }

                    const  handleChildRest = (e,id)=>{
                        e.preventDefault();
                        setSelectedHour((prevData) =>
                            prevData.map((item) => {
                                if(item.id === id &&  item.totalPers >-1 && item.persChilds > 0)  return { ...item, totalPers: item.totalPers + 1,persChilds:item.persChilds - 1  } 
                                return  item
                            })
                        );
                    }

                    const  handleJubSum = (e,id)=>{
                        e.preventDefault();
                        setSelectedHour((prevData) =>
                            prevData.map((item) => {
                                if(item.id === id &&  item.totalPers!=0 && item.persJub > -1)  return { ...item, totalPers: item.totalPers - 1,persJub:item.persJub + 1  } 
                                return  item
                            })
                        );
                    }

                    const  handleJubRest = (e,id)=>{
                        e.preventDefault();
                        setSelectedHour((prevData) =>
                            prevData.map((item) => {
                                if(item.id === id &&  item.totalPers >-1 && item.persJub > 0)  return { ...item, totalPers: item.totalPers + 1,persJub:item.persJub - 1  } 
                                return  item
                            })
                        );
                    }

                    const  handleClick = async e=>{
                        e.preventDefault();
                        let lsHoursToSchedule = [];
                        selectedHour.forEach(element => {
                            let objAux = {};
                            objAux.fecha = element.fecha;
                            objAux.id = element.id;
                            objAux.venue = groups[0].name;
                            objAux.subtotal= 3.50;
                            objAux.calcularFact= true;
                            objAux.personJubCount= element.persJub;
                            objAux.personChildCount= element.persChilds;
                            objAux.personAdultCount= element.persAdults;

                            // Input time as a string
                            var inputTime = element.startTime;

                            // Parse the input time using Moment.js
                            var time = moment(inputTime, "HH-mm");

                            // Add 4 hours to the time
                            time.add(5, "hours");

                            // Format the result as "HH-MM"
                            var formattedTime = time.format("HH-mm");
                            objAux.startTime= formattedTime.replace('-',':');
                            
                            // Input time as a string
                            var inputTimeFinish =  element.endTime;

                            // Parse the input time using Moment.js
                            var timeF = moment(inputTimeFinish, "HH-mm");

                            // Add 4 hours to the time
                            timeF.add(5, "hours");

                            // Format the result as "HH-MM"
                            var formattedTimeF = timeF.format("HH-mm");
                            objAux.finishTime= formattedTimeF.replace('-',':');

                            let tot= element.persJub +  element.persChilds + element.persAdults;
                            objAux.totalPersons = tot.toString();

                            lsHoursToSchedule.push(objAux);
                                
                        });

                        document.getElementById('ReservasSeleccionadas').value = JSON.stringify(lsHoursToSchedule);
                        buttonRef.current.click();
                    }

  
                 

                    return (
                        <div>
                            <div id="overlay" class="spinner-styles" hidden={isLoading} >
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <br />Buscando disponibilidad...
                            </div>
                            <div className='tDiv mt-2'>
                                <table className='w-100' >
                                    <thead >
                                        <tr>
                                            <th className='headcol' ></th>
                                            {groups.length > 0  && 
                                                    groups.map((element,i)=>{
                                                        return  (<th className='text-center'  key={i} >
                                                                <div id="diaDisclaimer" data-toggle="popover" data-placement="bottom"
                                                                    title="Dismissible popover"
                                                                    data-content="And here's some amazing content. It's very engaging. Right?">
                                                                    <a href='/' className='col-head'><b>{element.name}</b></a>
                                                                </div>
                                                            </th >);
                                            })}
                                        </tr>
                                    </thead>
                                    <tbody >

                                    {/* MARTES A VIERNES */}
                                    {schedules.length > 0 && currentDay < 6  &&  currentDay > 1    && schedules.map((sch,i)=>{
                                                let currentDate = moment();
                                                let currentInputValue = currentSchedule ? currentSchedule+ ' ' +sch.startTimeToShow : moment().format('YYYY-MM-DD') +' ' +sch.startTimeToShow;

                                                // Parse the given date string '2023-10-17 02:30 PM' and create a moment object
                                                var targetDate = moment(currentInputValue, 'YYYY-MM-DD hh:mm A');

                                                // Compare the current date with the target date
                                                if (currentDate.isAfter(targetDate)) {
                                                    return '';
                                                } else {
                                                    return (<tr key={i} /*id={"trHora" + sch.startTime}*/>
                                                        <th  className='headcol'  >{sch.startTimeToShow} </th>   
                                                        {groups.length > 0  && isRefresh==false && 
                                                                groups.map((element,i)=>{
                                                        
                                                                        return  ( <td className='text-center position-relative' key={i}  >
                                                                                <div  className='spBtn' onClick={e=>{
                                                                                    e.preventDefault();
                                                                                   // handleSelectHour(element,i,sch,targetDate);
                                                                                    var isAdded = chkCambio(e);
                                                                                    if(slotsSelected && isAdded!=false){
                                                                                            let cantPers = 0;
                                                                                            
                                                                                            slotsSelected.forEach(slot => {
                                                                                                if(slot.StartDateTime){
                                                                                                    let convertStartTime = moment.utc(slot.StartDateTime);
                                                                                                    convertStartTime.subtract(5,'hours');
                                                                                                    
                                                                                                // Get the hours and minutes
                                                                                                var hours = convertStartTime.format('HH');
                                                                                                var minutes = convertStartTime.format('mm');

                                                                                                var [startHours, startMinutes] =e.target.dataset.time.split('-');
                                                                                                if(hours === startHours && minutes === startMinutes && slot.Cantidad_de_asistentes__c){
                                                                                                        cantPers+=slot.Cantidad_de_asistentes__c;
                                                                                                }
                                                                                                }
                                                                                            });
                                                                                            let totalPers = 25-cantPers;
                                                                                            let checkIfExistHour =  selectedHour.find(hour => hour.id == e.target.id && currentSchedule == hour.currentSchedule);
                                                                                            
                                                                                            if(checkIfExistHour){
                                                                                                const updatedArray = selectedHour.filter(item => item.id !== e.target.id);
                                                                                                setSelectedHour(updatedArray);
                                                                                            }else{
                                                                                                setSelectedHour((prevData) => [...prevData,
                                                                                                    { id : e.target.id ,
                                                                                                        fecha:currentInputValue,
                                                                                                        totalPers : totalPers, 
                                                                                                        timeSelected : sch.startTimeToShow+'-'+sch.endTimeToShow , 
                                                                                                        persAdults: 0 ,
                                                                                                        persChilds:0,
                                                                                                        persJub: 0 ,
                                                                                                        startTime:sch.startTime,
                                                                                                        endTime:sch.endTime,
                                                                                                        currentSchedule:currentSchedule
                                                                                                    }]
                                                                                                );
                                                                                            }
                                                                                    }
                                                                                    
                                                                                }}
                                                                                id={"chkhora"+sch.startTime + groups[0].id}
                                                                                name={"chkhora"+sch.startTime + groups[0].id}
                                                                                data-venuename={groups[0].name}
                                                                                data-venueid={groups[0].id}
                                                                                data-time={sch.startTime}
                                                                               >
                                                                        
                                                                                    {sch.startTimeToShow}- {sch.endTimeToShow}
                                                                                    
                                                                                    
                                                                                    </div>
                                                                                
                                                                            </td>);
                                                                    

                                                            
                                                                
                                                        })}
                                                    </tr>);
                                                }
                                    })}

                                    {/*SABADO*/}
                                    {schedulesSaturday.length > 0 && currentDay == 6  && schedulesSaturday.map((sch,i)=>{
                                                let currentDate = moment();
                                                let currentInputValue = currentSchedule ? currentSchedule+ ' ' +sch.startTimeToShow : moment().format('YYYY-MM-DD') +' ' +sch.startTimeToShow;

                                                // Parse the given date string '2023-10-17 02:30 PM' and create a moment object
                                                var targetDate = moment(currentInputValue, 'YYYY-MM-DD hh:mm A');

                                                // Compare the current date with the target date
                                                if (currentDate.isAfter(targetDate)) {
                                                    return '';
                                                } else {
                                                    return (<tr key={i} /*id={"trHora" + sch.startTime}*/>
                                                        <th  className='headcol'  >{sch.startTimeToShow} </th>   
                                                        {groups.length > 0  && isRefresh==false && 
                                                                groups.map((element,i)=>{
                                                                    let isCurrentTimeSelected =false;

                                                                
                                                                        if(element['selected']){
                                                                            if(element.selectedStartTime == currentInputValue) isCurrentTimeSelected = true;
                                                                        } 
                                                                        return  ( <td className='text-center position-relative' key={i}  >
                                                                                <div  className={isCurrentTimeSelected ? 'spBtn selected' : 'spBtn' } onClick={e=>{
                                                                                    e.preventDefault();
                                                                                    handleSelectHour(element,i,sch);
                                                                                    chkCambio(e);
                                                                                }}
                                                                                id={i}>
                                                                        
                                                                                    {isCurrentTimeSelected && element.selectedTime}
                                                                                    
                                                                                    </div>
                                                                                    {isCurrentTimeSelected &&  <div class=" position-absolute  stl-persons d-none align-items-center " aria-labelledby={i}>
                                                                                            <input type="number"  className="form-control text-center  " min="1" oninput="this.value = Math.abs(this.value)"  value={cantPersonas}
                                                                                                onChange={e=>setCantPersonas(e.target.value)} 
                                                                                                        name="cantidadPersonas"  placeholder="" />
                                                                                                        <i class="bi bi-people-fill ml-2 icon-bt" ></i>
                                                                                    </div>}
                                                                                
                                                                            </td>);
                                                                    

                                                            
                                                                
                                                        })}
                                                    </tr>);
                                                }
                                        })}

                                        {/* DOMINGO */}
                                        {schedulesSunday.length > 0 && currentDay == 0  && schedulesSunday.map((sch,i)=>{
                                            let currentDate = moment();
                                                let currentInputValue = currentSchedule ? currentSchedule+ ' ' +sch.startTimeToShow : moment().format('YYYY-MM-DD') +' ' +sch.startTimeToShow;

                                                // Parse the given date string '2023-10-17 02:30 PM' and create a moment object
                                                var targetDate = moment(currentInputValue, 'YYYY-MM-DD hh:mm A');

                                                // Compare the current date with the target date
                                                if (currentDate.isAfter(targetDate)) {
                                                    return '';
                                                } else {
                                                    return (<tr key={i} /*id={"trHora" + sch.startTime}*/>
                                                        <th  className='headcol'  >{sch.startTimeToShow} </th>   
                                                        {groups.length > 0  && isRefresh==false && 
                                                                groups.map((element,i)=>{
                                                                    let isCurrentTimeSelected =false;

                                                                
                                                                        if(element['selected']){
                                                                            if(element.selectedStartTime == currentInputValue) isCurrentTimeSelected = true;
                                                                        } 
                                                                        return  ( <td className='text-center position-relative' key={i}  >
                                                                                <div  className={isCurrentTimeSelected ? 'spBtn selected' : 'spBtn' } onClick={e=>{
                                                                                    e.preventDefault();
                                                                                    handleSelectHour(element,i,sch);
                                                                                }}
                                                                                id={i}>
                                                                        
                                                                                    {isCurrentTimeSelected && element.selectedTime}
                                                                                    
                                                                                    </div>
                                                                                    {isCurrentTimeSelected &&  <div class=" position-absolute  stl-persons d-none align-items-center " aria-labelledby={i}>
                                                                                            <input type="number"  className="form-control text-center  " min="1" oninput="this.value = Math.abs(this.value)"  value={cantPersonas}
                                                                                                onChange={e=>setCantPersonas(e.target.value)} 
                                                                                                        name="cantidadPersonas"  placeholder="" />
                                                                                                        <i class="bi bi-people-fill ml-2 icon-bt" ></i>
                                                                                    </div>}
                                                                                
                                                                            </td>);
                                                                    

                                                            
                                                                
                                                        })}
                                                    </tr>);
                                                }
                                        })}
                
                                    </tbody>
                                </table>

                        
                            
                            </div>
                            <hr/>
                            {selectedHour && 
                                selectedHour.length > 0 &&  selectedHour.map((item)=>{
                                    if(currentSchedule == item.currentSchedule ){
                                        return(<div >
                                                <h4 className='w-100 text-left'> Cupos disponibles  ({item.currentSchedule} {item.timeSelected && item.timeSelected}) : { item.totalPers && item.totalPers} </h4>
                                                <div className=' '>
                                                    <div className='p-2 d-flex align-items-center'>
                                                        <p className='mb-1'>Adultos</p>
                                                        <div className='d-flex  align-items-center ml-2  '>
                                                            <input type="number" value={item.persAdults} className="form-control  text-center w-25 "  readonly min="1" oninput="this.value = Math.abs(this.value)"  
                                                                                                                                    name="cantidadPersonas" />
                                                            <div className=''>
                                                                <button className='btn btn-primary  ml-1' onClick={e=>handleAdultsSum(e,item.id)}>+</button>
                                                                <button className='btn btn-primary  ml-1' onClick={e=>handleAdultsRest(e,item.id)}>-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className='p-2 d-flex align-items-center'>
                                                        <p className='mb-1'>Niños</p>
                                                        <div className='d-flex  align-items-center ml-2  '>
                                                            <input type="number" value={item.persChilds} className="form-control  text-center w-25 "  readonly min="1" oninput="this.value = Math.abs(this.value)"  
                                                                                                                                    name="cantidadPersonas" />
                                                            <div className=''>
                                                                <button className='btn btn-primary  ml-1' onClick={e=>handleChildSum(e,item.id)}>+</button>
                                                                <button className='btn btn-primary  ml-1' onClick={e=>handleChildRest(e,item.id)}>-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className='p-2 d-flex align-items-center'>
                                                        <p className='mb-1'>Jubilados</p>
                                                        <div className='d-flex  align-items-center ml-2  '>
                                                            <input type="number" value={item.persJub} className="form-control  text-center w-25 "  readonly min="1" oninput="this.value = Math.abs(this.value)"  
                                                                                                                                    name="cantidadPersonas" />
                                                            <div className=''>
                                                                <button className='btn btn-primary  ml-1' onClick={e=>handleJubSum(e,item.id)}>+</button>
                                                                <button className='btn btn-primary  ml-1' onClick={e=>handleJubRest(e,item.id)}>-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                    
                                                </div>                                                                                                    
                                        </div>);
                                    }
                               
                                })
                            }
                            
                            <div class="row">
                                <div id="espaciosSeleccionados" class="col-12 col-md-12 espacios-seleccionados">
                                    <a id="esPlaceholder" href="#"><small>Debes seleccionar al menos un
                                            espacio!</small></a>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="description"><small>Describe tu
                                                    reserva(opcional)</small></label>
                                            <textarea name="description"  id="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row buttons">
                                    <div class="col-12 text-center">
                                        <a href="/cotizacion/datos-contacto" class="btn btn-primary">Anterior</a>
                                        <button  class="btn btn-primary" onClick={handleClick} disabled={isNext} >Siguiente</button>
                                        <button type="submit" class="btn btn-primary submit-form d-none"  ref={buttonRef}>Siguiente</button>
                                    </div>
                                </div>
                            
                                
                        </div>
                    );
                };

                ReactDOM.render(<App />, document.getElementById('root'));
        </script>
    @endif

</div>
