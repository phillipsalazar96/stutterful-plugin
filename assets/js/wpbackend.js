// main panel
/*
jQuery(document).on('change','#sets',function(){
    console.log('whelp!');
    jQuery('#sets_form').submit();
 });
*/
 console.log('Whelp');

 jQuery(document).on('click','.tabs',function(){
    let id = jQuery(this).data('id');
 
    jQuery('.content').removeClass('active');
    jQuery('.tabs').removeClass('tab-active');
    jQuery(this).addClass('tab-active');
    jQuery('#' + id).addClass('active');
    console.log(id);
  });