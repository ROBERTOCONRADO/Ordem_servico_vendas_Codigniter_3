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
                  <legend class="font-small"><i class="fas fa-user-tie"></i>&nbsp;Dados Pessoais</legend>
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label>Nome</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_nome" placeholder="Primeiro nome" value="<?php echo $fornecedor->fornecedor_nome; ?>">
                      <?php echo form_error('fornecedor_nome', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                      <label>Sobrenome</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_sobrenome" placeholder="Segundo nome" value="<?php echo $fornecedor->fornecedor_sobrenome; ?>">
                      <?php echo form_error('fornecedor_sobrenome', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                      <label>Data Nascimento</label>
                      <input type="date" class="form-control form-control-user-date" name="fornecedor_data_nascimento" value="<?php echo $fornecedor->fornecedor_obs; ?>">
                      <?php echo form_error('fornecedor_data_nascimento', '<small class="form-text text-danger">','</small>'); ?>
                    </div>                    
                  </div>

                  <div class="form-group row">                 
                  <div class="col-md-2">
                      <?php if($fornecedor->fornecedor_tipo == 1): ?>
                      <label>CPF</label>
                      <input type="text" class="form-control form-control-user cpf" name="fornecedor_cpf" placeholder="<?php echo ($fornecedor->fornecedor_tipo == 1 ? 'CPF do fornecedor' : 'CNPJ do fornecedor') ?>" value="<?php echo $fornecedor->fornecedor_cpf_cnpj; ?>">
                      <?php echo form_error('fornecedor_cpf', '<small class="form-text text-danger">','</small>'); ?>
                      <?php else: ?>
                        <label>CNPJ</label>
                        <input type="text" class="form-control form-control-user cnpj" name="fornecedor_cnpj" placeholder="<?php echo ($fornecedor->fornecedor_tipo == 1 ? 'CPF do fornecedor' : 'CNPJ do fornecedor') ?>" value="<?php echo $fornecedor->fornecedor_cpf_cnpj; ?>">
                      <?php echo form_error('fornecedor_cnpj', '<small class="form-text text-danger">','</small>'); ?>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                    <?php if($fornecedor->fornecedor_tipo == 1): ?>
                      <label>RG</label>
                      <?php else: ?>
                        <label>I.E</label>
                      <?php endif; ?>
                      <input type="text" class="form-control form-control-user" name="fornecedor_rg_ie" placeholder="<?php echo ($fornecedor->fornecedor_tipo == 1 ? 'RG do fornecedor' : 'Inscrição estadual') ?>" value="<?php echo $fornecedor->fornecedor_rg_ie; ?>">
                      <?php echo form_error('fornecedor_rg_ie', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                      <label>E-mail</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_email" placeholder="E-mail" value="<?php echo $fornecedor->fornecedor_email; ?>">
                      <?php echo form_error('fornecedor_email', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-2">
                      <label>Telefone Fixo</label>
                      <input type="text" class="form-control form-control-user sp_celphones" name="fornecedor_telefone" placeholder="Telefone fixo" value="<?php echo $fornecedor->fornecedor_telefone; ?>">
                      <?php echo form_error('fornecedor_telefone', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-2">
                      <label>Telefone Celular</label>
                      <input type="text" class="form-control form-control-user sp_celphones" name="fornecedor_celular" placeholder="Telefone Celular" value="<?php echo $fornecedor->fornecedor_celular; ?>">
                      <?php echo form_error('fornecedor_celular', '<small class="form-text text-danger">','</small>'); ?>
                    </div>                   
                  </div>
                </fieldset>  

                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados de Endereço</legend>
                  <div class="form-group row">
                  <div class="col-md-4">
                      <label>Cidade</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_cidade" placeholder="Cidade" value="<?php echo $fornecedor->fornecedor_cidade; ?>">
                      <?php echo form_error('fornecedor_cidade', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-2">
                      <label>UF</label>
                      <input type="text" class="form-control form-control-user uf" name="fornecedor_estado" placeholder="Estado" value="<?php echo $fornecedor->fornecedor_estado; ?>">
                      <?php echo form_error('fornecedor_estado', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-2">
                      <label>CEP</label>
                      <input type="text" class="form-control form-control-user cep" name="fornecedor_cep" placeholder="CEP" value="<?php echo $fornecedor->fornecedor_cep; ?>">
                      <?php echo form_error('fornecedor_cep', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                      <label>Bairro</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_bairro" placeholder="Bairro" value="<?php echo $fornecedor->fornecedor_bairro; ?>">
                      <?php echo form_error('fornecedor_bairro', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>  

                  <div class="form-group row">  
                    <div class="col-md-4">
                      <label>Endereço</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_endereco" placeholder="Endereco" value="<?php echo $fornecedor->fornecedor_endereco; ?>">
                      <?php echo form_error('fornecedor_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div>  
                    <div class="col-md-2">
                      <label>Número</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_numero_endereco" placeholder="Número da residência" value="<?php echo $fornecedor->fornecedor_numero_endereco; ?>">
                      <?php echo form_error('fornecedor_numero_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-6">
                      <label>Complemento</label>
                      <input type="text" class="form-control form-control-user" name="fornecedor_complemento" placeholder="Complemento" value="<?php echo $fornecedor->fornecedor_complemento; ?>">
                      <?php echo form_error('fornecedor_complemento', '<small class="form-text text-danger">','</small>'); ?>
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
                      <label>fornecedor Ativo</label>
                      <select class="custom-select" name="fornecedor_ativo" placeholder=""><?php echo $fornecedor->fornecedor_ativo; ?>
                        <option value="0" <?php echo ($fornecedor->fornecedor_ativo == 0 ? 'selected' : ''); ?> >Não</option>
                        <option value="1" <?php echo ($fornecedor->fornecedor_ativo == 1 ? 'selected' : ''); ?> >Sim</option>
                      </select>
                      <?php echo form_error('fornecedor_ativo', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>  
                </fieldset>  
                
                <input type="hidden" name="fornecedor_tipo" value="<?php echo $fornecedor->fornecedor_tipo; ?>"/>
                <input type="hidden" name="fornecedor_id" value="<?php echo $fornecedor->fornecedor_id; ?>"/>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a title="Voltar" href="<?php echo base_url('fornecedors'); ?>" class="btn btn-success btn-sm ml-2">Voltar</a>
              
              </form>
            </div>
          </div>
        </div>
      </div>


    
