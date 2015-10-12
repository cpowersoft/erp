<?php /* Smarty version 2.6.14, created on 2015-09-10 16:32:20
         compiled from Inventory/allocation.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/inventory/allocation.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
var first_shipping = [<?php echo $this->_tpl_vars['first_shipping']; ?>
];
var db_shipping = [<?php echo $this->_tpl_vars['db_shipping']; ?>
];
var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
var status = [<?php echo $this->_tpl_vars['db_status']; ?>
];
depot.push(['99','所有仓库']);
db_shipping.push(['99','所有物流']);
first_shipping.push(['99','所有头程']);
status.push(['99','所有状态']);
    var DBorderView = Ext.create('Ext.ux.test.inventory.allocation', {
		title: '调拨单',
		headers: ['序号', '调拨单号', '总数', '箱数', '重量', '头程渠道', '物流方式', '追踪单号', '发货仓', '到货仓', '操作员', '状态', '在途天数', '完成时间'],
		fields: ['order_id', 'order_sn', 'totalamt', 'count', 'weight', 'first_shipping', 'db_shipping', 'track_no', 'depot_id_from', 'depot_id_to', 'add_user', 'status', 'delay_time', 'out_time', 'realstatus', 'comment'],
        pagesize:25,
		status: status,
		db_shipping: db_shipping,
		first_shipping: first_shipping,
		depot: depot,
		windowWidth: 320,
		windowHeight: 350,
		autoWidth: true,
		goodsURL: 'index.php?model=inventory&action=getallocationgoods',
		listURL: 'index.php?model=inventory&action=allocationlist',
		updateURL: 'index.php?model=inventory&action=updateallocation',
		addURL: 'index.php?model=inventory&action=addallocation',
		updategoodsURL: 'index.php?model=inventory&action=updateallocationgoods',
		printURL: 'index.php?model=inventory&action=printallocation',
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