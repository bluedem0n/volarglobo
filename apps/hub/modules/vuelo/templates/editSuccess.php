<section class="content-header">
          <h1>
            Edición del Vuelos - cliente
            <small><a href="<?php echo url_for('vuelo/new')?>">(Ingresar nuevo)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('/vuelo/index')?>">Vuelos - cliente</a></li>
            <li class="active">Edición</li>
          </ol>
</section>
<?php include_partial('form', array('form' => $form)) ?>
