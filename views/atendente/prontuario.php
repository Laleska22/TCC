<?php

//use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content">
        <div class="container-fluid">
          <!-- your content here -->
           <div class="row">
      
          </div>
         <!-- Inicio da tabela-->
         <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">PRONTUÁRIO ELETRÔNICO</h4>
                </div>
                <div class="card-body">
                  <h3>Dados Pessoais</h3>
                  <?php $form = ActiveForm::begin(); ?> 
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome completo</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                  </div>
                  
                  <div class="row">    
                  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Data nascimento</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">RG</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                   
                    
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cidade</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Idade</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                              <label for="exampleFormControlSelect1">Sexo</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Feminino</option>
                                <option>Masculino</option>
                               
                              </select>
                            </div>
                     </div>   
                     
                        <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">CPF</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                  </div>
                      
                  <div class="form-group">
                          <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-primary pull-right']) ?>
                      </div>   
                    <?php ActiveForm::end(); ?>
                </div>
              </div>
            </div> <!-- fim da tabela -->        
        </div>
      </div>