<?php
/* Smarty version 3.1.30, created on 2020-05-18 20:01:59
  from "D:\Xampp\htdocs\php_07_routing\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ec2cd976f5848_96097633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '541a6e261ae58647abdd4f501d773d95e779a4d8' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\php_07_routing\\app\\views\\CalcView.tpl',
      1 => 1589824753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_5ec2cd976f5848_96097633 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1842738095ec2cd976e7054_01315811', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12583668965ec2cd976f5124_47408713', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_1842738095ec2cd976e7054_01315811 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Thank You for using my (unfortunately outdated) cellar calculator! Work on improvement is ongoing.<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_12583668965ec2cd976f5124_47408713 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">Log out</a>
</div>

<h2 class="content-head is-center">Cellar calculator</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
		<fieldset>
			<label for="x">Entered amount</label>
			<input id="x" type="text" placeholder="enter Your amount here" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
">
			<label for="op">Please choose Your cellar</label>
					<select id="op" name="op">

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->op_name)) {?>
<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">Again: <?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
<option value="" disabled="true">---</option>
<?php }?>
						<option value="CHF">CHF</option>
                                                <option value="Euro">Euro</option>
                                                <option value="Pound">GBP</option>
                                                <option value="Dollar">USD</option>
					</select>
					
			<button type="submit" class="pure-button">Exchange</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
    
<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4>Amount in PLN:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
