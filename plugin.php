<?php
return array(
    'id'          => 'discord',                  		   // Must match folder suffix
    'version'     => '1.0.0',
    'name'        => 'OsTicketDiscord',
    'author'      => 'Plunder283',
    'description' => 'Notify Discord on new tickets, replies, status changes, and closures.',
    'url'         => 'https://github.com/Plunder283',
    'plugin'      => 'discord.php:DiscordPlugin',     	   // <file>:<ClassName>
    'config'      => 'config.php:DiscordConfig',           // <file>:<ConfigClassName>
    'instance'    => true                                  // Enables per-instance settings
);
?>
