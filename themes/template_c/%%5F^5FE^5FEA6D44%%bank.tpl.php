<?php /* Smarty version 2.6.14, created on 2015-09-10 15:59:46
         compiled from finance/bank.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/finance/bank.js"></script>
<script type="text/javascript" src="js/celltooltip.js"></script>
<script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
    var bankGrid = new Ext.ux.bankGrid({
		id:'bankGrid',
        title: '账户管理列表',
		headers:['id','账户','金额','应收金额','应付金额','开户人','开户时间','操作'],
        fields: ['id','account','money','collect_money','pay_money','add_user','add_time'],
		width:900,
		frame:true,
		pagesize:15,
		delURL:'index.php?model=finance&action=delbank',
		listURL:'index.php?model=finance&action=bankList',
        renderTo: document.body,
		viewConfig: {
			forceFit: true
		}
    });
	loadend();
});
 </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>