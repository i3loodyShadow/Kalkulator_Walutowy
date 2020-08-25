{extends file="main.tpl"}

{block name=title}History of exchanges{/block}

{block name=content}
    
<h2 class="content-head is-center">History of cellar exchanges</h2>

<form action="{$conf->action_root}backFromHistory" method="post"  pure-button">
    <input type="submit" value="Click to back to cellar calculator" class="pure-button"/>
</form>

<br>

<div>
<form class="pure-form pure-form-stacked" action="{$conf->action_url}historyView"></form>
</div>

<div class="center-margin">
    <form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','{$conf->action_root}historyPartView','table'); return false;">
	<legend>Type currency below to search</legend>
	<fieldset>
		<input type="text" placeholder="Currency" name="hsf_currency" value="{$currency->currency}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Search</button>
	</fieldset>
    </form>
</form>
</div>	
                
{include file='messages.tpl'}

{/block}

{block name=resultTable}
<div id="table">
            {include file="ResultPartView.tpl"}
</div>
{/block}

{block name=footer}Thank You for using my (unfortunately outdated) cellar calculator! Work on improvement is ongoing.{/block}