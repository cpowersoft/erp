<?php /* Smarty version 2.6.14, created on 2015-08-10 10:52:26
         compiled from Inventory/stockin.tpl */ ?>
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
		headers: ['序号', '入库单号', '仓库', '总量', '总价', '入库类型', '入库员', '状态', '入库时间', 'comment'],
		fields: ['order_id', 'order_sn', 'depot_id', 'totalqty', 'totalprice', 'stocktype', 'operator', 'status', 'out_time', 'realstatus', 'comment'],
		pagesize: 15,
		frame: true,
		gridTitle: '入库单列表',
		autoWidth: true,
		action: user_action,
		addURL: 'index.php?model=Stockin&action=add',
		goodsURL: 'index.php?model=Stockin&action=getgoods',
		listURL: 'index.php?model=Stockin&action=list',
		updateURL: 'index.php?model=Stockin&action=update',
		printURL: 'index.php?model=Stockin&action=print',
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