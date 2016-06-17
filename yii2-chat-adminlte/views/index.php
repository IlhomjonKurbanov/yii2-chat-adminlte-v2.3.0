
<div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Direct Chat</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                  </div>
    </div>
     <div class="box-body">
                      <!-- Conversations are loaded here -->
                     
                        <!-- Message. Default to the left -->
                           <div class="slimScrollDiv" style="position: relative; overflow: scroll; width: auto; height: 350px;">
                                <div id="chat-box" class="box-body chat">
                                    <?=$data?>
                                </div>
                                <div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 187.126px;"></div>
                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                    
                            </div><!-- /.chat -->                

                     

                      <!-- Contacts are loaded here -->
                      <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                          <li>
                            <a href="#">
                               <?php echo app\models\User::find()->all(),'id','userId'; ?>
                               <?php echo Yii::$app->user->identity->username; ?>
                               <?=$user?>
                            </a>
                          </li><!-- End Contact Item -->
                         
                         
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                                <span class="contacts-list-msg">Never mind I found...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                        </ul><!-- /.contatcts-list -->
                      </div><!-- /.direct-chat-pane -->
                    </div><!-- /.box-body -->


    <div class="box-footer">
        <div class="input-group">
            <input name="Chat[message]" id="chat_message" placeholder="Type message..." class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-success btn-send-comment" data-url="<?=$url;?>" data-model="<?=$userModel;?>" data-userfield="<?=$userField;?>" data-loading="<?=$loading;?>">Send</button>
            </div>
        </div>
    </div>
</div><!-- /.box (chat box) -->  


