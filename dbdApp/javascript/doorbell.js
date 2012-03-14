//@import jquery-1.6.4.js;
//@import jquery.ext.js;
//@import ui-1.8.13/jquery.ui.core.js;
//@import ui-1.8.13/jquery.ui.widget.js;
//@import ui-1.8.13/jquery.ui.mouse.js;
//@import ui-1.8.13/jquery.ui.position.js;
//@import ui-1.8.13/jquery.ui.datepicker.js;
//@import ui-1.8.13/jquery.ui.dialog.js;
//@import ui-1.8.13/jquery.ui.draggable.js;
//@import ui-1.8.13/jquery.effects.core.js;
//@import ui-1.8.13/jquery.effects.fade.js;

$(function (){
	$('.datepicker').datepicker({
        showAnim: 'fade',
        showOn: 'both',
        buttonImage: '/images/gfx/datepicker.png',
        buttonImageOnly: true,
        changeMonth: true,
        changeYear: true,
        yearRange: '' +
            '' +
            '-1:+100'
	});
});