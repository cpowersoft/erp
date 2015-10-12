<?php /* Smarty version 2.6.14, created on 2015-09-08 15:31:11
         compiled from goods/amazonreport.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/order/amazonreport.js"></script>
    <script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
	var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
    var AmzreportGrid = Ext.create('Ext.ux.AmzreportGrid',{
		id:'AmzreportGrid',
        title: 'Amazon产品Report',
		headers:['id','账号','ReportId','ReportType','生效时间','操作'],
        fields: ['id','account_id','ReportId','ReportType', 'AvailableDate','status'],
		frame:true,
		accountdata:account,
		listURL:'index.php?model=amazon&action=getreportlist&type=2',
		outdepotURL:'index.php?model=amazon&action=requestreport',
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