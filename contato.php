<section class="mb-4" id="contato">
    <h2 class="h1-responsive font-weight-bold text-center my-4">CONTATO</h2>
    <p class="text-center w-responsive mx-auto mb-5">Você tem alguma pergunta? Por favor, não hesite em nos contatar diretamente. Nossa equipe entrará em contato com você em questão de horas para ajudá-lo.</p>
    <div class="row sobre">
        <div class="col-md-7 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <div class="row sobre-colunas">

                    <div class="col-md-6 sobre-1">
                        <div class="md-form mb-0 ">
                            <label for="name" class="">Seu nome</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 sobre-2">
                        <div class="md-form mb-0">
                            <label for="email" class="">Seu e-mail</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="row sobre-3">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Assunto</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 sobre-4">
                        <div class="md-form">
                            <label for="message">Sua mensagem</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>
                    </div>
                </div>

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary fs-2 p-2" onclick="document.getElementById('contact-form').submit();">Enviar</a>
            </div>
            <div class="status"></div>
        </div>

        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-6x"></i>
                    <p class="fs-2">107, Asa Norte, Brasília</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-6x"></i>
                    <p class="fs-2">(61) 99999-1010</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-6x"></i>
                    <p class="fs-2">temdetudo@gmail.com</p>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php



?>