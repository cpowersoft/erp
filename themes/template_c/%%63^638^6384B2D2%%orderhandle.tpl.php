<?php /* Smarty version 2.6.14, created on 2015-08-10 16:23:18
         compiled from order/orderhandle.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/orderviewpoint.js"></script>
<script type="text/javascript" src="js/order/orderhandle.js"></script>
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
var templatelist = [<?php echo $this->_tpl_vars['print_template']; ?>
];
var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
var tempdata = [['990', 'UPS'], ['991', 'TNT'],['992', '中通'], ['993', '圆通'],['994', '申通'], ['995', '联邦fedex'],['996', '汇通'], ['997', 'DHL'], ['998', '天天'], ['999', 'EMS宅急送'],['1000', '德邦'],['1001','韵达']];
account.push(['0','所有账户']);
salechannel.push(['0','所有渠道']);
	var viewport = Ext.create('Ext.ux.depotmanagerView',{
		headers:[<?php echo $this->_tpl_vars['fileds']; ?>
],
        fields: ['order_id','print_status','order_status','paid_time','paypalid','eubpdf','sellsrecord','order_sn','currency','order_amount','goods','ShippingService','shipping_id','track_no','stockout_sn','userid','Sales_channels','Sales_account_id','pay_note','consignee','street1','street2','city','state','country','zipcode','tel','note','has_rma','has_msg','has_fbk','size','esweight','stock_place'],
		arrdata:[orderstatus,shipping,salechannel,account],
		templatelist:templatelist,
		tempdata: tempdata,
		step:'orderhandle',
		action:user_action,
		listURL:'index.php?model=order&action=Getorderhandle',
		windowTitle:'高级搜索',
		windowWidth:320,
		windowHeight:345,
		pagesize:25
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