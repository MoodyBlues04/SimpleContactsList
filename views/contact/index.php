<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Contact;
use yii\widgets\MaskedInput;

/**
 * @var Contact $contactForm
 * @var Contact[] $contacts
 */
?>

<div class="row align-items-center">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Добавить контакт</h5>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin([
                    'action' => ['contact/store'],
                    'options' => ['method' => 'post']
                ]); ?>

                <?= $form->field($contactForm, 'name')->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Имя'
                ])->label(false) ?>

                <?= $form->field($contactForm, 'phone')->textInput([
                    'class' => 'form-control transparent',
                    'placeholder' => 'Телефон'
                ])->widget(MaskedInput::class, [
                    'mask' => '+9 (999) 999-99-99',
                    'clientOptions' => [
                        'clearIncomplete' => true
                    ]
                ])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <div class="card" style="margin-top: 20px;">
            <div class="card-header">
                Список контактов
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($contacts as $contact) : ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <?= $contact->name ?>
                            <br>
                            <?= $contact->phone ?>
                        </div>
                        <button class="btn" onclick="deleteContact(<?= $contact->id ?>)">X</button>
                        <form action="/contact/delete" method="POST" style="display: none" id="<?= $contact->id ?>">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                            <input type="number" name="id" value="<?= $contact->id ?>">
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<script>
    function deleteContact(contactId) {
        event.preventDefault();
        document.getElementById(contactId).submit();
    }
</script>