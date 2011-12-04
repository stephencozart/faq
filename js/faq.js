(function($) {
    $(function() {
        do_sortable();
        /**
         * Shortcut click event
         */
        $('#shortcuts ul li a, a[rel=ajax], a.button').live('click', function(e) {
            e.preventDefault();
            var load_url = $(this).attr('href');
            remove_notification();
            load_content(load_url);
        });
        /**
         * Form submit events
         */
        $('form#faq, form#categories').live('submit', function(e) {
            e.preventDefault();
           var post_url = $(this).attr('action');
           var form_data = $(this).serialize();
           var form_id = $(this).attr('id');
           
           do_submit(post_url, form_data, form_id);
        });
        
        /**
         * Sortable
         */
        function do_sortable()
        {
            $('.faq-list tbody').sortable({
                start: function(event, ui) {
                    $('tr').removeClass('alt');
                },
                stop: function(event, ui) {
                    order = new Array();
                    $('td.action-to input').each(function(index) {
                        var faq_id = $(this).val();
			alert(faq_id);
                        order[index] = faq_id;
                    });
                    $.post(SITE_URL + 'admin/faq/update_order', { order : order }, function(data, response, xhr) {
                    
                    });
                }
            });
        }
        
        /**
         * Form submit handler
         */
        function do_submit(post_url, form_data, form_id)
        {
            var url = SITE_URL + 'admin/faq';
            if(form_id == 'categories')
            {
                url = SITE_URL + 'admin/faq/categories';
            }
            $.post(post_url, form_data, function(data, response, xhr) {
                 var obj = $.parseJSON(data);
                 create_notification(obj.status, obj.message);
                 if(obj.status == 'success')
                 {
                    load_content(url);
                 }
            });
        }
        
        /**
         * add notification
         */
        function create_notification(type, message)
        {
            var notice = '<div class="closable notification '+ type +'">'+message+'<a class="close" href="#">close</a></div>';
            remove_notification();
            $('#shortcuts').after(notice);
            $('.notification').slideDown('normal');
        }
        
        /**
         * Remove notifications
         */
        function remove_notification()
        {
            $('.notification').slideUp('normal', function() {
               $(this).remove(); 
            });
        }
        
        /**
         * Content switcher
         */
        function load_content(load_url)
        {
            $('#content').slideUp('normal', function() {
               $(this).load(load_url, function(data, response, xhr) {
                    
					//handle answer ckeditor
					if(typeof CKEDITOR != 'undefined')
					{
						var editor = CKEDITOR.instances['answer'];
						if (editor)
						{
							editor.destroy(true);
						}
					}
					init_ckeditor();
                    do_sortable();
                    $(this).slideDown('normal');
               });
            });
        }
        
        function init_ckeditor()
        {
            $('textarea.wysiwyg-simple').ckeditor({
				toolbar: [
					 ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink']
				  ],
				width: '99%',
				height: 100,
				dialog_backgroundCoverColor: '#000',
				contextmenu: { options: 'Context Menu Options' }
			});
        }
    });
})(jQuery);