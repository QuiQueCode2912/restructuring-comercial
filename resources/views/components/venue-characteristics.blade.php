<?php $facilities = explode(';', $facilities); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Políticas de reserva y cancelación de espacios de CDS
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p><strong>Por favor, tenga en cuenta las siguientes normas y políticas durante su visita al Parque
                        Ciudad del Saber:</strong></p>
                <ul>
                    <li>Las reservas realizadas a través de la página web recibirán un correo de confirmación.</li>
                    <li>Para cancelar una reserva se debe acceder al correo de confirmación para desde allí cancelar la reserva.</li>
                    <li>Las cancelaciones realizadas 12 horas antes de la fecha reservada recibirán un reembolso del 100%.</li>
                    <li>Las cancelaciones realizadas dentro de las 12 horas antes de la fecha reservada recibirán un reembolso del 50%.</li>
                    <li>Por favor, tenga en cuenta que los reembolsos sólo se tramitarán por ACH.</li>
                </ul>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Inicio segundo Modal  -->

<div class="modal fade" id="modalParque" tabindex="-1" role="dialog" aria-labelledby="modalParque" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalParque">Reglamentos de uso del Parque Ciudad del Saber </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>No se permite el consumo y venta de bebidas alcohólicas.</li>
                    <li>No se permite la venta de comida y bebidas (sodas, aguas, bebidas energizantes, etc.).</li>
                    <li>No se permite fumar.</li>
                    <li>Cumplir con el uso apropiado de los estacionamientos. No se pueden estacionar en los laterales de la vía principal del Parque.</li>
                    <li>No se permite el uso de murgas, troneras, parlantes, bocinas, micrófonos y otros instrumentos de ruido excesivo.</li>
                    <li>Se le solicita depositar los desechos de basura que se produzcan durante el uso de la instalación en los cestos de basura. Se le hará un cargo de B/. 100.00 en caso de encontrar algún tipo de desecho en el área asignada.</li>
                    <li>LA FUNDACIÓN por condiciones climatológicas se reserva el derecho de uso de las instalaciones para preservar el buen estado de estas.</li>
                    <li>LA FUNDACIÓN no se hará responsable por la pérdida de objetos de valor (prendas, celulares, equipos deportivos, etc.) durante el desarrollo de las actividades.</li>
                    <li>El Cliente exonera a LA FUNDACIÓN de cualquier imprevisto, lesión o accidente que ocurra con algún participante durante las actividades del evento.</li>
                    <li>Respetar y obedecer las instrucciones del personal del Parque Ciudad del Saber y agentes de Seguridad de CdS.</li>
                    <li>Se prohíbe los actos de violencia, riña y palabras ofensivas durante las actividades. De ocurrir algunos de estos hechos, El Cliente deberá expulsar al equipo o persona que incurrió en la falta y, de tratarse de la barra, esta deberá abandonar las instalaciones.</li>
                </ul>
                        
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Inicio tecer Modal  -->

