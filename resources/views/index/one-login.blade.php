<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Ciudad del Saber</title>
		<style>
      body {
        background: #ffffff;
        padding: 30px;
        text-align: center;
      }
      body .content {
        max-width: 400px;
        width: 100%;
        margin: 20% 50% 0;
        transform: translate(-50%);
        font-family: sans-serif;
        text-align: center;
      }
      .spinner {
        display: inline-block;
        width: 100px;
        height: 100px;
        background: rgb(44,180,230);
        background: -moz-linear-gradient(180deg, rgba(44,180,230,1) 30%, rgba(255,255,255,1) 100%);
        background: -webkit-linear-gradient(180deg, rgba(44,180,230,1) 30%, rgba(255,255,255,1) 100%);
        background: linear-gradient(180deg, rgba(44,180,230,1) 30%, rgba(255,255,255,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#2cb4e6",endColorstr="#ffffff",GradientType=1);
        animation-name: rotation;
        animation-duration: 1s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        border-radius: 50%;
        position: relative;
      }
			.spinner::before {
				width: 72px;
				height: 72px;
				display: block;
				background: #ffffff;
				position: absolute;
				top: 14px;
				left: 14px;
				z-index: 10;
				border-radius: 50%;
				content: "";
			}
			.spinner::after {
				position: absolute;
				display: block;
				content: "";
				right: 0;
				top: 0;
				bottom: 0;
				left: 50%;
				background: #ffffff;
				z-index:12px;
			}
      button {
        background: #ffffff;
        color: #989898;
        padding: 10px 15px;
        border-radius: 5px;
        text-align: center;
        border: none;
        font-size: 20px;
		    letter-spacing: 2px;
      }
      p {
        color: red;
        font-size: 13px;
        margin-top: 20px;
      }
      p + input[name=email] {
        margin-top: 0;
      }
			
			@keyframes rotation {
        from {transform: rotate(0deg);}
        to {transform: rotate(360deg);}
      }
		</style>
	</head>
	<body>
    <div class="content">
      <form method="post">
        @csrf
        <?php if (isset($error) && $error == 1) : ?>
        <p>Ha ocurrido un error. No puedes iniciar sesión.</p>
        <?php endif ?>
        <input type="hidden" name="email" id="email" value="" />
        <br />
		  <span class="spinner"></span>
		  <br /><br /><br />
        <button type="submit">LOGGING IN ...</button>
      </form>
    </div>
	</body>
</html>
