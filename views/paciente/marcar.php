<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content">
        <div class="container-fluid">
          
         <!-- Inicio da tabela-->
         <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">MARCAR CONSULTA</h4>
                </div>
                <div class="card-body">
                <?php $form = ActiveForm::begin(); ?> 
                    <div class="row">  
                    <div class="col-md-3">                   
                    <div class="form-group" >
                        <label for="inputEmail4">Nome do médico:</label>
                    </div>
                  </div>
                      <div class="col-md-4">
                        <div class="form-group"> 
                        <?=$form->field($consulta, 'Medico_idMedico')->widget(Select2::classname(), [
                        'data' => $medicos,
                        'options' => ['placeholder' => 'Selecione um médico ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="inputEmail4">Nome do Paciente:</label>
                        </div>
                      </div>
                      <div class="col-md-4">
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
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label">Data da Consulta:</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group"> 
                          <?=$form->field($consulta,'Data_Consulta')->input('date')?>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                        <label for="appt">Hora da Consulta:</label>
                        </div>
                      </div>
                        <div class="col-md-3">
                        <div class="form-group"> 
                          <?=$form->field($consulta,'Hora_Consulta')->input('time')?>
                          </div>
                        </div> 
                        </div>
                      <div class="form-group">
                          <?= Html::submitButton(Yii::t('app', 'Cadastrar'), ['class' => 'btn btn-primary pull-right']) ?>
                      </div>
                    <?php ActiveForm::end(); ?>
                </div>
              </div>
            </div> <!-- fim da tabela -->        
        </div>
      </div>