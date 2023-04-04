/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/core.js":
/*!******************************!*\
  !*** ./resources/js/core.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {
            var firstTime = true;


            function validateSelDate(venueId, selDate, todayDate) {
              //  alert(venueId + ' : ' + selDate);
                $.ajax({
                    url: '/getAvailableSlots',
                    data: { 'venueId': venueId, 'date': selDate },
                    type: 'post',
                    cache: false,
                    async: true,
                    dataType: 'html',
                    success: function (response) {
                        const d = new Date();
                        let hour = d.getHours();
                        //limpiar
                        for (var i = 7; i <= 20; i++) {
                            var controlIdx = '' + i;
                            if (i < 10)
                                controlIdx = '0' + i;
                    //        console.log('Limpiando: ' + controlIdx);
                            $("[id^='chkhora" + controlIdx + "']").prop("checked", false);
                            $("[id^='hora" + controlIdx + "']").removeClass('active');
                            $("[id^='hora" + controlIdx + "']").removeClass('btn-primary');
                            if (selDate == todayDate && i <= hour) {
                                $("#trHora" + controlIdx).css('display', 'none');
                                $("#lblHora" + controlIdx).css('color','silver');
                                $("[id^='hora" + controlIdx + "']").removeClass('btn-outline-primary');
                                $("[id^='hora" + controlIdx + "']").addClass('btn-outline-secondary');
                                $("[id^='hora" + controlIdx + "']").addClass('disabled');
                            } else {
                                $("#trHora" + controlIdx).css('display', 'table-row');
                                $("#lblHora" + controlIdx).css('color', '');
                                $("[id^='hora" + controlIdx + "']").css('color', 'transparent');
                        //        $("[id^='hora" + controlIdx + "']").text('+');
                                $("[id^='hora" + controlIdx + "']").removeClass('btn-outline-secondary');
                                $("[id^='hora" + controlIdx + "']").addClass('btn-outline-primary');
                                $("[id^='hora" + controlIdx + "']").removeClass('disabled');
                            }
                        }
                         //   window.prompt('response', JSON.stringify(response));
                        if (response.length > 0) {
                            var eventos = JSON.parse(response);
                            console.log("** Reservas detectadas: " + eventos.length + " **");
                            for (var i = 7; i <= 20; i++) {
                                for (var j = 0; j < eventos.length; j++) {
                                    var HiD = eventos[j].StartDateTime;
                                    var Hi = parseInt(HiD.substring(11, 13), 10) - 5;
                                    var HfD = eventos[j].EndDateTime;
                                    var Hf = parseInt(HfD.substring(11, 13), 10);
                                    if (Hf == 0)
                                        Hf = 24;
                                    Hf = Hf - 5;
                                    var controlIdx = '' + i + eventos[j].Venue__c;
                                    if (i < 10)
                                        controlIdx = '0' + i + eventos[j].Venue__c;
                                    if (i >= Hi && i < Hf && eventos[j].Estado__c != 'Cancelado') {

                                        // DESHABILITA ESTA HORA
                                        $('#chkhora' + controlIdx).prop("checked", false);
                                        $('#hora' + controlIdx).removeClass('active');
                                        $('#hora' + controlIdx).removeClass('btn-outline-primary');
                                        $('#hora' + controlIdx).addClass('btn-outline-secondary');
                                        $('#hora' + controlIdx).addClass('disabled');
                                        $("[id^='hora" + controlIdx + "']").css('color', '');
                             //           $("[id^='hora" + controlIdx + "']").text('No disponible');
                                        //    alert(i + ' Hora: ' + '#hora'+ controlIdx + ' Datos: ' + Hi + ' ' + Hf);
                                    } else {
                                        $('#chkhora' + controlIdx).prop("checked", false);
                                        $('#hora' + controlIdx).removeClass('active');
                                        $('#hora' + controlIdx).removeClass('btn-outline-secondary');
                                        $('#hora' + controlIdx).addClass('btn-outline-primary');
                                        $('#hora' + controlIdx).removeClass('disabled');
                                        $("[id^='hora" + controlIdx + "']").css('color', 'transparent');
                           //             $("[id^='hora" + controlIdx + "']").text('+');
                                        //alert(i + ' Hora: ' + '#hora' + controlIdx + ' Datos: ' + Hi + ' ' + Hf);
                                    }
                                    //    var startDT = eventos[i].StartDateTime;
                                    //    var endDT = eventos[i].EndDateTime;
                                    //    var ffDT = eventos[i].Fecha_fin_del_evento__c;
                                    // dato ejemplo :   "2022-07-14T14:45:00.000+0000"
                                }
                            }
                        } else {
                            console.log("** No response:  no se detectaron reservas **");

                        }
                        var selVenues = $("#ReservasSeleccionadas").val() ? JSON.parse($("#ReservasSeleccionadas").val()) : JSON.parse("[]");
                      //  var selVenues = JSON.parse($("#ReservasSeleccionadas").val());
                        console.log("** MARCANDO FECHAS QUE HABIA SELECCIONADO **");
                        var fecha = $("#start-date").val();
                        for (var i = 0; i < selVenues.length; i++) {
                            if (selVenues[i].fecha == fecha) {
                                if ($("#" + selVenues[i].id.replace("chk", "")).hasClass('disabled') == true)
                                {
                                    var selVenues = $("#ReservasSeleccionadas").val() ? JSON.parse($("#ReservasSeleccionadas").val()) : JSON.parse("[]");
                                    selVenues = selVenues.filter(function (venue) {
                                        return venue.id !== selVenues[i].id || venue.fecha !== fecha;
                                    });
                                    //TODO: CAMBIAR LO DE ARRIBA POR ELIMINARVENUE
                                    $("#ReservasSeleccionadas").val(JSON.stringify(selVenues));
                                    $('#overlay').css('display', 'none');
                                    $('#prevDay').prop('disabled', false);
                                    $('#nextDay').prop('disabled', false);
                                    $("[id^='show']").prop('disabled', false);
                                    $('#conflictoModalLong').modal('show');
                                }
                                else {
                                    console.log("Set: " + selVenues[i].id);
                                    // FRANJA DIA
                                    
                                    var clave = selVenues[i].id.substr(selVenues[i].id.length - 18);
                                    var franja = $("#franja-seleccion").val();
                                    //alert("franja: " + franja + " clave: " + clave);
                                    if (franja == 'dia') {
                                        $("[id$='" + clave + "']").not('.disabled').removeClass("btn-outline-primary");
                                        $("[id$='" + clave + "']").not('.disabled').addClass("btn-primary");
                                        $("[id$='" + clave + "']").not('.disabled').prop("checked", false);
                                        $("[id$='" + clave + "']").not('.disabled').removeClass('active');
                                        $("[id$='" + clave + "']").not('.disabled').css('color', 'transparent');
                                    }
                                    // MARCAR TODO EL DIA
                                    $("#" + selVenues[i].id).prop("checked", true);
                                    $("#" + selVenues[i].id.replace("chk", "")).addClass('active');
                                    $("#" + selVenues[i].id.replace("chk", "")).css('color', '');

                                }
                            }
                            // agregar los botones
                            var cantidadSeleccionada = selVenues.filter(x => x.fecha === selVenues[i].fecha).length;
                            $("#esPlaceholder").hide();
                            var botonNombre = 'show' + selVenues[i].fecha;
                            var botonesExistes = $("#espaciosSeleccionados").find("#" + botonNombre);

                            if (botonesExistes.length > 0) {
                                var contador = botonesExistes.find(".circle p");
                                contador.html(cantidadSeleccionada);
                                //alert('ya wey');
                            } else {
                                var nuevoBoton = document.createElement("button");
                                nuevoBoton.id = botonNombre;
                                nuevoBoton.onclick = function () {
                                    $("[id^='show']").prop('disabled', true);
                                    goToDate(this);
                                    return false;
                                }
                                nuevoBoton.className = "btn btn-primary";
                                nuevoBoton.style.display = "flex";
                                nuevoBoton.style.fontSize = "0.7rem";
                                nuevoBoton.innerHTML = selVenues[i].fecha + '<div class="circle"><p>' + cantidadSeleccionada + '</p></div>';

                                var espaciosSeleccionados = document.getElementById("espaciosSeleccionados");
                                espaciosSeleccionados.appendChild(nuevoBoton);
                            }
                                    // hasta aqui
                        }
                         
                     //   alert("ReservasSeleccionadas: " + JSON.stringify(selVenues));


                        $('#overlay').css('display', 'none');
                        $('#prevDay').prop('disabled', false);
                        $('#nextDay').prop('disabled', false);
                        $("[id^='show']").prop('disabled', false);
                    },
                    statusCode: {
                        404: function () {
                            alert('web not found');
                        }
                    },
                    error: function (x, xs, xt) {
                        // window.open(JSON.stringify(x));
                        setTimeout(function () { validateSelDate(venueId, selDate, todayDate) }, 2000);
                    }
                });
            }
            $("#start-date").load("ajax/test.html", function () {
                if ($('input.datepicker#start-date').data('setavailablehours') == true && firstTime == true) {
                    $('#prevDay').prop('disabled', true);
                    $('#nextDay').prop('disabled', true);
                    firstTime = false;
                    var today = new Date();
                    var mes = today.getMonth() + 1;
                    var mesS = '' + mes;
                    if (mes < 10)
                        mesS = '0' + mes;
                    var dia = today.getDate();
                    var diaS = '' + dia;
                    if (dia < 10)
                        diaS = '0' + dia;
                    var min_date = today.getFullYear() + '-' + (mesS) + '-' + diaS;
                    venueId = $('#venueId').val();
                    validateSelDate(venueId, min_date, min_date);
                }
            });
$(document).ready(function () {
    $('input[name="daterange"]').daterangepicker();
    var today = new Date();
    var mes = today.getMonth() + 1;
    var mesS = '' + mes;
    if (mes < 10)
        mesS = '0' + mes;
    var dia = today.getDate();
    var diaS = '' + dia;
    if (dia < 10)
        diaS = '0' + dia;
    var min_date = today.getFullYear() + '-' + (mesS) + '-' + diaS;
    var setAvailableHours = '0';
    venueId = $('#venueId').val();
    var maxLimitDate = today.getFullYear()+2 + '-' + (mesS) + '-' + diaS;

  //  console.log(JSON.stringify($('input.datepicker#start-date').data('setavailablehours')));
    if ($('input.datepicker#start-date').data('setavailablehours') == true) {
        setAvailableHours = '1';
        today.setDate(today.getDate() + 15);
        mes = today.getMonth() + 1;
        mesS = '' + mes;
        (mes < 10)
            mesS = '0' + mes;
        dia = today.getDate();
        diaS = '' + dia;
        if (dia < 10)
            diaS = '0' + dia;
        maxLimitDate = today.getFullYear() + '-' + (mesS) + '-' + diaS;
 //       validateSelDate(venueId, min_date);
    }

  $('input.datepicker').daterangepicker({
      singleDatePicker: true,
      minDate: min_date,
      maxDate: maxLimitDate,
    locale: {
      format: 'YYYY-MM-DD',
      applyLabel: 'Aplicar',
      cancelLabel: 'Cancelar'
      }
  }
      //, function (start, end, label) {
     // if(setAvailableHours == 1)
      //{
      //    alert('custom1');
      //    $('#overlay').css('display', 'block');
      //    selDate = start.format('YYYY-MM-DD');
     //     validateSelDate(venueId, selDate, min_date);
     // }
  //}
  );
    $('input.datepicker#start-date').on('apply.daterangepicker', function (ev, picker) {
        if ($('input.datepicker#start-date').data('setavailablehours') == true) {
    //        alert('custom2');
            $('#overlay').css('display', 'block');
                var today = new Date();
    var mes = today.getMonth() + 1;
    var mesS = '' + mes;
    if (mes < 10)
        mesS = '0' + mes;
    var dia = today.getDate();
    var diaS = '' + dia;
    if (dia < 10)
        diaS = '0' + dia;
    var min_date = today.getFullYear() + '-' + (mesS) + '-' + diaS;
    var setAvailableHours = '0';
    venueId = $('#venueId').val();
            selDate = $('input.datepicker#start-date').val();
            validateSelDate(venueId, selDate, min_date);
        }
    });
  $('input.datetimepicker').daterangepicker({
    singleDatePicker: true,
    timePicker: false,
    locale: {
      format: 'YYYY-MM-DD HH:mm',
      applyLabel: 'Aplicar',
      cancelLabel: 'Cancelar'
    }
  });

  if ($('input.datepicker#start-date').length > 0 && $('input.datepicker#end-date').length > 0) {
    $('input.datepicker#start-date').on('apply.daterangepicker', function (ev, picker) {
      var date = new Date($('input.datepicker#start-date').val());
      date.setHours(date.getHours() + 1);
      var dateString = date.getFullYear() + '-' + ((date.getMonth() + 1 < 10 ? '0' : '') + (date.getMonth() + 1)) + '-' + ((date.getDate() +1 < 10 ? '0' : '') + (date.getDate() + 1));
      $('input.datepicker#end-date').val(dateString);
      $('input.datepicker#end-date').daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        minDate: dateString,
        locale: {
          format: 'YYYY-MM-DD',
          applyLabel: 'Aplicar',
          cancelLabel: 'Cancelar'
        }
      });
    });
  }

  lightbox.option({
    albumLabel: "",
    showImageNumberLabel: false,
    positionFromTop: $(window).width() < 600 ? 50 : 100,
    maxHeight: parseInt($(window).height()) - ($(window).width() < 600 ? 0 : 350)
  });

  if ($('#home-carousel').length > 0) {
    var height = parseInt($(window).height()) - 156;

    if (height <= ($('#home-carousel').hasClass('venue-main-image') ? 480 : 630)) {
      $('#home-carousel').height(height + 'px');
      $('#home-carousel .carousel-inner').height(height + 'px');
    }
  }

  if ($('.searcher.aside').length > 0) {
    $('.searcher.aside').css({
      left: 'calc(50% + ' + parseInt($('.header .container').width()) * .25 + 'px)'
    });
    $('.searcher.aside .search').css({
      width: parseInt($('.header .container').width()) * .25 + 'px'
    });
    $('.searcher.aside').show();
  }

  if ($('.venue-characteristics').length > 0) {
    $('.venue-characteristics').css({
      left: 'calc(50% + ' + parseInt($('.header .container').width()) * .25 + 'px)',
      top: $('.venues-list').offset().top
    });
    $('.venue-characteristics ul').css({
      width: parseInt($('.header .container').width()) * .25 + 'px'
    });
    $('.venue-characteristics').show();
  }
    window.almacenarVenue = function (venueId, fechaActual, nombreVenue, reemplazar = false) {
        var selVenues = $("#ReservasSeleccionadas").val() ? JSON.parse($("#ReservasSeleccionadas").val()) : JSON.parse("[]");
        var id = venueId;
        if (reemplazar) {
            var assetId = id.slice(-18);
            selVenues = selVenues.filter(x => !(x.fecha === fechaActual && x.id.endsWith(assetId)));
        }
        var objeto = { fecha: fechaActual, id: id, venue: nombreVenue };
        if (!selVenues.find(x => x.id === id && x.fecha === fechaActual)) {
            selVenues.push(objeto);
            var count = selVenues.filter(x => x.fecha === fechaActual).length;
            agregarBoton(fechaActual, count);
        }
        $("#ReservasSeleccionadas").val(JSON.stringify(selVenues));
    }
    window.almacenarVenueMensual = function (venueId, fechaActual, nombreVenue) {
        var selVenues = $("#ReservasSeleccionadas").val() ? JSON.parse($("#ReservasSeleccionadas").val()) : JSON.parse("[]");
        var id = venueId;
        
        var fechas = selVenues.map(function (a) { return new Date(a.fecha); });
        var fechaInicial = fechas.length > 0 ? Math.min.apply(null, fechas) : new Date(fechaActual);
        var fecha1 = new Date(fechaInicial);
        var fecha2 = new Date(fechaInicial);
        fecha2.setDate(fecha2.getDate() + 7);
        var fecha3 = new Date(fechaInicial);
        fecha3.setDate(fecha3.getDate() + 14);
        var fecha4 = new Date(fechaInicial);
        fecha4.setDate(fecha4.getDate() + 21);
        var fechaActualDate = new Date(fechaActual);
        console.log("fecha1: " + fecha1 + " fechaActualDate: " + fechaActualDate);
        // Verificar si la fecha actual está dentro de algún rango
        var fechas = [fecha1, fecha2, fecha3, fecha4];
        var fechaEnRango = fechas.find(fechaRango => fechaActualDate >= fechaRango && fechaActualDate < new Date().setDate(fechaRango.getDate() + 7));
        if (!fechaEnRango) {
            console.log("La fecha actual está fuera del rango permitido.");
            return false;
        }
        console.log("fechaEnRango: " + fechaEnRango);
        // Verificar el límite de 6 elementos por rango
        var elementosPorRango = selVenues.filter(x => new Date(x.fecha) >= fechaEnRango && new Date(x.fecha) < new Date().setDate(fechaEnRango.getDate() + 7)).length;
        console.log("elementosPorRango: " + elementosPorRango);
        if (elementosPorRango >= 6) {
            console.log("Se ha alcanzado el límite de 6 elementos para el rango");
            return false;
        }

        if (!selVenues.find(x => x.id === id && x.fecha === fechaActual)) {
            var objeto = { fecha: fechaActual, id: id, venue: nombreVenue };
            selVenues.push(objeto);
            var count = selVenues.filter(x => x.fecha === fechaActual).length;
            agregarBoton(fechaActual, count);
        }
        $("#ReservasSeleccionadas").val(JSON.stringify(selVenues));
        return true;
    };
    window.eliminarVenue = function (venueId, fechaActual) {
        //var selVenues = JSON.parse($("#ReservasSeleccionadas").val());
        var selVenues = $("#ReservasSeleccionadas").val() ? JSON.parse($("#ReservasSeleccionadas").val()) : JSON.parse("[]");
        selVenues = selVenues.filter(function (venue) {
            return venue.id !== venueId || venue.fecha !== fechaActual;
        });
        var count = selVenues.filter(x => x.fecha === fechaActual).length;
        if (count <= 0) {
            eliminarBoton(fechaActual);
        } else {
            agregarBoton(fechaActual, count);
        }
        $("#ReservasSeleccionadas").val(JSON.stringify(selVenues));
    }
    window.agregarBoton = function (variableFecha, cantidadSeleccionada) {
        $("#esPlaceholder").hide();
        var botonNombre = 'show' + variableFecha;
        var botonesExistes = $("#espaciosSeleccionados").find("#" + botonNombre);

        if (botonesExistes.length > 0) {
            var contador = botonesExistes.find(".circle p");
            contador.html(cantidadSeleccionada);
            //alert('ya wey');
        } else {
            var nuevoBoton = document.createElement("button");
            nuevoBoton.id = botonNombre;
            nuevoBoton.onclick = function () {
                $("[id^='show']").prop('disabled', true);
                goToDate(this);
                return false;
            }
            nuevoBoton.className = "btn btn-primary";
            nuevoBoton.style.display = "flex";
            nuevoBoton.style.fontSize = "0.7rem";
            nuevoBoton.innerHTML = variableFecha + '<div class="circle"><p>' + cantidadSeleccionada + '</p></div>';

            var espaciosSeleccionados = document.getElementById("espaciosSeleccionados");
            espaciosSeleccionados.appendChild(nuevoBoton);
        }
    }
    window.eliminarBoton = function (fecha) {
        var botonNombre = 'show' + fecha;
        var botonEliminar = $("#espaciosSeleccionados").find("#" + botonNombre);
        botonEliminar.remove();
        if ($("#espaciosSeleccionados").children().length <= 1) {
            $("#esPlaceholder").show();
        }
    }
  window.addEventListener('scroll', function (e) {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;

    if ($('.searcher.aside').length > 0) {
      var scrollTo = parseInt($('.venues-list').height()) + 260 - (parseInt($('.searcher.aside').height()) + 80);

      if (scrollY > 240 && scrollY < scrollTo) {
        $('.searcher.aside').css({
          position: 'fixed',
          top: '20px'
        });
      } else {
        if (scrollY > scrollTo) {
          $('.searcher.aside').css({
            position: 'absolute',
            top: scrollTo + 'px'
          });
        } else {
          $('.searcher.aside').css({
            position: 'absolute',
            top: '260px'
          });
        }
      }
    }

    if ($('.venue-characteristics').length > 0) {
      var scrollTo = parseInt($('.venue-detail').height()) + 260 - parseInt($('.venue-characteristics').height());

      if (scrollY > parseInt($('.venue-detail .shortcuts').offset().top) - 20 && scrollY < scrollTo) {
        $('.venue-characteristics').css({
          position: 'fixed',
          top: '20px'
        });

        if ($('.fixed-shortcuts').length == 0) {
          $('body').append('<div class="row fixed-shortcuts">' + $('.shortcuts').html() + '</div>');
          $('.fixed-shortcuts').css({
            width: parseInt($('.venue-detail .shortcuts').width()) + 102,
            left: parseInt($('.venue-detail .shortcuts').offset().left) - 35
          });
        } else {
          $('.fixed-shortcuts').css({
            position: 'fixed',
            top: 0
          });
        }
      } else {
        if (scrollY > scrollTo) {
          $('.venue-characteristics').css({
            position: 'absolute',
            top: scrollTo + 'px'
          });
          $('.fixed-shortcuts').css({
            position: 'absolute',
            top: scrollTo + 'px'
          });
        } else {
          $('.venue-characteristics').css({
            position: 'absolute',
            top: parseInt($('.venue-detail .shortcuts').offset().top) + 'px'
          });
          $('.fixed-shortcuts').css({
            position: 'absolute',
            top: parseInt($('.venue-detail .shortcuts').offset().top) - 20 + 'px'
          });
        }
      }
    }
  });
  $(document).on({
    click: function click(e) {
      e.preventDefault();

      if ($('.menu').hasClass('show')) {
        $('.menu').removeClass('show');
      } else {
        $('.menu').addClass('show');
      }
    }
  }, '.menu-toggle');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      $('input[name="daterange"]').click();
    }
  }, '.searcher ul li a[href="#date"]');
  $(document).on({
    click: function click(e) {
      if ($(window).width() < 600) {
        e.preventDefault();
      }
    }
  }, '.menu li.has-childs > a');
  $(document).on({
    click: function click(e) {
      e.preventDefault();

      if ($('.venues-menu ul').hasClass('show')) {
        $('.venues-menu ul').removeClass('show');
      } else {
        $('.venues-menu ul').addClass('show');
      }
    }
  }, '.venues-menu .toggle-venue-menu');
  $(document).on({
    click: function click(e) {
      e.preventDefault();

      if ($(this).closest('li').hasClass('open')) {
        $(this).closest('li').removeClass('open');
      } else {
        $(this).closest('li').addClass('open');
      }
    }
  }, '.searcher ul li a[href="#type"], .searcher ul li a[href="#quantity"], .searcher ul li a[href="#how"]');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var label = $(this).text();
      $(this).closest('li.open').find('a span').html(label);
      $(this).closest('li.open').find('input').val(label);
      $(this).closest('li.open').removeClass('open');
    }
  }, '.searcher ul li ul li a');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      $('.searcher form').submit();
    }
  }, '.searcher ul li a[href="#search"]');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var top = parseInt($('a[name="' + $(this).attr('href').substr(1) + '"]').offset().top);
      $('html, body').stop().animate({
        scrollTop: top + 'px'
      }, 350);
    }
  }, '.shortcuts a, .fixed-shortcuts a');
  $(document).on({
    submit: function submit() {
      if ($(this).hasClass('invalid')) {
        e.preventDefault();
      }
    }
  }, 'form');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var form = $(this).closest('form');
      var formValid = true;
      form.attr('action', $(this).attr('href'));
      form.removeClass('invalid');
      form.find('.invalid').removeClass('invalid');
      formValid = validateFormFields(form);

      if (formValid == false) {
        form.addClass('invalid');
      } else {
        form.submit();
      }
    }
  }, '.submit-form');
  $(document).on({
    blur: function blur(e) {
      validateFormFields($(this).closest('form'), $(this).attr('id'));
    }
  }, '.request input[type=text], .request input[type=email]');
  $(document).on({
    change: function change() {
      if ($(this).val() == 'Si') {
        $('.lodging-quantity').show();
      } else {
        $('.lodging-quantity').hide();
      }
    }
  }, '.request-step #lodging');
  $(document).on({
    change: function change() {
      if ($(this).val() == 'Si') {
        $('.work-in-campus').show();
      } else {
        $('.work-in-campus').hide();
      }
    }
  }, '.request-step #work-in-campus');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      var security_policies_modal = new bootstrap.Modal(document.querySelector('.modal#security-policies'), {
        keyboard: false
      });
      security_policies_modal.show();
    }
  }, 'a[href="#security-policies"]');
  $(document).on({
    click: function click(e) {
      e.preventDefault();
      $('.modal#security-policies').removeClass('show');
      $('.modal-backdrop').removeClass('show');
      setTimeout(function () {
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
        $('.modal#security-policies').css('display', 'none');
      }, 500);
    }
  }, '.modal .modal-dialog .modal-content .modal-header .btn-close');
  $(document).on({
    change: function change() {
      $('.company-fields #company').val('');
      $('.company-fields #identification').val('');

      if ($(this).prop('checked')) {
        $('.company-fields').css('display', 'block');
      } else {
        $('.company-fields').css('display', 'none');
      }
    }
  }, '#show-company-fields');
  $(document).on({
    change: function change() {
      if ($(this).get(0).files.length > 3) {
        alert('No puedes adjuntar más de 3 archivos');
      } else {
        if ($(this).get(0).files.length > 0) {
          $(this).parent().find('label').text($(this).get(0).files.length + ($(this).get(0).files.length != 1 ? ' archivos seleccionados' : ' archivo seleccionado'));
        } else {
          $(this).parent().find('label').text('Selecciona uno o varios archivos');
        }
      }
    }
  }, '.request input[type=file]');

  if ($('.other-methods #total').length > 0) {
    $('.other-methods #total').val($('.form-check .form-check-input:checked').attr('value'));
    $(document).on({
      change: function change(e) {
        $('.other-methods #total').val($(this).val());
      }
    }, '.form-check .form-check-input');
    $(document).on({
      change: function change(e) {
        if ($(this).val() == 'Páguelo Fácil') {
          $('.other-methods').hide();
          $('.paguelo-facil-container').show();
          $(this).val('ACH');
        }
      }
    }, '.other-methods #method');
    $(document).on({
      click: function click(e) {
        e.preventDefault();
        $('.paguelo-facil-container').hide();
        $('.other-methods').show();
      }
    }, '.other-methods-btn');
  }
});

var validateFormFields = function validateFormFields(form, field) {
  var formValid = true;

  if (field != undefined) {
    if (form.find('#' + field).length > 0) {
      form.find('#' + field).removeClass('invalid');

      if (form.find('#' + field).parent().hasClass('required') && form.find('#' + field).val() == '') {
        form.find('#' + field).addClass('invalid');
        formValid = false;
      }

      if (field == 'email') {
        emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (!emailReg.test(form.find('#email').val())) {
          form.find('#email').addClass('invalid');
          formValid = false;
        }
      }
    }

    return formValid;
  }

  if (form.find('#first_name').length > 0) {
    if (form.find('#first_name').val() == '') {
      form.find('#first_name').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#email').length > 0) {
    emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (form.find('#email').val() == '' || !emailReg.test(form.find('#email').val())) {
      form.find('#email').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#phone').length > 0) {
    if (form.find('#phone').val() == '') {
      form.find('#phone').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#name').length > 0) {
    if (form.find('#name').val() == '') {
      form.find('#name').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#type').length > 0) {
    if (form.find('#type').val() == '') {
      form.find('#type').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#quantity').length > 0) {
    if (form.find('#quantity').val() == '') {
      form.find('#quantity').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#how').length > 0) {
    if (form.find('#how').val() == '') {
      form.find('#how').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#bed').length > 0) {
    if (form.find('#bed').val() == '') {
      form.find('#bed').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#size').length > 0) {
    if (form.find('#size').val() == '') {
      form.find('#size').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#start-date').length > 0) {
    if (form.find('#start-date').val() == '') {
      form.find('#start-date').addClass('invalid');
      formValid = false;
    }
  }

  if (form.find('#end-date').length > 0) {
    if (form.find('#end-date').val() == '') {
      form.find('#end-date').addClass('invalid');
      formValid = false;
    }
  }

  return formValid;
};

setTimeout(function () {
  if (document.getElementById("twitter-timeline") > 0) {
    twttr.widgets.createTimeline({
      sourceType: "url",
      url: "https://twitter.com/CiudaddelSaber"
    }, document.getElementById("twitter-timeline"));
    twttr.events.bind('rendered', function (event) {
      var twitterContent = $('footer #twitter-timeline iframe').contents().find("body").html();
      $('footer #twitter-timeline').html('<div class="twitter-embed-header">ÚLTIMOS TWEETS</div>' + twitterContent);
      $.each($('footer #twitter-timeline .timeline-Widget .timeline-Body .timeline-Viewport .timeline-TweetList .timeline-TweetList-tweet'), function (index, element) {
        if (index > 2) {
          $(element).addClass('twitter-remove-element');
        }
      });
      $('footer #twitter-timeline .twitter-remove-element').remove();
      $('footer #twitter-timeline').show();
    });
  }
}, 2000);

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/core.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/navi/Work/Sites/ciudaddelsaber.org/eventos/comercial/resources/js/core.js */"./resources/js/core.js");


/***/ })

/******/ });
