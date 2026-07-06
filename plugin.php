<?php
return array(
    'id'          => 'discord',                  		   // Must match folder suffix
    'version'     => '1.0.0',
    'name'        => 'OSTicket2Discord',
    'author'      => 'Ryan Autet',
    'description' => 'Notify Discord on new tickets, replies, status changes, and closures.',
    'url'         => 'https://github.com/fswolf',
    'plugin'      => 'discord.php:DiscordPlugin',     	   // <file>:<ClassName>
    'config'      => 'config.php:DiscordConfig',           // <file>:<ConfigClassName>
    'instance'    => true                                  // Enables per-instance settings
);
?>
