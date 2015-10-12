<?php /* Smarty version 2.6.14, created on 2015-08-25 14:45:46
         compiled from system/currency.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/system/currency.js"></script>
    <script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
    var CurrencyGrid = Ext.create('Ext.ux.CurrencyGrid',{
		id:'ExpressRuleGrid',
        title: '币种汇率列表',
		headers:['序号','币种','汇率'],
        fields: ['id','currency','rate'],
		width:600,
		frame:true,
		saveURL:'index.php?model=currency&action=Update',
		delURL:'index.php?model=currency&action=delete',
		listURL:'index.php?model=currency&action=List',
		ajaxURL:'index.php?model=currency&action=ajax',
		windowTitle:'币种汇率',
		windowWidth:350,
		windowHeight:180,
        renderTo: document.body
    });
	var detailpanel = Ext.create('Ext.Panel',{
		width:600,
		frame:true,
		title:'币种汇率说明',
		html:'<p>汇率为对默认币种的汇率，默认币种可在系统设置中设置，系统内所有未标明币种的均为默认币种</p>',
		renderTo: document.body
	});
	CurrencyGrid.getStore().load({
			params:{start:0,limit:CurrencyGrid.pagesize}
			});
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>