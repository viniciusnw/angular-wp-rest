<?php
class Post_Type_Message {

  /* Mensagem de erro */
  public static function error_message($msg){
    echo '
    <div class="qpdp-msg-box qpdp-msg-box--error bg-danger">
      <p>'.$msg.'</p>
    </div>';
  }

  /* Mensagem de sucesso */
  public static function success_message($msg){
    echo '
    <div class="qpdp-msg-box qpdp-msg-box--success">
      <p>'.$msg.'</p>
    </div>';
  }

  /* Mensagem de alerta */
  public static function alert_message($msg){
    echo '
    <div class="qpdp-msg-box qpdp-msg-box--alert">
      <p>'.$msg.'</p>
    <div>';
  }
} ?>
