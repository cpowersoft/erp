<?php /* Smarty version 2.6.14, created on 2015-09-08 16:45:31
         compiled from statistics/ordergoods.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header-3.3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/statistics/ordergoods.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
	var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
	var currency = [<?php echo $this->_tpl_vars['currency']; ?>
];
	account.push(['0','所有账户']);
    var OrdergoodsGrid = new Ext.ux.OrdergoodsGrid({
		id:'OrdergoodsGrid',
        title: '订单产品销售统计列表(RMB)',
		headers:['产品编码','产品名称','成本','运费','包装费','固定价($)','销售均价','销售数量','销售额','总均摊运费','利润率%','类别','等级','可用库存','采购在途','报警库存'],
        fields: ['goods_sn','goods_name', 'cost','shipping_fee','package_fee','fix_price','avrprice','total_qty','amount','shippingcost','interest','status','grade','valid_qty','onarrive_qty','want_qty'],
		autoWidth:true,
		loadMask:true,
		accountdata:account,
		cry:currency,
		frame:true,
		listURL:'index.php?model=statistics&action=OrderGoodslist',
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