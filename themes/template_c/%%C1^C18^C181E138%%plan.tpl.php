<?php /* Smarty version 2.6.14, created on 2015-09-09 10:09:04
         compiled from purchase/plan.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/purchase/plan.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
	depot.push(['999','所有仓库']);
    var PlanView = new Ext.ux.PlanGrid({
		headers:['goods_id','产品编码','产品名称','SKU','库存数量','锁定库存','销售需求','报警库存','采购在途','日均销量','供应商','采购周期','建议采购','其他'],
        fields: ['goods_id','goods_sn', 'goods_name','SKU','goods_qty','varstock','sold_qty','warn_qty','Purchase_qty','per_sold','supplier','period','plan_qty','comment'],
		pagesize:15,
		depot:depot,
		frame:true,
		autoWidth:true,
		autoHeight:true,
		listURL:'index.php?model=Purchaseorder&action=planlist',
		listSupplierURL:'index.php?model=supplier&action=userlist',
		planBySupplierURL:'index.php?model=Purchaseorder&action=planBySupplier',
        renderTo: document.body
    });
	
	var viewport = Ext.create('Ext.Viewport',{
        layout:'fit',
        items:[
			PlanView
		]}
	);
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>