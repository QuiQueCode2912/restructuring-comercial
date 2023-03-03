
<style>
  body {
    overflow: hidden;
  }
  .vertical-center {
    width: 100%;
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

</style>
<div id="overlay" style="position:fixed;padding-top:0px;background-color: rgba(255,255,255,0.7);">
    <div class="vertical-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
            <br/>
            <div id="">Estamos procesando tu reserva!<br/>Por favor espera...</div>
    </div>
</div>

<div class="request-step">
  <div class="container">
  <div style="min-height:100vh">
 
    </div>
  </div>
</div>

<script>
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
