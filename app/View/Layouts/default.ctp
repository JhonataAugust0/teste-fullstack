<!DOCTYPE html>
<html lang="pt-br">
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<?php echo $this->Html->charset(); ?>
	<title>Sistema de Gestão - Seu João</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<?php echo $this->Html->css('style'); ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white border-bottom py-3 mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-dark" href="<?php echo $this->Html->url('/'); ?>">
                Seu João LTDA
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-4">
                    <li class="nav-item">
                        <?php
                        $activeClass = ($this->params['controller'] == 'providers') ? 'text-danger fw-bold' : 'text-secondary';
                        echo $this->Html->link(
                            'Prestadores',
                            array('controller' => 'providers', 'action' => 'index'),
                            array('class' => 'nav-link ' . $activeClass)
                        );
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        $activeClass = ($this->params['controller'] == 'services') ? 'text-danger fw-bold' : 'text-secondary';
                        echo $this->Html->link(
                            'Catálogo de Serviços',
                            array('controller' => 'services', 'action' => 'index'),
                            array('class' => 'nav-link ' . $activeClass)
                        );
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                 <?php echo $this->Flash->render(); ?>
            </div>
        </div>

        <?php echo $this->fetch('content'); ?>
    </div>

	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Seletor para o novo visual (.flash-message) e legados
            var flashSelector = '.flash-message, .alert, .message, #flashMessage';

            if ($(flashSelector).length) {
                // Fade out após 5 segundos
                setTimeout(function() {
                    $(flashSelector).fadeOut(500, function(){
                        $(this).remove();
                    });
                }, 5000);
            }
        });
    </script>

    <?php echo $this->fetch('script'); ?>
</body>
</html>
