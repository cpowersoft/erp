<?php /* Smarty version 2.6.14, created on 2015-08-17 16:37:07
         compiled from order/unpaidorder.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/orderviewpoint.js"></script>
<script type="text/javascript" src="js/order/unpaidorder.js"></script>
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
var zc_status = [<?php echo $this->_tpl_vars['zc_status']; ?>
];
var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
account.push(['0','Accounts']);
salechannel.push(['0','Sales Channels']);
	var viewport = Ext.create('Ext.ux.depotmanagerView',{
		headers:[<?php echo $this->_tpl_vars['fileds']; ?>
],
        fields: ['order_id','print_status','order_status','sales_time','paid_time','paypalid','ShippingService','eubpdf','sellsrecord','order_sn','currency','order_amount','goods','shipping_id','track_no','stockout_sn','userid','Sales_channels','Sales_account_id','pay_note','consignee','street1','street2','city','state','country','zipcode','tel','note','has_rma','has_msg','has_fbk','size','esweight','hasmore'],
		arrdata:[orderstatus,shipping,salechannel,account,templatelist],
		step:'servicecheck',
		listURL:'index.php?model=order&action=getunpaidorder',
		windowTitle:'Advance Search',
		action:user_action,
		zc_status:zc_status,
		uncheckcombine:1,
		windowWidth:320,
		windowHeight:345,
		pagesize:15
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