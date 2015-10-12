<?php /* Smarty version 2.6.14, created on 2015-09-10 16:42:41
         compiled from Inventory/startcheck.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/inventory/startcheck.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var order_id = <?php echo $this->_tpl_vars['order_id']; ?>
;
	var StartCheckGrid = Ext.create('Ext.ux.test.inventory.startcheck', {
		title: '盘点单列表',
		headers: ['rec_id', '产品编码', '产品名称', 'SKU', '账面库存', '盘点库存', '是否盘点'],
		fields: ['rec_id', 'goods_sn', 'goods_name', 'SKU', 'stock_qty', 'check_qty', 'is_ok'],
		pagesize: 20,
		frame: true,
		windowWidth: 350,
		windowHeight: 280,
		listURL: 'index.php?model=Inventory&action=checklistdetail&order_id=' + order_id,
		saveURL: 'index.php?model=inventory&action=savecheck&order_id=' + order_id,
		updatesurl: 'index.php?model=inventory&action=updatecheck&order_id=' + order_id,
		exporturl: 'index.php?model=inventory&action=exportcheck&order_id=' + order_id,
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