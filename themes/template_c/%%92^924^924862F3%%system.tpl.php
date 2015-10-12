<?php /* Smarty version 2.6.14, created on 2015-08-13 15:22:09
         compiled from system/system.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/system/system.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	var info = eval(<?php echo $this->_tpl_vars['info']; ?>
);
	Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';
	var systemForm = new Ext.ux.systemForm({
		border:true,
		region:'center',
		labelAlign: 'right',
        labelWidth: 145,
		info:info,
		saveURL:'index.php?model=system&action=save',
        autoWidth: true,
		autoHeight:true,
		renderTo:'fordiv'
	});
	loadend();
});
</script>
<div id='fordiv'></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>