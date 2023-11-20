<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>¿Quieres realizar una consulta del parque ? <br>
                    Podemos ayudarte</h3><br>
                <p>
                    Si necesitas reservar espacios múltiples u organizar eventos que duren más de
                    un día, estamos aquí para ayudarte a planificarlo. Por favor completa este formulario y un miembro
                    del equipo de Ciudad del Saber
                    se pondrá en contacto contigo para que puedas concretar tu proyecto.
                </p>
                <p>
                    <strong>Crea</strong> <span style="color:#0088ff">+</span>
                    <strong>Estudia</strong> <span style="color:#0088ff">+</span>
                    <strong>Trabaja</strong> <span style="color:#0088ff">+</span>
                    <strong>Vive</strong> <span style="color:#0088ff">+</span>
                    <strong>Ejercita</strong>
                </p>
            </div>
            <div class="col-12 col-md-6">
                <small style="color:#0088ff">* Campos obligatorios</small>
                <form method="POST" action="{{ route('process-consult-sf') }}">
                    @csrf
                    <div class="row" style="padding-top:10px">
                        <div class="col-12 col-md-6">
                            <div class="form-group required">
                                <input type="text" class="form-control" name="Name" maxlength="40"
                                    id="Name" required placeholder="Nombres">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group required">
                                <input type="text" class="form-control" name="Apellido__c" maxlength="80"
                                    id="Apellido__c" required placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group required">
                                <input type="email" class="form-control" name="Correo__c" id="Correo__c" maxlength="80"
                                    required placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group required">
                                <input type="text" class="form-control" id="Telefono__c" name="Telefono__c" maxlength="20"
                                    required placeholder="Número telefónico">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <select id="Motivo__c" name="Motivo__c">
                                    <option value="">Me interesa</option>
                                    <option value="Evento en el parque">Evento en el parque</option>
                                    <option value="liga">liga</option>
                                    <option value="torneo">torneo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
                <small>Al hacer clic en el botón de enviar aceptas nuestros <a href="#">Términos de uso y
                        privacidad</a></small>
            </div>
        </div>
    </div>
</div>
