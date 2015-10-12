<?php /* Smarty version 2.6.14, created on 2015-08-15 16:44:59
         compiled from Inventory/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/inventory/Inventory.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
	var goods_status = [<?php echo $this->_tpl_vars['goods_status']; ?>
];
	depot.push(['','所有仓库']);
	goods_status.push(['0','所有状态']);
    var StockView = Ext.create('Ext.ux.test.inventory.Inventory', {
		headers: ['goods_id', '产品编码', '产品名称', 'SKU', '库存数量', '锁定库存', '报警库存', '分仓数量', '采购在途', '调拨预定', '调拨在途'],
		fields: ['goods_id', 'goods_sn', 'goods_name', 'SKU', 'goods_qty', 'varstock', 'warn_qty', 'depot_qty', 'Purchase_qty', 'db_pre_qty', 'db_qty'],
		pagesize: 15,
		depot: depot,
		goods_status: goods_status,
		frame: true,
		autoWidth: true,
		autoHeight: true,
		listURL: 'index.php?model=Inventory&action=goodslist',
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