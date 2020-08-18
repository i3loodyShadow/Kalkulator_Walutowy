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
            {foreach $data as $d}
                {strip}
                    <tr>
                        <td>{$d["idresult"]}</td>
                        <td>{$d["amount"]}</td>
                        <td>{$d["cellar"]}</td>
                        <td>{$d["amountPLN"]}</td>
                        <td>{$d["date"]}</td>
                    </tr>
                {/strip}
            {/foreach}
        </tbody>
    </table>
</div>
</div>

{/block}