<?php /* Smarty version 2.6.14, created on 2015-08-10 13:24:25
         compiled from system/init.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/system/init.js"></script>
<script type="text/javascript">
var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
var salechannel = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
var info = eval(<?php echo $this->_tpl_vars['info']; ?>
);
var shipping = [<?php echo $this->_tpl_vars['shipping']; ?>
];
var orderstatus = [<?php echo $this->_tpl_vars['orderstatus']; ?>
];
	var goods_status = [<?php echo $this->_tpl_vars['goods_status']; ?>
];
	var goods_cat = [<?php echo $this->_tpl_vars['goods_cat']; ?>
];
	var goods_brand = [<?php echo $this->_tpl_vars['goods_brand']; ?>
];
	var aliaccount = [<?php echo $this->_tpl_vars['aliaccount']; ?>
];
	goods_cat.push(['0','所有分类']);
	goods_brand.push(['0','所有品牌']);
	goods_status.push(['0','All Status']);
orderstatus.push(['0','所有状态']);
account.push(['0','所有账户']);
salechannel.push(['0','所有渠道']);
Ext.onReady(function(){
	Ext.QuickTips.init();
	var systemForm = Ext.create('Ext.ux.systemTab',{
		border:false,
		frame:false,
        autoWidth: true,
		autoHeight:true,
		handleURL:'index.php?model=system&action=inithandle',
		arrdata:[goods_status,goods_cat,goods_brand,aliaccount],
		accountdata:account,
		info:info,
		statusdata:orderstatus,
		salesCnldata:salechannel,
		depotdata:depot,
		renderTo:document.body
	});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>