<?php /* Smarty version 2.6.14, created on 2015-09-10 15:59:39
         compiled from finance/fee.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <style type="text/css">
        body .x-panel {
            margin:0 0 20px 0;
        }
    </style>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/finance/fee.js"></script>
    <script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
    var FeeGrid = Ext.create('Ext.ux.FeeGrid',{
		id:'FeeGrid',
        title: '费用单列表',
		headers:['序号','费用单号','账号','应付金额','实付金额','币种','费用类型','状态','创建时间','创建人','付款人','付款时间','备注'],
        fields: ['rec_id','order_sn','fee_type', 'amt','currency','add_time','add_user','comment','fee_type_name','confirm_time','confirm_user','account_id','paid_money','status'],
		width:1000,
		frame:true,
		addURL:'index.php?model=finance&action=addfee',
		delURL:'index.php?model=finance&action=delfee',
		listURL:'index.php?model=finance&action=cfList',
		windowTitle:'编辑费用单',
		windowWidth:300,
		windowHeight:220,
        renderTo: document.body
    });
	FeeGrid.getStore().load({
			params:{start:0,limit:FeeGrid.pagesize}
			});
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>