<section class="content-header">
          <h1>
            Edición de los lugares de interés
            <small><a href="<?php echo url_for('excursion_lugar_interes/new')?>">(Ingresar nueva)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('excursion_lugar_interes/index')?>">Lugar de interés</a></li>
            <li class="active">Edición</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form)) ?>
