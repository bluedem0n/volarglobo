<section class="content-header">
          <h1>
            Edición de las políticas de excursiones
            <small><a href="<?php echo url_for('excursion_politica/new')?>">(Ingresar nueva)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('excursion_politica/index')?>">Política de excursión</a></li>
            <li class="active">Edición</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form)) ?>
