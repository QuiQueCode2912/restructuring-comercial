<?php
$from_hour = session()->get('00N3m00000QMwta-hour', null);
$to_hour = session()->get('00N3m00000QMwtf-hour', null);

if (is_null($from_hour)) {
    session()->put('00N3m00000QMwta-hour', date('H') . ':00');
}

if (is_null($to_hour)) {
    session()->put('00N3m00000QMwtf-hour', date('H') + 1 . ':00');
}
?>

<x-error-message />

<div class="request-step">
    <div class="container">
        <h4>Cuéntanos algunos datos de tu evento</h4>
        <div class="row form-error-message">
            <div class="col-12">Sólo tienes que completar los datos que faltan</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group required">
                    <input type="text" class="form-control" id="name" name="00N3m00000QQOdA" placeholder="Nombre del evento" value="<?php echo session()->get('00N3m00000QQOdA', old('00N3m00000QQOdA')); ?>">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group required">
                    <select class="form-control" id="type" name="00N3m00000QMsCF">
                        <option value="">Tipo de actividad</option>
                        <option <?php echo session()->get('00N3m00000QMsCF', old('00N3m00000QMsCF')) == 'Cumpleaños' ? 'selected="selected"' : ''; ?>>Cumpleaños</option>
                        <option <?php echo session()->get('00N3m00000QMsCF', old('00N3m00000QMsCF')) == 'Revelación de género' ? 'selected="selected"' : ''; ?>>Revelación de género</option>
                        <option <?php echo session()->get('00N3m00000QMsCF', old('00N3m00000QMsCF')) == 'Reunión Familiar' ? 'selected="selected"' : ''; ?>>Reunión Familiar</option>
                        <option <?php echo session()->get('00N3m00000QMsCF', old('00N3m00000QMsCF')) == 'Taller de cuerdas' ? 'selected="selected"' : ''; ?>>Taller de cuerdas</option>
                        <option <?php echo session()->get('00N3m00000QMsCF', old('00N3m00000QMsCF')) == 'Otros' ? 'selected="selected"' : ''; ?>>Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group required">
                    <select class="form-control" id="quantity" name="00N3m00000QMsCA">
                        <option value="">Cantidad de personas</option>
                        <option <?php echo session()->get('00N3m00000QMsCA', old('00N3m00000QMsCA')) == 'Entre 1 y 50 personas' ? 'selected="selected"' : ''; ?>>Entre 1 y 50 personas</option>
                        <option <?php echo session()->get('00N3m00000QMsCA', old('00N3m00000QMsCA')) == 'Entre 51 y 80 personas' ? 'selected="selected"' : ''; ?>>Entre 51 y 80 personas</option>
                        <option <?php echo session()->get('00N3m00000QMsCA', old('00N3m00000QMsCA')) == 'Entre 81 y 150 personas' ? 'selected="selected"' : ''; ?>>Entre 81 y 150 personas</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <select class="form-control" id="00NRb000001kQmx" name="00NRb000001kQmx">
                        <option value="">¿Quisiera reservar una cancha deportiva?</option>
                        <option value="">No</option>
                        <option <?php echo session()->get('00NRb000001kQmx', old('00NRb000001kQmx')) == 'Baloncesto' ? 'selected="selected"' : ''; ?> value="Baloncesto">Baloncesto</option>
                        <option <?php echo session()->get('00NRb000001kQmx', old('00NRb000001kQmx')) == 'Piscina' ? 'selected="selected"' : ''; ?> value="Piscina">Piscina</option>
                        <option <?php echo session()->get('00NRb000001kQmx', old('00NRb000001kQmx')) == 'Futbol' ? 'selected="selected"' : ''; ?> value="Futbol">Futbol</option>
                        <option <?php echo session()->get('00NRb000001kQmx', old('00NRb000001kQmx')) == 'Beisbol' ? 'selected="selected"' : ''; ?> value="Beisbol">Beisbol</option>
                        <option <?php echo session()->get('00NRb000001kQmx', old('00NRb000001kQmx')) == 'Voleibol' ? 'selected="selected"' : ''; ?> value="Voleibol">Voleibol</option>
                        <option <?php echo session()->get('00NRb000001kQmx', old('00NRb000001kQmx')) == 'Tenis' ? 'selected="selected"' : ''; ?> value="Tenis ">Tenis</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group required">
                    <input type="text" class="form-control datepicker" name="00N3m00000QMwta" id="start-date" placeholder="Fecha de inicio" value="<?php echo session()->get('00N3m00000QMwta', old('00N3m00000QMwta')); ?>">
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group required">
                    <select class="form-control" id="end-date-from" name="00N3m00000QMwta-hour">
                        <?php for ($i = 8; $i <= 18; $i++) : ?>
                            <option <?php echo session()->get('00N3m00000QMwta-hour', old('00N3m00000QMwta-hour')) == str_pad($i, 2, 0, STR_PAD_LEFT) . ':00' ? 'selected' : ''; ?> value="<?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:00"><?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:00</option>
                            <?php if($i != 18): ?>
                                <option <?php echo session()->get('00N3m00000QMwta-hour', old('00N3m00000QMwta-hour')) == str_pad($i, 2, 0, STR_PAD_LEFT) . ':30' ? 'selected' : ''; ?> value="<?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:30"><?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:30</option>
                            <?php endif; ?>
                        <?php endfor ?>
                    </select>
                </div>

            </div>
            <div class="col-12 col-md-4">
                <div class="form-group required">
                    <input type="text" class="form-control datepicker" name="00N3m00000QMwtf" id="end-date" placeholder="Fecha de finalización" value="<?php echo session()->get('00N3m00000QMwtf', old('00N3m00000QMwtf')); ?>">
                </div>

            </div>
            <div class="col-12 col-md-2">
                <div class="form-group required">
                    <select class="form-control" id="end-date-hour" name="00N3m00000QMwtf-hour">
                        <?php for  ($i = 8; $i <= 18; $i++) : ?>
                            <option <?php echo session()->get('00N3m00000QMwtf-hour', old('00N3m00000QMwtf-hour')) == str_pad($i, 2, 0, STR_PAD_LEFT) . ':00' ? 'selected' : ''; ?> value="<?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:00"><?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:00</option>
                            <?php if($i != 18): ?>
                                <option <?php echo session()->get('00N3m00000QMwtf-hour', old('00N3m00000QMwtf-hour')) == str_pad($i, 2, 0, STR_PAD_LEFT) . ':30' ? 'selected' : ''; ?> value="<?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:30"><?php echo str_pad($i, 2, 0, STR_PAD_LEFT); ?>:30</option>
                            <?php endif; ?>
                        <?php endfor ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <p style="margin:5px 0 0; line-height:1rem">
                    <small>Estas fechas están sujetas a evaluación de disponibilidad, la solicitud de la cotización no es una reserva del espacio.</small>
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" value="1" name="00N3m00000QQOdy" id="variable-dates" <?php echo session()->get('00N3m00000QQOdy', old('00N3m00000QQOdy')) == 1 ? 'checked="checked"' : ''; ?>>
                    <label class="custom-control-label" for="variable-dates"><small>Indica si tus fechas son
                            flexibles</small></label>
                </div>
            </div>
        </div>



        <?php if ($venue ?? '') : ?>
            <div class="row" style="margin-top:40px">
                <div class="col-12 col-md-6">
                    <div class="form-group-preview" style="background:#ffffff; border:1px solid #000000; padding:12px 20px">
                        Venue: <?php echo $venue; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-check">
                        <input type="checkbox" class="custom-control-input" value="1" name="00NRb000001kQmw" id="00NRb000001kQmw" <?php echo session()->get('00NRb000001kQmw', old('00NRb000001kQmw')) == 1 ? 'checked="checked"' : ''; ?>>
                        <label class="custom-control-label" for="00NRb000001kQmw"><small>Gazebos adicionales</small></label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="custom-control-input" value="1" name="00NRb000001kQmv" id="00NRb000001kQmv" <?php echo session()->get('00NRb000001kQmv', old('00NRb000001kQmv')) == 1 ? 'checked="checked"' : ''; ?>>
                        <label class="custom-control-label" for="00NRb000001kQmv"><small>Alquiler de sillas y mesas</small></label>
                    </div>
                </div>

            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-12">
                <p class="small" style="font-size: 0.7rem !important;">Compartenos la agenda de tu evento y en caso de solicitar canchas, sillas, mesas y/o gazebos adicionales añade aquí las especificaciones sobre estos elementos adicionales.</p>
                <div class="position-relative ">
                    <span class="custom-ast">*</span>
                    <textarea name="description"  style="padding-left: 16.5px;" placeholder=" Describe tu evento" required id="descriptionBohios"><?php echo session()->get('description', old('description')); ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <a href="#"><small>* Campos obligatorios</small></a>
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