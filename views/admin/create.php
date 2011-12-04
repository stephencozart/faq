<h3><?php echo lang('faq_create_title'); ?></h3>
<?php echo form_open('admin/faq/create', 'id="faq" class="crud"'); ?>
<ol>
    <li>
        <label for="question"><?php echo lang('faq_question_label'); ?></label>
        <input name="question" type="text" value="<?php echo set_value('question'); ?>" />
        <span class="required-icon tooltip">*</span>
    </li>
    <li class="even">
        <label for="published"><?php echo lang('faq_published_label'); ?></label>
        <?php echo form_dropdown('published', $publish_options, set_value('published')); ?>
    </li>
    <li>
        <label for="category"><?php echo lang('faq_category_label'); ?></label>
        <?php echo form_dropdown('category', $category_options, set_value('category')); ?>
    </li>
    <li>
        
        <textarea name="answer" rows="5" cols="80" class="wysiwyg-simple"><?php echo set_value('answer'); ?></textarea>
    </li>
</ol>
<div class="buttons">
<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
</div>
<?php echo form_close(); ?>