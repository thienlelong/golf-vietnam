<?php 
if( get_post_meta(get_the_ID(), 'page_sidebar', true) ){
	dynamic_sidebar( get_post_meta(get_the_ID(), 'page_sidebar', true) );
}else{
	dynamic_sidebar('Main Sidebar');
}