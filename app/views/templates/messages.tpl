
{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg 
                    {if $msg->isError()}Errors occured:{/if} 
                    {if $msg->isWarning()}warning{/if} 
                    {if $msg->isInfo()}Infos:{/if}">
                    <p class="coms">
                        {$msg->text}
                    </p>
                </li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}
