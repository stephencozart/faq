<h3><?php echo lang('faq_edit_title'); ?></h3>
<?php echo form_open('admin/faq/edit/'.$faq->id, 'id="faq" class="crud"'); ?>
<ol>
    <li>
        <label for="question"><?php echo lang('faq_question_label'); ?></label>
        <input name="question" type="text" value="<?php echo $faq->question; ?>" />
        <span class="required-icon tooltip">*</span>
    </li>
        <li class="even">
        <label for="published"><?php echo lang('faq_published_label'); ?></label>
        <?php echo form_dropdown('published', $publish_options, $faq->published); ?>
    </li>
    <li>
        <label for="category"><?php echo lang('faq_category_label'); ?></label>
        <?php echo form_dropdown('category', $category_options, $faq->category_id); ?>
    </li>
    <li>
        <textarea class="wysiwyg-simple" name="answer" rows="10" cols="40"><?php echo $faq->answer; ?></textarea>
    </li>
</ol>
<input type="hidden" name="faq_id" value="<?php echo $faq->id; ?>" />
<div class="buttons">
<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
</div>
<?php echo form_close(); ?>