<div class="modal fade" id="modalInfoSpaces" tabindex="-1" role="dialog" aria-labelledby="modalInfoSpaces"
    aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInfoSpaces">Reglamentos de uso de
                    @if ($parentid == '02i3m00000DiduZAAR')
                        Piscina
                    @endif
                    @if ($parentid == '02i3m00000DidtxAAB')
                        Canchas de Baloncesto
                    @endif
                    @if ($parentid == '02i3m00000Didu3AAB')
                        Canchas de Voleibol
                    @endif
                    @if ($parentid == '02i3m00000Didu7AAB')
                        Tenis
                    @endif
                    @if ($parentid == '02i3m00000FbwwjAAB')
                        Boxeo
                    @endif
                    @if ($parentid == '02i3m00000Fx0PEAAZ')
                        Ráquetbol
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Boxeo -->
                @if ($parentid == '02i3m00000FbwwjAAB')
                    <ul>
                        <li>Deben utilizar calzado deportivo dentro de la instalación con suela de goma o lisa.</li>
                        <li>Es obligatorio el uso de guantes y toalla.</li>
                        <li>No se permite quitarse la camisa dentro de la instalación.</li>
                        <li>El uso del espacio es exclusivo solamente para boxeo.</li>
                        <li>No se permite guindarse sobre en los sacos o mover las peras.</li>
                        <li>Está prohibido el consumo de alimentos, salvo agua o bebidas hidratantes.</li>
                        <li>No están permitidos los envases sin tapa o de vidrio.</li>
                        <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el
                            entrenamiento de las demás personas.</li>
                        <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus
                            condiciones y limitaciones físicas y de salud.</li>
                    </ul>
                @endif

                <!-- Tenis info -->
                @if ($parentid == '02i3m00000Didu7AAB')
                    <ul>

                        <li>Deben utilizar calzado deportivo dentro de la instalación con suela de goma o lisa.</li>
                        <li>No se permite quitarse la camisa dentro de la instalación.</li>
                        <li>El uso de la cancha es exclusivo solamente para tenis.</li>
                        <li>No se permite el ingreso de mascotas, dentro solo pueden estar los jugadores.</li>
                        <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el
                            entrenamiento de las demás personas.</li>
                        <li>El empleo de canastas con bolas o máquinas lanzadoras está reservado exclusivamente para
                            instructores autorizados por la Administración. Los usuarios habituales deben restringirse
                            al uso de un máximo de seis (6) pelotas por cancha.</li>
                        <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus
                            condiciones y limitaciones físicas y de salud.</li>

                        <hr />
                        <p>El marcado del cuadro o la cancha será por cuenta de El Cliente.</p>

                    </ul>
                @endif


                <!-- Volei info -->
                @if ($parentid == '02i3m00000Didu3AAB')
                    <ul>
                        <li>En la cancha de tabloncillo sólo se permite calzado con suela de goma.</li>
                        <li>En la cancha de arena debe utilizar calzado deportivo.</li>
                        <li>No se permite quitarse la camisa dentro de la instalación.</li>
                        <li>En la cancha de tabloncillo sólo pueden estar los 12 jugadores dentro de la cancha al
                            momento
                            del
                            partido.</li>
                        <li>En la cancha de arena sólo pueden estar los 4 jugadores dentro de la cancha al momento del
                            partido.</li>
                        <li>El uso de la cancha es exclusivo solamente para jugar voleibol.</li>
                        <li>Se prohíbe mover, guindarse y manipular la red.</li>
                        <li>Está prohibido el consumo de alimentos, salvo agua o bebidas hidratantes.</li>
                        <li>No están permitidos los envases sin tapa o de vidrio.</li>
                        <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el
                            entrenamiento de las demás personas.</li>
                        <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus
                            condiciones y limitaciones físicas y de salud.</li>
                    </ul>
                @endif


                <!-- Baloncesto info -->
                @if ($parentid == '02i3m00000DidtxAAB')
                    <ul>
                        <li>En la cancha de tabloncillo sólo se permite calzado con suela de goma.</li>
                        <li>Para la cancha al aire libre debes utilizar calzado deportivo.</li>
                        <li>No se permite quitarse la camisa dentro de la instalación.</li>
                        <li>Al momento del partido sólo pueden estar los 10 jugadores dentro de la cancha.</li>
                        <li>El uso de la cancha es exclusivo solamente para jugar baloncesto.</li>
                        <li>Está prohibido el consumo de alimentos, salvo agua o bebidas hidratantes.</li>
                        <li>No están permitidos los envases sin tapa o de vidrio.</li>
                        <li>Se permite reproducir música a bajo volumen, de manera que no incomodes o afectes el
                            entrenamiento de las demás personas.</li>
                        <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus
                            condiciones y limitaciones físicas y de salud.</li>
                    </ul>
                @endif

                <!-- Piscina info -->
                @if ($parentid == '02i3m00000DiduZAAR')
                    <ul>
                        <li>La entrada y salida de la piscina es a través de los baños y deberán ducharse antes de hacer
                            uso de esta.</li>
                        <li>No se permitirá el uso inadecuado de vestidos de baño. Está permitido también vestir prendas
                            de fibras sintéticas como lycra, dry fit, neopreno u otras especiales para el agua. Deben
                            utilizar gorro de natación.</li>
                        <li>No se permite comer fuera del área designada o en los alrededores de la piscina.</li>
                        <li>No está permitido actos afectivos e inmorales.</li>
                        <li>Está prohibido sentarse en las carrileras.</li>
                        <li>Se prohíbe el uso de lenguaje obsceno y abusivo.</li>
                        <li>No se permitirá el uso de la piscina a personas que tengan cortaduras abiertas, ampollas,
                            algún tipo de infección o uso de curitas.</li>
                        <li>Las personas menores de edad deberán estar siempre acompañadas y supervisadas por una
                            persona adulta responsable, que sepa nadar y permanezca en el área de la piscina.</li>
                        <li>El uso del trampolín sólo se dará cuando el guardavida lo autorice.</li>
                        <li>No está permitido correr ni realizar prácticas o juegos peligrosos ni en el perímetro ni
                            dentro de la piscina.</li>
                        <li>Después de comer, esperar el tiempo correspondiente para hacer uso de la piscina.</li>
                        <li>La presencia del guardavida es para minimizar accidentes; todo adulto es responsable de sus
                            dependientes e invitados.</li>
                        <li>No se permite el ingreso de mascotas.</li>
                        <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus
                            condiciones y limitaciones físicas y de salud.</li>
                    </ul>
                @endif

                <!-- Raquetbol -->
                @if ($parentid == '02i3m00000Fx0PEAAZ')
                    <ul>
                        <li>El cliente debe traer su raqueta y pelotas para jugar.</li>
                        <li>Es obligatorio el uso de lentes de protección para ingresar a las canchas.</li>
                    </ul>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Fin Segundo Modal  -->


