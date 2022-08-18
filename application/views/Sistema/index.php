<?php $this->load->view('layout/sidebar'); ?>

      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
          </ol>
        </nav>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <form method="POST" name="form_edit">
                <div class="form-group row">
                  
                  <div class="col-md-4">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="sistema_razao_social" placeholder="Razão social" value="<?php echo $sistema->sistema_razao_social; ?>">
                    <?php echo form_error('sistema_razao_social', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control" name="sistema_nome_fantasia" placeholder="Nome fantasia" value="<?php echo $sistema->sistema_nome_fantasia; ?>">
                    <?php echo form_error('sistema_nome_fantasia', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>E-mail&nbsp;(Login)</label>
                    <input type="text" class="form-control" name="sistema_cnpj" placeholder="CNPJ" value="<?php echo $sistema->sistema_cnpj; ?>">
                    <?php echo form_error('sistema_cnpj', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
                </div>  
 
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
