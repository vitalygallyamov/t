<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Добро пожаловать на конференцию «<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>»

<?php echo (isset($this->_rootref['WELCOME_MSG'])) ? $this->_rootref['WELCOME_MSG'] : ''; ?>


Пожалуйста, сохраните это сообщение. Параметры вашей учётной записи таковы:

----------------------------
Имя пользователя: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>

----------------------------

Ваш пароль надёжно сохранён в нашей базе данных и не может быть извлечён из неё. Если вы всё же забудете свой пароль, то вы сможете восстановить его, используя для этого адрес электронной почты, связанный с вашей учётной записью.

Щёлкните по ссылке ниже для активации учётной записи:

<?php echo (isset($this->_rootref['U_ACTIVATE'])) ? $this->_rootref['U_ACTIVATE'] : ''; ?>



Благодарим за регистрацию!

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>