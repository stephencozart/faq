<h3><?php echo lang('faq_category_create_title'); ?></h3>
<?php echo form_open('admin/faq/categories/create', 'id="categories" class="crud"'); ?>
<ol>
    <li>
        <label for="title"><?php echo lang('faq_category_label'); ?></label>
        <input name="title" type="text" value="<?php echo set_value('title'); ?>" />
        <span class="required-icon tooltip">*</span>
    </li>
    <li class="even">
        <label for="published"><?php echo lang('faq_published_label'); ?></label>
        <?php echo form_dropdown('published', $publish_options, set_value('published')); ?>
    </li>
    <li>
        <label for="description"><?php echo lang('faq_category_description_label'); ?></label>
        <textarea name="description" rows="5" cols="80"><?php echo set_value('description'); ?></textarea>
    </li>
</ol>
<div class="buttons">
<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
</div>
<?php echo form_close(); ?>