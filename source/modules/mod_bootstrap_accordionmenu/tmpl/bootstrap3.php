<?php
/**
 * Joomla! module - Bootstrap Accordion Menu
 *
 * @author    Yireo (info@yireo.com)
 * @copyright Copyright 2015 Yireo.com. All rights reserved
 * @license   GNU Public License
 * @link      http://www.yireo.com
 */

// Deny direct access
defined('_JEXEC') or die;
?>
<?php if ($params->get('load_js', 1) == 1) : ?>
	<script type="text/javascript">
		if (typeof modBootstrapAccordionMenu_hover === "undefined") {
			var modBootstrapAccordionMenu_hover = <?php echo (int)$params->get('js_hover', 0); ?>;
		}
	</script>
<?php endif; ?>
<div class="panel-group" id="<?php echo $tag_id; ?>" role="tablist" aria-multiselectable="true">
	<?php foreach ($parents as $parent) : ?>
		<?php $collapse_status = ($parent->active) ? 'in' : 'out'; ?>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<?php if (!empty($parent->childs)) : ?>
						<?php $classes = array_merge($parent->classes, array()); ?>
						<a class="<?php echo implode(' ', $classes); ?>" data-toggle="collapse"
						   data-target="<?php echo $parent->browserNav; ?>" <?php if ($parent->browserNav == 1) : ?>target="_new"<?php endif; ?>
						   data-parent="#<?php echo $tag_id; ?>" data-href="<?php echo $parent->href; ?>"
						   href="#<?php echo $parent->html_id; ?>"><?php echo $parent->title; ?></a>
					<?php else: ?>
						<?php $classes = $parent->classes; ?>
						<a class="<?php echo implode(' ', $classes); ?>"
						   data-target="<?php echo $parent->browserNav; ?>" <?php if ($parent->browserNav == 1) : ?>target="_new"<?php endif; ?>
						   href="<?php echo $parent->href; ?>"><?php echo $parent->title; ?></a>
					<?php endif; ?>
				</h4>
			</div>
			<?php if (!empty($parent->childs)) : ?>
				<div id="<?php echo $parent->html_id; ?>"
					 class="panel-collapse collapse <?php echo $collapse_status; ?>" role="tabpanel">
					<div class="panel-body">
						<?php $helper->submenu($parent->childs); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
