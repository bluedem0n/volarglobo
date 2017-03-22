<section class="content-header">
          <h1>
            Edición de las inclusiones
            <small><a href="<?php echo url_for('excursion_inclusion/new')?>">(Ingresar nueva)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('excursion_inclusion/index')?>">Inclusión de excursión</a></li>
            <li class="active">Edición</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form)) ?>
