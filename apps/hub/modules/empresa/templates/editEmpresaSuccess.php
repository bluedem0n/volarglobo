<section class="content-header">
          <h1>
            Editar datos de la empresa
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo url_for('empresa/index')?>">Empresa</a></li>
            <li class="active">Edición</li>
          </ol>
</section>
<?php include_partial('form', array('form' => $form)) ?>
