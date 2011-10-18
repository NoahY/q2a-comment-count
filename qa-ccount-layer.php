<?php

	class qa_html_theme_layer extends qa_html_theme_base {
		
		function head_custom() {
			
			qa_html_theme_base::head_custom();
			if(qa_opt('ccount')) {
				$this->output(qa_opt('ccount_css'));
			}
		}
				
		function a_count($post)
		{
			if(qa_opt('ccount') && isset($post['answers'])) {
				$this->output('<div class="qa-ac-count">');
				
				qa_html_theme_base::a_count($post);

				$comments = qa_db_read_one_value(
					qa_db_query_sub(
						"SELECT COUNT(postid) FROM ^posts WHERE (parentid=# OR parentid IN (SELECT postid FROM ^posts WHERE parentid=#)) AND type='C'",
						$post['raw']['postid'],$post['raw']['postid']
					)
				);
				error_log($comments);
				$this->output_split(array('prefix'=>'','data'=>$comments,'suffix'=>' comments'), 'qa-c-count', 'SPAN', 'SPAN');
				
				$this->output('</div>');
			}
			else 
				qa_html_theme_base::a_count($post);
		}
			
				
	}

