<?php include('includes/templates/header2.php'); ?>
<header class="header valign bg-img" data-scroll-index="0" data-overlay-dark="7" data-background="assets/img/bg4.jpg"
    data-stellar-background-ratio="0.5">

    <div class="container">
        <div class="text-center caption mt-30 col-12 col-lg-8">
            <h1>Contacto</h1>
            <div class="row">
                <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                    <p>Somos una empresa de programación web, especializada en realizar la paginas a la medida de su
                        negocio, tenemos variedad de soluciones que se ajustan a tus necesidades.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="curve curve-bottom curve-center"></div>
</header>
<!-- =====================================
        ==== Start Works -->

        <section class="contact section-padding" data-scroll-index="6">
    <div class="container">
        <div class="row">

            <div class="section-head offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                <h4>Ponte <span>En</span> Contacto</h4>
                <p>Somos una empresa de programación web, especializada en realizar la paginas a la medida.</p>
            </div>

            <div class="col-lg-5">
                <div class="contact-info mb-md50">
                    <h5>Contactanos :</h5>
                    <div class="item">
                        <span class="icon icon-basic-tablet"></span>
                        <div class="cont">
                            <h6>Telefonos : </h6>
                            <p><a href="tel:+573203736955">+57 3203736955</a> - <a href="tel:+573138890310">+57 3138890310</a></p>
                        </div>
                    </div>
                    <div class="item">
                        <span class="icon icon-basic-mail-open-text"></span>
                        <div class="cont">
                            <h6>Correo : </h6>
                            <a href="mailto:contacto@devsgo.com.co,tecnologias@devsgo.com.co"><p>contacto@devsgo.com.co</p></a>
                        </div>
                    </div>
                    <div class="item">
                        <span class="icon icon-basic-geolocalize-05"></span>
                        <div class="cont">
                            <h6>Ciudad : </h6>
                            <p>Bogota, Colombia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form">

                    <div class="messages">
                        <div class="alert alert-danger oculto" role="alert" id="mensajeAlerta">
                            Faltan campos <strong>obligatorios</strong> revisa la informacion e intenta nuevamente.
                        </div>
                        <div class="alert alert-success oculto" role="alert" id="mensajeSuccess">
                            Tu mensaje ha sido <strong>enviado</strong> satisfactoriamente, nos estaremos comunicando
                            contigo.
                        </div>
                    </div>

                    <div class="controls">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="nombre" type="text" name="name" placeholder="Nombre" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="email" type="email" name="email" placeholder="Correo"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="asunto" type="text" name="subject" placeholder="Asunto">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="mensaje" name="message" placeholder="Mensaje" rows="4"
                                        required="required"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="butn butn-bg btn-block"
                                    id="contacto"><span>Enviar</span></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- End Works ========================================== -->

<?php include('includes/templates/footer.php'); ?>