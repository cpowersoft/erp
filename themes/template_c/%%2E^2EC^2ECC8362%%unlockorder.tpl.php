<?php /* Smarty version 2.6.14, created on 2015-08-10 16:48:57
         compiled from order/unlockorder.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/orderviewpoint.js"></script>
<script type="text/javascript" src="js/order/unlockorder.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
Ext.QuickTips.init();
var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
var salechannel = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
var shipping = [<?php echo $this->_tpl_vars['shipping']; ?>
];
var orderstatus = [<?php echo $this->_tpl_vars['orderstatus']; ?>
];
var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
orderstatus.push(['0','所有状态']);
account.push(['0','所有账户']);
salechannel.push(['0','所有渠道']);
	var viewport = new Ext.ux.allorderView({
		headers:[<?php echo $this->_tpl_vars['fileds']; ?>
],
        fields: ['order_id','order_status','paid_time','sellsrecord','order_sn','goods','shipping_id','track_no','stockout_sn','userid','Sales_channels','Sales_account_id','pay_note','consignee','street1','street2','city','state','country','zipcode','tel','has_rma','has_msg','has_fbk','size','esweight','stock_place'],
		arrdata:[orderstatus,shipping,salechannel,account],
		listURL:'index.php?model=order&action=getunlockorder',
		windowTitle:'高级搜索',
		windowWidth:320,
		action:user_action,
		windowHeight:345,
		pagesize:15
	});
	viewport.grid.getStore().load({
			params:{start:0,limit:viewport.pagesize}
			});
	loadend();
});
</script>
  <div id="north-div"></div>
  <div id="center"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>