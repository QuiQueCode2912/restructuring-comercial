<?php
$from_hour = session()->get('00N3m00000QMwta-hour', null);
$to_hour   = session()->get('00N3m00000QMwtf-hour', null);

if (is_null($from_hour)) {
  session()->put('00N3m00000QMwta-hour', date('H') . ':00');
}

if (is_null($to_hour)) {
  session()->put('00N3m00000QMwtf-hour', (date('H') + 1) . ':00');
}


$designs = json_decode(html_entity_decode($designs ?? ''));
$configuration = [];
if ($designs) {
  foreach ($designs as $design) {
    $configuration[$design->layout] = $design->max_pax;
  }
}

?>
<input type="hidden" id="franja-seleccion" value="<?PHP echo session()->get('franja')?>"/>
<?php $grupos = json_decode(html_entity_decode($grupos)) ?>
           
<script>


            function chkCambio(e) {
                var fecha = $("#start-date").val();
                var nombreVenue = e.target.getAttribute("data-venuename")
                var tarCont = e.target.id;
                tarCont = "#" + tarCont.replace('chk','');
                var tarChk = e.target.id;
                tarChk = "#" + tarChk;
                var franja = "<?PHP echo session()->get('franja')?>";
                var clave = tarCont.substr(tarCont.length - 18);
                var reemplazar = false;
                console.log("tarChk: " + tarChk + " tarCont: " + tarCont);
                if(e.target.checked)
                {
                 //
                 if(franja == 'dia')
                 {
                  $("[id$='" + clave + "']").not('.disabled').removeClass("btn-outline-primary");
                  $("[id$='" + clave + "']").not('.disabled').addClass("btn-primary");
                  $("[id$='" + clave + "']").not('.disabled').prop("checked", false);
                  $("[id$='" + clave + "']").not('.disabled').removeClass('active');
                  $("[id$='" + clave + "']").not('.disabled').css('color', 'transparent');
                  reemplazar = true;
                 }
                 $(tarCont).css('color', '');
                 if(franja == 'mes')
                 {
                    var sePermite = almacenarVenueMensual(e.target.name,fecha,nombreVenue,reemplazar);
                    if(!sePermite)
                    {
                        console.log("No se permite!");
                        //$(tarCont).addClass("btn-outline-primary");
                      //  $(tarCont).removeClass("btn-primary");
                        $(tarChk).prop("checked", false);
                        $(tarCont).blur();
                        $(tarCont).removeClass('active');
                        $(tarCont).css('color', 'transparent');
                    }
                 }
                 else {
                    almacenarVenue(e.target.name,fecha,nombreVenue,reemplazar);
                    $(tarCont).css('color', '');
                 }
                 
                //  $("[id$='" + clave + "']").addClass("disabled");
                 //
                } else
                {
                eliminarVenue(e.target.name,fecha,nombreVenue);
                 //
                 if(franja == 'dia')
                 {
                 $("[id$='" + clave + "']").not('.disabled').addClass("btn-outline-primary");
                  $("[id$='" + clave + "']").not('.disabled').removeClass("btn-primary");
                  $("[id$='" + clave + "']").not('.disabled').css('color', 'transparent');
                 // $(tarCont).removeClass("focus");
                 }
                 $(tarCont).css('color', 'transparent');
                }
               // alert('chkCambio: ' + tarCont + ' = ' + e.target.checked + ' / ' + fecha);
            }


            function prevDate()
            {
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
            function nextDate()
            {
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

            function goToDate(e)
            {
             var buttonId = e.id;
             var fecha = buttonId.substring(4);
              $('#start-date').data('daterangepicker').setStartDate(fecha);
                $('#start-date').data('daterangepicker').setEndDate(fecha);
                 $('#start-date').trigger('apply');
            }

            function showVenueInfo(nombre,facilidades,capacidad,preciohora,preciomediodia,preciodia,preciomes,foto)
            {
                $('#venueinfoModalLongTitle').text(nombre);
                $('#capacidadLbl').text(capacidad + ' personas');

                var facilidad = "No";

                if (facilidades.indexOf("Luminarias") !== -1) {
                  facilidad = "Si";
                }
                $('#luminariasLbl').text(facilidad);

                facilidad = "No";

                if (facilidades.indexOf("Graderías") !== -1) {
                  facilidad = "Si";
                }
                $('#graderiasLbl').text(facilidad);

                $('#capacidadLbl').text(capacidad + ' personas');
                if(preciohora > 0)
                {
                $('#hourGrp').show();
                $('#hourLbl').html('desde $' + preciohora + ' <span style="color: #0088ff">*</span>');
                } else { $('#hourGrp').hide(); }
                if(preciomediodia > 0)
                {
                $('#halfGrp').show();
                $('#halfLbl').html('desde $' + preciomediodia + ' <span style="color: #0088ff">*</span>');
                } else { $('#halfGrp').hide(); }
                if(preciodia > 0)
                {
                $('#dayGrp').show();
                $('#dayLbl').html('desde $' + preciodia + ' <span style="color: #0088ff">*</span>');
                } else { $('#dayGrp').hide(); }
                if(preciomes > 0)
                {
                $('#monthGrp').show();
                $('#monthLbl').html('desde $' + preciomes + ' <span style="color: #0088ff">*</span>');
                } else { $('#monthGrp').hide(); }
                $('#venue_photo').attr('src',foto);
                window.location.hash = "tab1";
                $('#venueinfoModalLong').modal('show');
            }
</script>
<x-error-message />
<div class="request-step" style="margin-top:0px;">
  <div class="container">

<!-- Modal -->
<div class="modal fade" id="conflictoModalLong" tabindex="-1" role="dialog" aria-labelledby="conflictoModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="conflictoModalLongTitle">Conflicto de fechas!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hemos detectado que uno de los espacios que habías seleccionado ya ha sido confirmado para otro evento o para mantenimiento y tendremos que excluirlo en tu solicitud.  Lamentamos el inconveniente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="venueinfoModalLong" tabindex="-1" role="dialog" aria-labelledby="venueinfoModalLongTitle" aria-hidden="true">
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
                                  <img id="venue_photo"
                                    class="tabpage-img"
                                    src=""
                                    alt="img"
                                  />
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
                                    Cuenta con graderías
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

                                <div id="monthGrp" class="characteristics-item">
                                  <div class="characteristics-text1">
                                    Precio por mes
                                  </div>
                                  <div id="monthLbl" class="characteristics-text2">
                                    desde $0.00
                                    <span style="color: #0088ff">*</span>
                                  </div>
                                </div>
                              </div>
                              <br/>
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
    <input id="venueId" type="text" value="<?php echo session()->get('00N3m00000Pb23w') ?>" style="display:none" />
    <div class="row">

 
       <div class="col-12 col-md-12">
       <div style="margin-bottom:8px;"><small>Tu reserva es para</small></div>
<div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:100%">
  <label class="btn btn-outline-primary {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Adulto' ? 'active' : '' }}" style="width:33%">
    <input type="radio" name="00N3m00000QeGyG" id="option1" value="Adulto" {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Adulto' ? 'checked' : '' }}>Adulto
  </label>
  <label class="btn btn-outline-primary {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Niño' ? 'active' : '' }}" style="width:33%">
    <input type="radio" name="00N3m00000QeGyG" id="option2" value="Niño" {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Niño' ? 'checked' : '' }}>Niño
  </label>
  <label class="btn btn-outline-primary {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Jubilado' ? 'active' : '' }}" style="width:33%">
    <input type="radio" name="00N3m00000QeGyG" id="option3" value="Jubilado" {{ session()->get('00N3m00000QeGyG', old('00N3m00000QeGyG')) == 'Jubilado' ? 'checked' : '' }}>Jubilado
  </label>
</div>
</div>
<br/><br/>
      <div class="col-12 col-md-12">
      <div style="margin-bottom:8px;margin-top:8px"><small>Día a reservar</small></div>
        <div class="form-group" style="display:flex">
        <button id="prevDay" onclick="this.disabled=true;prevDate();return false;" class="btn btn-primary" style="width:70px;margin-right:7px;">&lt;</button>
                  <input type="text" class="form-control datepicker" data-setavailablehours="true" name="00N3m00000QMwta" id="start-date" placeholder="Fecha de inicio" value="<?php echo session()->get('00N3m00000QMwta', old('00N3m00000QMwta')) ?>">
<button id="nextDay" onclick="this.disabled=true;nextDate();return false;" class="btn btn-primary " style="width:70px;margin-left:7px;">&gt;</button>
        </div>
      </div>

      <div class="col-12 col-md-12" >
             <div><small>Selecciona el horario</small></div>
            <div id="overlay" style="padding-top:150px;background-color: rgba(255,255,255,0.7);">
            <div class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>
            <br/>Buscando disponibilidad...</div>
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
</style>

<div class="tDiv">
<div class="btn-group-toggle" data-toggle="buttons">
  <table>
    <tbody>
    <tr style="text-align: -webkit-center;">
      <th class="headcol"></th>
      <?php $hayNocturnos = 0 ?>
       <?php if ($grupos) : ?>
            <?php foreach ($grupos as $grupo) : ?>
                <td><a href="" onclick="showVenueInfo('{{$grupo->name}}','{{$grupo->venue_facilities}}','<?php echo $configuration ? max($configuration) : 0 ?>','{{$grupo->hour_fee}}','{{$grupo->mid_day_fee}}','{{$grupo->all_day_fee}}','{{$grupo->monthly_fee}}','{{$grupo->image}}')" style="white-space: normal;word-wrap: break-word;font-family: 'Roboto', sans-serif;"><b>{{ $grupo->name }}</b></a></td>
            <?php
               if($grupo->nightcharge == 1)
               { $hayNocturnos = 1; }
            ?>
            <?php endforeach ?>
            <?php endif ?>   
     </tr>

     <?php
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
          $horaActualSTR = "0" . (string) $hActual;;
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
      <tr id="trHora{{$horaActual24STR}}">
      <th id="lblHora{{$horaActual24STR}}" style="font-family: 'Roboto', sans-serif;" class="headcol">{{$horaActualSTR}}:00 {{$THoraInicial}}</th>
      <?php if ($grupos) : ?>
      <?php foreach ($grupos as $grupo) : ?>
      <td class="long">
      <?php if($horaActual <= 17 || ($grupo->nightcharge == 1 && $horaActual > 17)) : ?>
		<label id="hora{{$horaActual24STR}}{{ $grupo->id }}" class="btn noHover shadow-none btn-outline-primary">
        
    			<input class="chkHide" data-venuename="{{ $grupo->name }}" id="chkhora{{$horaActual24STR}}{{ $grupo->id }}" name="chkhora{{$horaActual24STR}}{{ $grupo->id }}" type="checkbox" autocomplete="off" onchange="chkCambio(event)" />{{$horaActualSTR}}:00{{$THoraInicial}} - {{$horaFinalSTR}}:00{{$THoraFinal}}
  		</label>
       <?php endif ?> 
	  </td>
      <?php endforeach ?>
      <?php endif ?> 
    </tr>
<?php endif ?> 
       <?php } ?>

  </tbody></table>
</div>
</div>

</center>
</div>
      
    </div>
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="form-group">
          <label for="description"><small>Espacios que deseas reservar</small></label>
    <input class="form-control" required type="hidden" name="ReservasSeleccionadas" id="ReservasSeleccionadas" width="100%" value='<?php echo session()->get("ReservasSeleccionadas", old('ReservasSeleccionadas')) ?>'/>
    <div class="row">
    <div id="espaciosSeleccionados" class="col-12 col-md-12" style="display: flex; flex-flow: wrap; gap: 5px;">

     <a id="esPlaceholder" href="#"><small>Debes seleccionar al menos un espacio!</small></a>
  </div>
    </div>
                </div>
       </div>
      </div>

    <?php if ($venue ?? '') : ?>
    <div class="row" style="margin-top:10px; display: none;">
      <div class="col-12 col-md-12">
        <div class="form-group-preview" style="background:#ffffff; border:1px solid #000000; padding:12px 20px">
          Venue: <?php echo $venue ?>
        </div>
      </div>
     
    </div>
    <?php endif ?>
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="form-group">
          <label for="description"><small>Describe tu reserva</small>&nbsp;&nbsp;&nbsp;<a href="#"><small>(obligatorio)</small></a></label>
          <textarea name="description" required id="description"><?php echo session()->get('description', old('description')) ?></textarea>
        </div>
      </div>
      
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <a href="/cotizacion/datos-contacto" class="btn btn-primary">Anterior</a>
        <button type="submit" class="btn btn-primary submit-form">Siguiente</button>
      </div>
    </div>
  </div>
</div>
