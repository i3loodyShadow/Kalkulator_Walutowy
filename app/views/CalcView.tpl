{extends file="main.tpl"}

{block name=footer}Thank You for using my (unfortunately outdated) cellar calculator! Work on improvement is ongoing.{/block}

{block name=content}
    
<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">Log out</a>
</div>

<h2 class="content-head is-center">Cellar calculator</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
		<fieldset>
			<label for="x">Entered amount</label>
			<input id="x" type="text" placeholder="enter Your amount here" name="x" value="{$form->x}">
			<label for="op">Please choose Your cellar</label>
					<select id="op" name="op">

{if isset($res->op_name)}
<option value="{$form->op}">Again: {$res->op_name}</option>
<option value="" disabled="true">---</option>
{/if}
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
    
{include file='messages.tpl'}

{if isset($res->result)}
	<h4>Amount in PLN:</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>
</div>

{/block}