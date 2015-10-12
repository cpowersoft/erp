<?php /* Smarty version 2.6.14, created on 2015-09-08 16:35:06
         compiled from statistics/pick.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header-3.3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/statistics/pick.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var operator = [<?php echo $this->_tpl_vars['operator']; ?>
];
	operator.push(['0','所有采购员']);
	Ext.form.Field.prototype.msgTarget = 'side';

    var pickGrid = new Ext.ux.pickGrid({
		id:'pickGrid',
        title: '采购统计列表',
		headers:['供应商','数量','金额','单数','到货数量','退货数量'],
        fields: ['supplier_name','total_qty','total_price','counts','arrival_qty','return_qty'],
		operatordata:operator,
		width:800,
		frame:true,
		listURL:'index.php?model=statistics&action=picklist',
        renderTo: document.body
    });
	pickGrid.getStore().load({params:{
								starttime:Ext.fly('starttime').dom.value,
								totime:Ext.fly('totime').dom.value,
								operator:Ext.getCmp('operator').getValue(),
								sku:Ext.fly('sku').dom.value
								}});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>