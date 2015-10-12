<?php /* Smarty version 2.6.14, created on 2015-09-10 13:48:11
         compiled from Inventory/stockout.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/billview.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
    var BillView = Ext.create('Ext.ux.test.billview', {
		headers: ['序号', '出库单号', '仓库', '数量总计', '价格总计', '出库类型', '出库员', '状态', '录单时间', '出库时间', 'comment'],
		fields: ['order_id', 'order_sn', 'depot_id', 'totalqty', 'totalprice', 'stocktype', 'operator', 'status', 'add_time', 'out_time', 'realstatus', 'comment'],
		pagesize: 15,
		frame: true,
		gridTitle: '出库单单列表',
		action: user_action,
		autoWidth: true,
		addURL: 'index.php?model=Stockout&action=add',
		goodsURL: 'index.php?model=Stockout&action=getgoods',
		listURL: 'index.php?model=Stockout&action=list',
		updateURL: 'index.php?model=Stockout&action=update',
		printURL: 'index.php?model=Stockout&action=print',
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