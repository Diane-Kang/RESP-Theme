<?php

/**
 * Scriptmodule Block Template.
 * 
 *This Module is basically a clone of the Textbox Module. Just here the CSS Manager can add a JS script
 *before he can put content to an other Textbox
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "textbox", "scriptmodule");
array_unshift($container_classes, "container", "bd-box");

?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">
        <div class="textbox__text-container textbox_vor_code">
            <div class="textbox__text editor-content">
                <?php the_field('text_vor_script'); ?>
            </div>
        </div>

        <!-- Statt the_field('script_feld'); im Template zu verwenden,
        Nutze 'echo get_fiel() um html escaping zu umgehen, siehe https://wpfieldwork.com/diving-into-acfs-latest-security-release/ -->
        <div class="textbox__text-container code">
            <div class="textbox__text">
                <?php echo get_field('script_feld'); ?>
            </div>
        </div>
        <div class="textbox__text-container textbox_nach_code">
            <div class="textbox__text editor-content">
                <?php the_field('text_nach_script'); ?>
            </div>
        </div>
    </div>
</div>