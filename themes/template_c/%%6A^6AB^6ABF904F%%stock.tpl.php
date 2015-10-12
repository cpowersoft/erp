<?php /* Smarty version 2.6.14, created on 2015-09-08 16:34:59
         compiled from statistics/stock.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header-3.3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/statistics/stockgrid.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
var Sales_channels = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
Sales_channels.push(['0','所有渠道']);
	var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
	depot.push(['','所有仓库']);
    var stockGrid = new Ext.ux.StcokGrid({
		id:'CategoryGrid',
        title: '出入库统计列表',
		headers:['产品编码','产品名称','数量'],
        fields: ['goods_sn','goods_name', 'num'],
		Sales_channels:Sales_channels,
		depot:depot,
		autoWidth:true,
		loadMask:true,
		frame:true,
		listURL:'index.php?model=statistics&action=stocklist',
		listSupplierURL:'index.php?model=supplier&action=userlist',
		pagesize:20,
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