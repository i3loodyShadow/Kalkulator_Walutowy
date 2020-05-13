{extends file="main.tpl"}

{block name=content}
<form action="{$conf->action_url}login" method="post"  class="pure-form pure-form-aligned center-margin">
	<fieldset>
        <div class="l-box-lrg pure-u-1 pure-u-med-12-24">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="l-box-lrg pure-u-1 pure-u-med-11-24">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
			<input type="submit" value="Log in" class="pure-button"/>
	</fieldset>
</form>	

{include file='messages.tpl'}

{/block}
