<section class="content-header">
          <h1>
            Ingreso de la ciudad
            <small>vista previa</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('ciudad/index')?>">ciudad</a></li>
            <li class="active">Ingreso nuevo</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form)) ?>
