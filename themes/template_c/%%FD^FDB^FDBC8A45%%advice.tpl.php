<?php /* Smarty version 2.6.14, created on 2015-09-10 13:48:05
         compiled from purchase/advice.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/purchase/advice.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
	depot.push(['999','所有仓库']);
    var PlanView = new Ext.ux.PlanGrid({
		headers:['goods_id','产品编码','产品名称','SKU','库存数量','锁定库存','预警天数','日均销量','销售预期','调拨在途(数量/头程/在途天数)','补货天数','主仓库存','供应商'],
        fields: ['goods_id','goods_sn', 'goods_name','SKU','goods_qty','varstock','plan_day','per_sold','expected','db','period','stock_qty','supplier'],
		pagesize:15,
		depot:depot,
		frame:true,
		autoWidth:true,
		autoHeight:true,
		listURL:'index.php?model=Purchaseofs&action=list',
        renderTo: document.body
    });
	var viewport = Ext.create('Ext.Viewport',{
        layout:'fit',
        items:[
			PlanView
		]}
	);
	PlanView.getStore().load({
			params:{start:0,limit:PlanView.pagesize}
			});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>