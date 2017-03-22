<section class="content-header">
          <h1>
            Edición del rango de edad
            <small><a href="<?php echo url_for('rango_edad/new')?>">(Ingresar nueva)</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('rango_edad/index')?>">Rango de edad</a></li>
            <li class="active">Edición</li>
          </ol>
</section>

<?php include_partial('form', array('form' => $form, 'idUser' => $idUser, 'parent' => $parent)) ?>
