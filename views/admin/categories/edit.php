<h3><?php echo lang('faq_category_edit_title'); ?></h3>
<?php echo form_open('admin/faq/categories/edit/'.$category->id, 'id="categories" class="crud"'); ?>
<ol>
    <li>
        <label for="title"><?php echo lang('faq_category_label'); ?></label>
        <input name="title" type="text" value="<?php echo $category->title; ?>" />
        <span class="required-icon tooltip">*</span>
    </li>
    <li class="even">
        <label for="published"><?php echo lang('faq_published_label'); ?></label>
        <?php echo form_dropdown('published', $publish_options, $category->published); ?>
    </li>
    <li>
        <label for="description"><?php echo lang('faq_category_description_label'); ?></label>
        <textarea name="description" rows="5" cols="80"><?php echo $category->description; ?></textarea>
    </li>
</ol>
<input type="hidden" name="category_id" value="<?php echo $category->id; ?>" />
<div class="buttons">
<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
</div>
<?php echo form_close(); ?>