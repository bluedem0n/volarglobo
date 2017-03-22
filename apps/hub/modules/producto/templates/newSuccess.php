<section class="content-header">
          <h1>
            Servicios/productos del proveedor
            <small><a href="<?php echo url_for('producto/new')?>">(Ingresar nuevo)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('producto/index')?>">Servicios/productos del proveedor</a></li>
            <li class="active">Ingreso nuevo</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form,'de'=>$de)) ?>
