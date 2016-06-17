<?php

namespace sintret\chat\models;

use Yii;
use app\models\User;
/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property string $message
 * @property integer $userId
 * @property string $updateDate
 */
class Chat extends \yii\db\ActiveRecord {

    public $userModel;
    public $userField;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['message'], 'required'],
            [['userId'], 'integer'],
            [['updateDate', 'message'], 'safe']
        ];
    }

    public function getUser() {
        if (isset($this->userModel))
            return $this->hasOne($this->userModel, ['id' => 'userId']);
        else
            return $this->hasOne(Yii::$app->getUser()->identityClass, ['id' => 'userId']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'userId' => 'User',
            'updateDate' => 'Update Date',
        ];
    }

    public function beforeSave($insert) {
        $this->userId = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }

    public static function records() {
        return static::find()->orderBy('id desc')->limit(20)->all();
    }

  public function data() {
        $userField = $this->userField;
        $output = '';
        $models = Chat::records();
        if ($models)
            foreach ($models as $model ) {
                if (isset($model->user->$userField )) {
                    $avatar = $model->user->$userField;
                } else{
                    $avatar = Yii::$app->assetManager->getPublishedUrl("@vendor/sintret/yii2-chat-adminlte/assets/img/avatar.png");
                }
                    
                if ($model->userId == Yii::$app->user->id){
                  $output .= '<div class="item">
                            <div class="col-md-12">
                <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left"> 
                                <a class="name" href="#">
                                             ' . $model->user->username . '
                                </a>
                            </span>

                            <span class="direct-chat-timestamp pull-right">  <small class="text-muted pull-right" style="color:green">
                                            <i class="fa fa-clock-o"></i> ' . \kartik\helpers\Enum::timeElapsed($model->updateDate) . '</small>
                            </span>
                </div><!-- /.direct-chat-info -->

                <img  class="direct-chat-img" alt="user image" src="' . $avatar . '">
               
                <div class="direct-chat-text">
                <p class="message">
                           ' . $model->message . '
                </p>
                 </div>
                 </div>
           
            </div>';}
            if ($model->userId !== Yii::$app->user->id){
                  $output .= '<div class="col-md-12">
                          <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right"> 
                            <a class="name" href="#">
                                             ' . $model->user->username . '
                                </a>
                                </span>

                            <span class="direct-chat-timestamp pull-left"><small class="text-muted pull-right" style="color:green">
                                            <i class="fa fa-clock-o"></i> ' . \kartik\helpers\Enum::timeElapsed($model->updateDate) . '</small>
                            </span>
                          </div><!-- /.direct-chat-info -->

                          <img  class="direct-chat-img" alt="user image" src="' . $avatar . '">

                          <div class="direct-chat-text">
                            <p class="message">
                           ' . $model->message . '
                </p>
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                         </div>';}
            }

        return $output;
    }

}


/*
echo "<pre>";
            var_dump($this->userId);
            echo "</pre>";
            exit;*/
