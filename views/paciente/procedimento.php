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
                <h3 class="card-title ">SEUS PROCEDIMENTOS MÉDICOS</h3>
            </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?> 
                
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div> <!-- fim da tabela -->   
    </div> 
</div>