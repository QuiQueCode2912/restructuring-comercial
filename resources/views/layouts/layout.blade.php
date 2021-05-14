<?php $token = 202105141113 ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page_title ?? 'Servicios' }}</title>

    <link rel="stylesheet" href="/assets/feather/feather.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css?t=<?php echo $token ?>" />
    <link rel="stylesheet" href="/css/responsive.css?t=<?php echo $token ?>" />
  </head>
  <body class="antialiased">
    <div class="main-container">
      @yield('content')
    
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      <script type="text/javascript" src="/js/core.js?t=<?php echo $token ?>"></script>

      <style type='text/css'>
        .embeddedServiceHelpButton .helpButton .uiButton {
          background-color: #005290;
          font-family: "Arial", sans-serif;
        }
        .embeddedServiceHelpButton .helpButton .uiButton:focus {
          outline: 1px solid #005290;
        }
      </style>
      
      <script type='text/javascript' src='https://service.force.com/embeddedservice/5.0/esw.min.js'></script>
      <script type='text/javascript'>
        var initESW = function(gslbBaseURL) {
          embedded_svc.settings.displayHelpButton = true; //Or false
          embedded_svc.settings.language = ''; //For example, enter 'en' or 'en-US'

          //embedded_svc.settings.defaultMinimizedText = '...'; //(Defaults to Chat with an Expert)
          //embedded_svc.settings.disabledMinimizedText = '...'; //(Defaults to Agent Offline)

          //embedded_svc.settings.loadingText = ''; //(Defaults to Loading)
          //embedded_svc.settings.storageDomain = 'yourdomain.com'; //(Sets the domain for your deployment so that visitors can navigate subdomains during a chat session)

          // Settings for Chat
          //embedded_svc.settings.directToButtonRouting = function(prechatFormData) {
            // Dynamically changes the button ID based on what the visitor enters in the pre-chat form.
            // Returns a valid button ID.
          //};
          embedded_svc.settings.prepopulatedPrechatFields = {
            FirstName: 'John',
            LastName: 'Doe',
            Email: 'john.doe@salesforce.com',
            Subject: 'Hello'
          };
          //embedded_svc.settings.fallbackRouting = []; //An array of button IDs, user IDs, or userId_buttonId
          //embedded_svc.settings.offlineSupportMinimizedText = '...'; //(Defaults to Contact Us)

          embedded_svc.settings.enabledFeatures = ['LiveAgent'];
          embedded_svc.settings.entryFeature = 'LiveAgent';

          embedded_svc.init(
            'https://fcds.my.salesforce.com',
            'https://fcds.force.com/public',
            gslbBaseURL,
            '00D1N000002MAgJ',
            'MPDN',
            {
              baseLiveAgentContentURL: 'https://c.la4-c4-ph2.salesforceliveagent.com/content',
              deploymentId: '5723m000000Cn14',
              buttonId: '5733m000000CntV',
              baseLiveAgentURL: 'https://d.la4-c4-ph2.salesforceliveagent.com/chat',
              eswLiveAgentDevName: 'MPDN',
              isOfflineSupportEnabled: true
            }
          );
        };
        
        if (!window.embedded_svc) {
          var s = document.createElement('script');
          s.setAttribute('src', 'https://fcds.my.salesforce.com/embeddedservice/5.0/esw.min.js');
          s.onload = function() {
            initESW(null);
          };
          document.body.appendChild(s);
        } else {
          initESW('https://service.force.com');
        }
      </script>
    </div>
  </body>
</html>