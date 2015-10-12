<?php /* Smarty version 2.6.14, created on 2015-09-08 16:46:57
         compiled from statistics/ordercircs.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header-3.3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/statistics/ordercircs.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';	
	var sales_account =[['0','所有账户']];
    sales_account.push(<?php echo $this->_tpl_vars['Sales_account']; ?>
);
	var ordercircsGrid = new Ext.ux.ordercircsGrid({
		title: '订单情况统计',
		headers:['时间','订单量','销售量'],
		fields: ['paid_times','counts','qtys','shipping_cost','order_amount'],
		frame:true,
		autoWidth:true,
		pagesize:15,
		sales_account:sales_account,
		listURL:'index.php?model=statistics&action=ordercircsList',
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