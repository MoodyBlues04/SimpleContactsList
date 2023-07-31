<?php

namespace app\controllers;

use app\helpers\FlashHelper;
use app\models\Contact;
use yii\web\Controller;

class ContactController extends Controller
{
    public function actionIndex()
    {
        $contactForm = new Contact();
        $contacts = Contact::find()->all();

        return $this->render('index', compact('contactForm', 'contacts'));
    }

    public function actionStore()
    {
        try {
            $model = new Contact();

            if (!$model->load(\Yii::$app->request->post('Contact'), '') || !$model->validate()) {
                throw new \InvalidArgumentException('Invalid form input');
            }

            if (!$model->save()) {
                throw new \Exception('Contact not saved');
            }

            FlashHelper::setSuccess('Contact saved');
        } catch (\Exception $e) {
            FlashHelper::setError($e->getMessage());
            // TODO logging
        }
        return $this->redirect('/contact/index');
    }

    public function actionDelete()
    {
        try {
            $contactId = \Yii::$app->request->post('id');
            if (!$contactId) {
                throw new \Exception('COntact id cannot be blank');
            }

            Contact::deleteAll(['id' => $contactId]);
            FlashHelper::setSuccess('Contact deleted');
        } catch (\Exception $e) {
            FlashHelper::setError($e->getMessage());
        }
        return $this->redirect('/contact/index');
    }
}
