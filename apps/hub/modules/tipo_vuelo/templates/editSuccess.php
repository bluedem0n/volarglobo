<section class="content-header">
          <h1>
            Edición del Tipo vuelos
            <small><a href="<?php echo url_for('tipo_vuelo/new')?>">(Ingresar nueva)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('tipo_vuelo/index')?>">Tipos vuelos</a></li>
            <li class="active">Edición</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form)) ?>
