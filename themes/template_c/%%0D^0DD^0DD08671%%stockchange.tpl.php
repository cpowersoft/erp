<?php /* Smarty version 2.6.14, created on 2015-09-10 15:40:37
         compiled from Inventory/stockchange.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="common/lib/ext-4/ux/RowEditor.js"></script>
<link rel="stylesheet" type="text/css" href="common/lib/ext-4/ux/css/RowEditor.css" />
<script type="text/javascript" src="js/inventory/stockchange.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
    var StockView = Ext.create('Ext.ux.test.inventory.stockchange', {
		autoWidth: true,
		autoHeight: true,
		goodsURL: 'index.php?model=Stockin&action=getgoods',
		saveURL: 'index.php?model=inventory&action=savestockchange',
		renderTo: document.body
	});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>