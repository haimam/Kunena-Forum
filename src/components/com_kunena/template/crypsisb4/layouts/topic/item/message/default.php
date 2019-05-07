<?php
/**
 * Kunena Component
 * @package         Kunena.Template.Crypsis
 * @subpackage      Layout.Topic
 *
 * @copyright       Copyright (C) 2008 - 2019 Kunena Team. All rights reserved.
 * @license         https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link            https://www.kunena.org
 **/
defined('_JEXEC') or die;

$topicStarter = $this->topic->first_post_userid == $this->message->userid;
$template     = KunenaTemplate::getInstance();
$direction    = $template->params->get('avatarPosition');
$sideProfile  = $this->profile->getSideProfile($this);
$quick        = $template->params->get('quick');

if ($direction === "left")
	:
	?>
	<div class="row message">
		<div class="col-lg-2 shadow rounded hidden-xs-down">
			<?php echo $sideProfile ? $sideProfile : $this->subLayout('User/Profile')->set('user', $this->profile)->setLayout('default')->set('topic_starter', $topicStarter)->set('category_id', $this->category->id); ?>
		</div>
		<div class="col-lg-10 shadow-lg rounded message-<?php echo $this->message->getState(); ?>">
			<?php echo $this->subLayout('Message/Item')->setProperties($this->getProperties()); ?>
			<?php echo $this->subRequest('Message/Item/Actions')->set('mesid', $this->message->id); ?>
			<?php
			if ($quick != 2)
				:
				?>
				<?php echo $this->subLayout('Message/Edit')->set('message', $this->message)->set('captchaEnabled', $this->captchaEnabled)->setLayout('quickreply'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php elseif ($direction === "right")
	:
	?>
	<div class="row message">
		<div class="col-lg-10 shadow-lg rounded message-<?php echo $this->message->getState(); ?>">
			<?php echo $this->subLayout('Message/Item')->setProperties($this->getProperties()); ?>
			<?php echo $this->subRequest('Message/Item/Actions')->set('mesid', $this->message->id); ?>
			<?php
			if ($quick != 2)
				:
				?>
				<?php echo $this->subLayout('Message/Edit')->set('message', $this->message)->set('captchaEnabled', $this->captchaEnabled)->setLayout('quickreply'); ?>
			<?php endif; ?>
		</div>
		<div class="col-lg-2 shadow rounded hidden-xs-down">
			<?php echo $sideProfile ? $sideProfile : $this->subLayout('User/Profile')->set('user', $this->profile)->setLayout('default')->set('topic_starter', $topicStarter)->set('category_id', $this->category->id); ?>
		</div>
	</div>
<?php elseif ($direction === "top")
	:
	?>
	<div class="row message message-<?php echo $this->message->getState(); ?>">
		<div class="col-lg-12 shadow-lg rounded" style="margin-left: 0;">
			<?php echo $this->subLayout('Message/Item/Top')->setProperties($this->getProperties()); ?>
			<?php echo $this->subRequest('Message/Item/Actions')->set('mesid', $this->message->id); ?>
			<?php
			if ($quick != 2)
				:
				?>
				<?php echo $this->subLayout('Message/Edit')->set('message', $this->message)->set('captchaEnabled', $this->captchaEnabled)->setLayout('quickreply'); ?>
			<?php endif; ?>
		</div>
	</div>
<?php elseif ($direction === "bottom")
	:
	?>
	<div class="row message message-<?php echo $this->message->getState(); ?>">
		<div class="col-lg-12 shadow-lg rounded" style="margin-left: 0;">
			<?php echo $this->subLayout('Message/Item/Bottom')->setProperties($this->getProperties()); ?>
			<?php echo $this->subRequest('Message/Item/Actions')->set('mesid', $this->message->id); ?>
			<?php
			if ($quick != 2)
				:
				?>
				<?php echo $this->subLayout('Message/Edit')->set('message', $this->message)->set('captchaEnabled', $this->captchaEnabled)->setLayout('quickreply'); ?>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>

<?php echo $this->subLayout('Widget/Module')->set('position', 'kunena_msg_' . $this->message->replynum);