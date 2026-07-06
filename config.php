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
                'hint'          => 'Optional. e.g. @here, @everyone, or a role mention like <@&123456789012345678>. Leave blank for none. Sent as a ping alongside the embed on new tickets only.',
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
                'hint'  => 'Customize the description text shown inside the Discord embed for each event. '
                         . 'Ticket subject, requester, department, priority, agent, and status are already shown '
                         . 'as embed fields, so you don\'t need to repeat them here. Available placeholders: '
                         . '{id} {number} {subject} {name} {email} {department} {priority} '
                         . '{status} {old_status} {agent} {message}. '
                         . '(The Mention setting above is sent as a separate ping outside the embed, since '
                         . 'Discord does not notify for mentions placed inside an embed.)',
            ]),
            'tpl_new_ticket' => new TextareaField([
                'label'         => 'New ticket message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "",
                'required'      => false,
            ]),
            'tpl_new_message' => new TextareaField([
                'label'         => 'New requester message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "{message}",
                'required'      => false,
            ]),
            'tpl_agent_reply' => new TextareaField([
                'label'         => 'Staff reply message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "{message}",
                'required'      => false,
            ]),
            'tpl_status_change' => new TextareaField([
                'label'         => 'Status change message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "",
                'required'      => false,
            ]),
            'tpl_closed' => new TextareaField([
                'label'         => 'Ticket closed message',
                'configuration' => ['rows' => 4, 'cols' => 80],
                'default'       => "",
                'required'      => false,
            ]),
        ];
    }
}
?>
