
<div class="request-step">
  <div class="container">



  </div>
</div>

<script>
  function ready() {
    var sessionId = '<?php echo session()->getId() ?>';
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
