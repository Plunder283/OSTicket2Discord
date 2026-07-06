<?php
require_once INCLUDE_DIR.'class.plugin.php';

class DiscordConfig extends PluginConfig {

    function getOptions() {
        return [
            'webhook_section' => new SectionBreakField([
                'label' => 'Webhook Settings',
            ]),
            'discord_webhook_url' => new TextboxField([
                'label'         => 'Discord Webhook URL',
                'configuration' => ['size' => 80, 'length' => 200],
                'required'      => true
            ]),
            'discord_username' => new TextboxField([
                'label'         => 'Discord Username',
                'configuration' => ['size' => 40, 'length' => 100],
                'hint'          => 'The name that appears as the webhook sender',
                'required'      => false
            ]),
            'discord_avatar_url' => new TextboxField([
                'label'         => 'Avatar URL',
                'configuration' => ['size' => 80, 'length' => 255],
                'hint'          => 'Full HTTPS URL to the avatar image (128x128 PNG recommended)',
                'required'      => false
            ]),
            'discord_mention' => new TextboxField([
                'label'         => 'Mention',
                'configuration' => ['size' => 40, 'length' => 100],
                'hint'          => 'Optional. e.g. @here, @everyone, or a role mention like <@&123456789012345678>. Leave blank for none. Used on new tickets only unless added manually to another template below via {mention}.',
                'required'      => false
            ]),

            'events_section' => new SectionBreakField([
                'label' => 'Notification Triggers',
                'hint'  => 'Choose which ticket events should post a message to this Discord channel.',
            ]),
            'notify_new_ticket' => new BooleanField([
                'label'   => 'New ticket created',
                'default' => true,
            ]),
            'notify_new_message' => new BooleanField([
                'label'   => 'New message from the requester on an existing ticket',
                'default' => false,
            ]),
            'notify_agent_reply' => new BooleanField([
                'label'   => 'Staff reply posted on a ticket',
                'default' => false,
            ]),
            'notify_status_change' => new BooleanField([
                'label'   => 'Ticket status changed (e.g. reopened, marked overdue-cleared, etc.)',
                'default' => true,
            ]),
            'notify_closed' => new BooleanField([
                'label'   => 'Ticket closed',
                'default' => true,
            ]),

            'templates_section' => new SectionBreakField([
                'label' => 'Message Templates',
                'hint'  => 'Customize the message posted for each event. Available placeholders: '
                         . '{mention} {id} {number} {subject} {name} {email} {department} {priority} '
                         . '{status} {old_status} {agent} {message}',
            ]),
            'tpl_new_ticket' => new TextareaField([
                'label'         => 'New ticket message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "{mention}\n**New Ticket!**\n**Subject:** {subject}\n**From:** {name} ({email})\n**Ticket:** #{number}",
                'required'      => false,
            ]),
            'tpl_new_message' => new TextareaField([
                'label'         => 'New requester message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "**New message on ticket #{number}**\n**Subject:** {subject}\n**From:** {name} ({email})\n**Message:** {message}",
                'required'      => false,
            ]),
            'tpl_agent_reply' => new TextareaField([
                'label'         => 'Staff reply message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "**New reply on ticket #{number}**\n**Subject:** {subject}\n**Agent:** {agent}\n**Message:** {message}",
                'required'      => false,
            ]),
            'tpl_status_change' => new TextareaField([
                'label'         => 'Status change message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "**Ticket #{number} status changed**\n**Subject:** {subject}\n**Status:** {old_status} → {status}",
                'required'      => false,
            ]),
            'tpl_closed' => new TextareaField([
                'label'         => 'Ticket closed message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "**Ticket #{number} closed**\n**Subject:** {subject}\n**Closed by:** {agent}",
                'required'      => false,
            ]),
        ];
    }
}
?>
