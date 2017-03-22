<section class="content-header">
          <h1>
            Edición del tipo de transmisión del vehículo
            <small><a href="<?php echo url_for('vehiculo_tipo_transmision/new')?>">(Ingresar nueva)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('vehiculo_tipo_transmision/index')?>">Tipo de transmisión del vehiculo</a></li>
            <li class="active">Edición</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form)) ?>
