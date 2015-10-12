<?php /* Smarty version 2.6.14, created on 2015-09-11 13:29:20
         compiled from Inventory/StockoutAdd.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/billform.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
var orderinfo = eval(<?php echo $this->_tpl_vars['order']; ?>
);
var order_status = [<?php echo $this->_tpl_vars['order_status']; ?>
];
var stocktype = [<?php echo $this->_tpl_vars['stockout_type']; ?>
];
var Sales_channels = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
	Ext.QuickTips.init();
	var stockoutForm = Ext.create('Ext.ux.test.billform', {
		title: '<center><b>' + ((orderinfo.order_id) ? '编辑出库单' : '新增出库单') + ':' + orderinfo.order_sn + '</b></center>',
		border: true,
		labelAlign: 'right',
		labelWidth: 75,
		action: user_action,
		saveURL: 'index.php?model=stockout&action=save',
		addURL: 'index.php?model=stockout&action=add',
		goodsURL: 'index.php?model=stockout&action=getgoods&<?php echo $this->_tpl_vars['from']; ?>
',
		delURL: 'index.php?model=stockout&action=delgoods',
		listSupplierURL: 'index.php?model=supplier&action=userlist',
		listUserURL: 'index.php?model=User&action=UserList',
		goodsgirdURL: 'index.php?model=goods&action=getgoodslist',
		catTreeURL: 'index.php?model=goods&action=getcattree',
		order: orderinfo,
		inout: 2,
		Sales_channels: Sales_channels,
		orderstatus: order_status,
		stocktype: stocktype,
		depot: depot,
		autoWidth: true,
		autoHeight: true,
		order: orderinfo,
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