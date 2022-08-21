<?php $this->load->view('layout/sidebar'); ?>

      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('clientes'); ?>">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
          </ol>
        </nav>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a title="Voltar" href="<?php echo base_url('clientes'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            </div>
            <div class="card-body">
              <form class="user" method="POST" name="form_edit">
                <div class="form-group row">
                  
                  <div class="col-md-4">
                    <label>Nome</label>
                    <input type="text" class="form-control form-control-user" name="cliente_nome" placeholder="Primeiro nome" value="<?php echo $cliente->cliente_nome; ?>">
                    <?php echo form_error('cliente_nome', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control form-control-user" name="cliente_sobrenome" placeholder="Segundo nome" value="<?php echo $cliente->cliente_sobrenome; ?>">
                    <?php echo form_error('cliente_sobrenome', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>CPF ou CNPJ</label>
                    <input type="text" class="form-control form-control-user" name="cliente_cpf_cnpj" placeholder="CPF ou CNPJ" value="<?php echo $cliente->cliente_cpf_cnpj; ?>">
                    <?php echo form_error('cliente_cpf_cnpj', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-2">
                    <label>RG ou I.E</label>
                    <input type="text" class="form-control form-control-user" name="cliente_rg_ie" placeholder="RG ou I.E" value="<?php echo $cliente->cliente_rg_ie; ?>">
                    <?php echo form_error('cliente_rg_ie', '<small class="form-text text-danger">','</small>'); ?>
                  </div>
                </div>  

                <div class="form-group row">
                  
                  <div class="col-md-4">
                    <label>E-mail</label>
                    <input type="text" class="form-control form-control-user" name="cliente_email" placeholder="E-mail" value="<?php echo $cliente->cliente_email; ?>">
                    <?php echo form_error('cliente_email', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>Telefone Fixo</label>
                    <input type="text" class="form-control form-control-user" name="cliente_telefone" placeholder="Telefone fixo" value="<?php echo $cliente->cliente_telefone; ?>">
                    <?php echo form_error('cliente_telefone', '<small class="form-text text-danger">','</small>'); ?>
                  </div>

                  <div class="col-md-4">
                    <label>Telefone Celular</label>
                    <input type="text" class="form-control form-control-user" name="cliente_celular" placeholder="Telefone Celular" value="<?php echo $cliente->cliente_celular; ?>">
                    <?php echo form_error('cliente_celular', '<small class="form-text text-danger">','</small>'); ?>
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

    