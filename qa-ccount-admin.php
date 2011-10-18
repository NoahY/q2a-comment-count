<?php
    class qa_ccount_admin {
	function option_default($option) {
	    switch($option) {
		case 'ccount_css':
		    return '
<style>
	.qa-ac-count {
		float:left;
	}
	.qa-a-count {
		border-bottom: 1px dashed #D6AE64 !important;
		height: 42px !important;
		padding: 1px 0 !important;
	}
	.qa-a-count-data {
	  font-size: 20px !important;
	}
	.qa-c-count {
		background: none repeat scroll 0 0 #EEE;
		border: 1px solid #D6AE64;
		border-top: none;
		float: left;
		clear:both;
		height: 30px;
		margin-right: 1.5em;
		overflow: hidden;
		padding: 2px 0 0 0;
		text-align: center;
		width: 60px;
	}
	.qa-c-count-data {
	  display: block;
	  font-size: 12px;
	  font-weight: bold;
	}
	.qa-c-count-pad {
	  font-size: 9px;
	}
</style>';
		default:
		    return null;
	    }
	}       
        function allow_template($template)
        {
            return ($template!='admin');
        }       
            
        function admin_form(&$qa_content)
        {                       
                            
        // Process form input
            
            $ok = null;
            
            if (qa_clicked('ccount_save')) {
		qa_opt('ccount',(bool)qa_post_text('ccount'));
		qa_opt('ccount_css',qa_post_text('ccount_css'));
		$ok = qa_lang('admin/options_saved');

            }
            
            $fields[] = array(
		'label' => 'Show comment count',
                'tags' => 'id="ccount" name="ccount"',
                'value' => qa_opt('ccount'),
		'type' => 'checkbox'
            );
	    
            $fields[] = array(
		'label' => 'Comment count css',
                'tags' => 'id="ccount_css" name="ccount_css"',
                'value' => qa_opt('ccount_css'),
		'type' => 'textarea',
		'rows' => 10
            );
            
            return array(           
                'ok' => ($ok && !isset($error)) ? $ok : null,
                    
                'fields' => $fields,
             
                'buttons' => array(
                    array(
                        'label' => qa_lang('admin/save_options_button'),
                        'tags' => 'NAME="ccount_save"',
                    )
                ),
            );
        }
    }

