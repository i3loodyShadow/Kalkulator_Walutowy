<?php
/* Smarty version 3.1.30, created on 2020-08-08 16:50:37
  from "D:\Xampp\htdocs\php_8_1_bd\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f2ebbbd650b33_88184764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ad6958bd6c5eeafd143747e0af7f10df8a85262' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\php_8_1_bd\\app\\views\\CalcView.tpl',
      1 => 1596898234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_5f2ebbbd650b33_88184764 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19390786155f2ebbbd62fe91_03854539', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14517091395f2ebbbd6505f7_98454305', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_19390786155f2ebbbd62fe91_03854539 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Thank You for using my (unfortunately outdated) cellar calculator! Work on improvement is ongoing.<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_14517091395f2ebbbd6505f7_98454305 extends Smarty_Internal_Block
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

<div class="pure-u-1 pure-u-lg-1-2">
    <table id="tab_history" class="pure-table pure-table-aligned center-margin pure-table-bordered">
        <thead>
            <tr>
		<th>Number of exchange</th>
		<th>Amount</th>
		<th>Cellar</th>
		<th>Amount in PLN</th>
                <th>Date of exchange</th>
	</tr>           
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                <tr><td><?php echo $_smarty_tpl->tpl_vars['d']->value["idresult"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["amount"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["cellar"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["amountPLN"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['d']->value["date"];?>
</td></tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
