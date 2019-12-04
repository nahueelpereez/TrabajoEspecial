{foreach from=$usuarios  item=p}
<li href="">{$p->email} </li> <a  href="AsignarAdmin/{$p->id_usuario}"> hacer admin</a>

{/foreach}
