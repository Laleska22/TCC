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
                <h3 class="card-title ">PROCEDIMENTO MÉDICO</h3>
            </div>
          <div class="card-body">
                <h3>ESCOLHA O TIPO DE PROCEDIMENTO MÉDICO E ENCAMINHE PARA O PACIENTE</h3>
          <?php $form = ActiveForm::begin(); ?> 
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
                      <label for="inputEmail4">Nome do Procedimento:</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group"> 
                      <?=$form->field($consulta, 'procedimentos')->widget(Select2::classname(), [
                        'data' => $procedimento,
                        'options' => ['placeholder' => 'Selecione um procedimento ...','multiple' => true],
                        'pluginOptions' => [
                        'allowClear' => true,
                        ],
                      ]);?> 
                    </div>
                            </div>   
                  </div>
                  <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                        <h3><label for="exampleFormControlTextarea1">Descrição</label></h3>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    </div>
              </div>
                  <div class="form-group">
                      <!--Quando o botao estiver funcionando é para enviar o procedimento para o paciente selecionado --->
                          <?= Html::submitButton(Yii::t('app', 'Enviar'), ['class' => 'btn btn-primary pull-right']) ?>
                      </div> 
                 
                    <?php ActiveForm::end(); ?>
                </div>
              </div>
            </div> <!-- fim da tabela -->   
        </div> 
      </div>