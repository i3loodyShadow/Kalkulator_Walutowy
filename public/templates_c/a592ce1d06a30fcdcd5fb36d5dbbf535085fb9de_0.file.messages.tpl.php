<?php
/* Smarty version 3.1.30, created on 2020-08-19 19:18:46
  from "D:\Xampp\htdocs\amelia_test\app\views\templates\messages.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3d5ef6e796a3_38731720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a592ce1d06a30fcdcd5fb36d5dbbf535085fb9de' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\amelia_test\\app\\views\\templates\\messages.tpl',
      1 => 1597857524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3d5ef6e796a3_38731720 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
	<li class="msg<?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>Errors occured:<?php }
if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }
if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>Infos:<?php }?>"><p class="coms"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</p></li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ul>
</div>
<?php }
}
}
