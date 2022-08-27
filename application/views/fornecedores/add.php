<?php $this->load->view('layout/sidebar'); ?>

      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores'); ?>">Fornecedores</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
          </ol>
        </nav>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <form class="user" method="POST" name="form_edit">
                <p><strong><i class="fas fa-clock"></i>&nbsp;Última Alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao); ?></p>
                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-user-tag"></i>&nbsp;Dados Principais</legend>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Razão Social</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_razao" placeholder="Razão Social" value="<?php echo set_value('fornecedor_razao'); ?>">
                      <?php echo form_error('fornecedor_razao', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-6">
                      <label>Nome Fantasia</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_nome_fantasia" placeholder="Nome fantasia" value="<?php echo set_value('fornecedor_nome_fantasia'); ?>">
                      <?php echo form_error('fornecedor_nome_fantasia', '<small class="form-text text-danger">','</small>'); ?>
                    </div>                   
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label>CNPJ</label>
                      <input type="text" class="form-control form-control-user cnpj" name="fornecedor_cnpj" placeholder="Nome fantasia" value="<?php echo set_value('fornecedor_cnpj'); ?>">
                      <?php echo form_error('fornecedor_cnpj', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-4">
                      <label>Inscrição Estadual</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_ie" placeholder="Inscrição estadual" value="<?php echo set_value('fornecedor_ie'); ?>">
                      <?php echo form_error('fornecedor_ie', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-4">
                      <label>Telefone Fixo</label>
                      <input type="text" class="form-control form-control-user sp_celphones" name="fornecedor_telefone" placeholder="Telefone fixo" value="<?php set_value('fornecedor_telefone'); ?>">
                      <?php echo form_error('fornecedor_telefone', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label>Celular</label>
                      <input type="text" class="form-control form-control-user sp_celphones" name="fornecedor_celular" placeholder="Telefone móvel" value="<?php echo set_value('fornecedor_celular'); ?>">
                      <?php echo form_error('fornecedor_celular', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-4">
                      <label>E-mail</label>
                      <input type="email" class="form-control form-control-user" name="fornecedor_email" placeholder="E-mail" value="<?php echo set_value('fornecedor_email'); ?>">
                      <?php echo form_error('fornecedor_email', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-4">
                      <label>Nome do Contato</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_contato" placeholder="Nome do Fornecedor" value="<?php echo set_value('fornecedor_contato'); ?>">
                      <?php echo form_error('fornecedor_contato', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                  </div>  
                </fieldset>  
                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados de Endereço</legend>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label>Endereço</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_endereco" placeholder="Endereço" value="<?php echo set_value('fornecedor_endereco'); ?>">
                      <?php echo form_error('fornecedor_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-3">
                      <label>Número</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_numero_endereco" placeholder="Número do Fornecedor" value="<?php echo set_value('fornecedor_numero_endereco'); ?>">
                      <?php echo form_error('fornecedor_numero_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-5">
                      <label>Complemento</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_complemento" placeholder="Complemento" value="<?php echo set_value('fornecedor_complemento'); ?>">
                      <?php echo form_error('fornecedor_complemento', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                  </div>  
                  <div class="form-group row">
                  <div class="col-md-4">
                      <label>Bairro</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_bairro" placeholder="Bairro" value="<?php echo set_value('fornecedor_bairro'); ?>">
                      <?php echo form_error('fornecedor_bairro', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-3">
                      <label>CEP</label>
                      <input type="text" class="form-control form-control-user cep" name="fornecedor_cep" placeholder="CEP" value="<?php echo set_value('fornecedor_cep'); ?>">
                      <?php echo form_error('fornecedor_cep', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-3">
                      <label>Cidade</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_cidade" placeholder="Cidade" value="<?php echo set_value('fornecedor_cidade'); ?>">
                      <?php echo form_error('fornecedor_cidade', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                    <div class="col-md-2">
                      <label>UF</label>
                      <input type="text" class="form-control form-control-user uf" name="fornecedor_estado" placeholder="Estado" value="<?php echo set_value('fornecedor_estado'); ?>">
                      <?php echo form_error('fornecedor_estado', '<small class="form-text text-danger">','</small>'); ?>
                    </div> 
                  </div>
                </fieldset>
                <fieldset class="mt-4 border p-2 mb-3">
                <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                  <div class="form-group row">
                    <div class="col-md-8">
                      <label>Observações</label>
                      <textarea class="form-control form-control-user" name="fornecedor_obs" placeholder="Observações"><?php echo $fornecedor->fornecedor_obs; ?></textarea>
                      <?php echo form_error('fornecedor_obs', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                      <label>Fornecedor Ativo</label>
                      <select class="custom-select" name="cliente_ativo" placeholder=""><?php echo $fornecedor->fornecedor_ativo; ?>
                        <option value="0" <?php echo ($fornecedor->fornecedor_ativo == 0 ? 'selected' : ''); ?> >Não</option>
                        <option value="1" <?php echo ($fornecedor->fornecedor_ativo == 1 ? 'selected' : ''); ?> >Sim</option>
                      </select>
                      <?php echo form_error('cliente_ativo', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>  
                </fieldset>

                <input type="hidden" name="fornecedor_id" value="<?php echo $fornecedor->fornecedor_id; ?>"/>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Salvar</button>
                <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm ml-2 mt-3">Voltar</a>
              
              </form>
            </div>
          </div>
        </div>
      </div>


    
