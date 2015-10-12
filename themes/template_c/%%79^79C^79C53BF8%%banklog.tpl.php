<?php /* Smarty version 2.6.14, created on 2015-09-10 15:59:43
         compiled from finance/banklog.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/finance/banklog.js"></script>
<script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
	var powerBank =[['-1','所有账户']];
    powerBank.push(<?php echo $this->_tpl_vars['powerBank']; ?>
);
	var bankLogGrid = Ext.create('Ext.ux.bankLogGrid',{
		id:'bankLogGrid',
        title: '账户流水记录',
		headers:['ID','账户','收/支','款项类型','单据编号','金额','余额','时间','添加人','确认人','备注'],
        fields: ['deal_ID','account','type','deal_type','order_sn','money','balance','time','add_user','confirm_user','comment'],
		//width:1000,
		frame:true,
		pagesize:15,
		powerBank:powerBank,
		listURL:'index.php?model=finance&action=bankLogList',
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