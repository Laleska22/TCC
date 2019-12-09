<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content">
      <div class="container-fluid">
      <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">BUSCAR PRONTUÁRIOS</h3>
                </div>
                <div class="card-body">
                <?php $form = ActiveForm::begin(); ?> 
                    
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="inputEmail4"><h3>Selecionar paciente</h3></label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group"> 
                        <?=$form->field($consulta, 'Paciente_idPaciente')->widget(Select2::classname(), [
                        'data' => $pacientes,
                        'options' => ['placeholder' => 'Selecione um paciente ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                         
                          </div>
                        </div>            
                    </div>
                      <div class="form-group">
                          <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary pull-right']) ?>
                      </div>
                    <?php ActiveForm::end(); ?>
                </div>
              </div>
            </div> <!-- fim da tabela -->
        <!-- Inicio da tabela-->
        <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">EDITAR PRONTUÁRIO</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        
                      <h3>AQUI É PARA APARECER OS DADOS DO PACIENTE QUE FOI BUSCADO NA BUSCA ACIMA</h3>
                        
                      </thead>
                      <!-- <tbody id="consultas"> -->
                                              
                      <!-- </tbody> -->
                    </table>
                  </div>
                </div>
              </div>
            </div> <!-- fim da tabela -->
      </div>
</div>