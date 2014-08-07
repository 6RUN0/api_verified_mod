<table class="kb-table kb-box"><tbody>
  <tr><td class="kb-table-header">API Verification</td></tr>
  <tr class="kb-table-row-even"><td>
    {if $api_verified_status}
      <img src="{$kb_host}/mods/api_verified_mod/img/yes.png" title="Kill verified, ID: {$api_verified_id}" alt="Kill verified" />
    {else}
      <img src="{$kb_host}/mods/api_verified_mod/img/no.png" title="Kill not verified!" alt="Kill not verified" />
    {/if}
  </td></tr>
</tbody></table>
<table class="kb-table kb-box"><tbody>
  <tr><td class="kb-table-header">Source</td></tr>
  <tr class="kb-table-row-even"><td>
    {if $type == "API"}
      <img src="{$kb_host}/mods/api_verified_mod/img/api.png" title="Kill verified, ID: {$source}, Date: {$postedDate}" alt="Sourced from API" />
    {else if $type == "IP"}
      <img src="{$kb_host}/mods/api_verified_mod/img/ip.png" title="Manually posted on {$postedDate}{if $source} from {$source}{/if}" alt="Manually posted" />
    {else if $type == "URL"}
      <a href="{$source}"><img src="{$kb_host}/mods/api_verified_mod/img/url.png" title="Fetched on {$postedDate}" alt="Fetched" /></a>
    {/if}
  </td></tr>
</tbody></table>
