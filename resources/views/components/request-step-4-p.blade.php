
<style>
  body {
    overflow: hidden;
  }
  .vertical-center {
    width: 100%;
    margin: 0;
    position: absolute;
    top: 200px;
  }
.box {
  height: 220px;
  width: 220px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 100%;
  overflow: hidden;
}
.box .percent {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 3;
  width: 100%;
  height: 100%;
  display: flex;
  display: -webkit-flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 64px;
}
.box .water {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 2;
  width: 100%;
  height: 100%;
  transform: translate(0, 100%);
  background: #4D6DE3;
  transition: all 0.3s;
}
.box .water_wave {
  width: 200%;
  position: absolute;
  bottom: 100%;
}
.box .water_wave_back {
  right: 0;
  fill: #C7EEFF;
  -webkit-animation: wave-back 1.4s infinite linear;
          animation: wave-back 1.4s infinite linear;
}
.box .water_wave_front {
  left: 0;
  fill: #4D6DE3;
  margin-bottom: -1px;
  -webkit-animation: wave-front 0.7s infinite linear;
          animation: wave-front 0.7s infinite linear;
}

@-webkit-keyframes wave-front {
  100% {
    transform: translate(-50%, 0);
  }
}

@keyframes wave-front {
  100% {
    transform: translate(-50%, 0);
  }
}
@-webkit-keyframes wave-back {
  100% {
    transform: translate(50%, 0);
  }
}
@keyframes wave-back {
  100% {
    transform: translate(50%, 0);
  }
}
</style>
<div id="overlay" style="position:fixed;padding-top:0px;background-color: rgba(255,255,255,0.7);">
    <div class="vertical-center">
            <br/>
            <div id="">Estamos procesando tu reserva!<br/>Por favor espera...</div>
            <br/>
</div>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
  <symbol id="wave">
    <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
    <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
    <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
    <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
  </symbol>
</svg>
<div class="box">
  <div class="percent">
    <img src="/assets/images/cdsW.png">
  </div>
  <div id="water" class="water">
    <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
      <use xlink:href="#wave"></use>
    </svg>
    <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
      <use xlink:href="#wave"></use>
    </svg>
  </div>
</div>
    </div>


<div class="request-step">
  <div class="container">
  <div style="min-height:100vh">
 
    </div>
  </div>
</div>

<script>
var water = document.getElementById("water");
var percent = 0;
var interval;
interval = setInterval(function () {
  percent++;
  water.style.transform = 'translate(0' + ',' + (100 - percent) + '%)';
  if (percent == 100) {
    //clearInterval(interval);
    percent = 0;
  }
}, 60);
  function ready() {
    var sessionId = '<?php echo session()->get('00N3m00000QeGlb') ?>';
    console.log(sessionId);
    $.ajax({
                    url: '/getInsertedLeadId',
                    data: { 'websessionId': sessionId, 'mode': 'set' },
                    type: 'post',
                    cache: false,
                    async: true,
                    dataType: 'html',
	usePassport: true, 
	ignoreClientCertificate:true, 
                    success: function (response) {
                       console.log("LeadId: " + response);
                       variable = response.replace(/"/g, '');
                       if (variable.length == 15 || variable.length == 18) {
                            if (variable.substr(0, 3) === "00Q") {
                         // $("form").attr("action", "/solicitud-pago/" + variable).submit();
                           window.location.href = "/solicitud-pago/" + variable;
                             console.log("eureka");
                            } else {
                                setTimeout(function () {
                        ready();
                    }, 2000);
                            } } else {
                                setTimeout(function () {
                        ready();
                    }, 2000);
                       }
                    },
   error: function(data){
       var errors = data.responseJSON;
       console.log(errors);
       setTimeout(function () {
                        ready();
                    }, 2000);
   },
    timeout: 5000 
                    });
                    
  }

  window.addEventListener("load", ready);
</script>