<div class="venue-characteristics">
    <span style="color:#0088ff">Características del venue</span>
    <ul>
        <?php if ($type == 'Vivienda') : ?>
        <li>Finos acabados</li>
        <li>Sala</li>
        <li>Comedor</li>
        <li>Baños</li>
        <li>Estacionamientos</li>
        <li>Pet friendly</li>
        <li style="padding-bottom:20px; border-bottom:none">Listas para ocupar</li>
        <?php else : ?>
        <?php if ($venue == 'Parque Ciudad del Saber') : ?>

        <?php else : ?>
        <?php if ($venue != 'Ateneo') : ?>
        <li class="title">Centro de conferencias y oficinas</li>
        <li>Capacidad {{ $maxpax }} personas máximo</li>
        <li>{{ $venues }} aulas / salones para eventos</li>
        <li style="padding-bottom:20px; border-bottom:none">96 habitaciones</li>
        <?php endif ?>
        <?php endif ?>
        <li class="title">Facilidades</li>
        <?php if ($facilities) : ?>
        <?php foreach ($facilities as $facility) : ?>
        <li><?php echo $facility; ?></li>
        <?php endforeach ?>
        <?php else : ?>
        <li>No registra</li>
        <?php endif ?>
        <?php endif ?>
    </ul>
    <br />
    @if ($venue == 'Parque Ciudad del Saber')
        <a href="" data-toggle="modal" data-target="#myModal" style="cursor: pointer;"><b>Políticas de reserva y
                cancelación de espacios de CDS</b></a>
        <a href="" data-toggle="modal" data-target="#modalParque" style="cursor: pointer;display:block;margin-top:1%"><b>Reglamentos de uso del Parque Ciudad del Saber </b></a>
                
        @if (
            $parentid == '02i3m00000DiduZAAR' ||
                $parentid == '02i3m00000Didu3AAB' ||
                $parentid == '02i3m00000Didu7AAB' ||
                $parentid == '02i3m00000Fx0PEAAZ' ||
                $parentid == '02i3m00000FbwwjAAB' ||
                $parentid == '02i3m00000DidtxAAB')

            <a href="" data-toggle="modal" data-target="#modalInfoSpaces"
                style="cursor: pointer;display:block;margin-top:1%">
                <b>Reglamentos de uso del área deportiva </b>
            </a>
        @endif

    @endif
    @if ($showpolicies ?? true)
        <br />
        <x-security-measures />
        <br /><br />
        <p class="small" style="max-width:270px">
            <img src="/assets/images/halt-hand.png" width="30" style="margin-bottom:5px" />
            <br />
            Si tu evento requiere de múltiples espacios o excede las 24hs, puedes
            conectarte con nosotros desde el formulario al pie de la página.
        </p>
    @endif
</div>
