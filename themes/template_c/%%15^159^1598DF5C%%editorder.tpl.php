<?php /* Smarty version 2.6.14, created on 2015-08-10 10:25:32
         compiled from order/editorder.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/editorderform.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
var salechannel = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
var shipping = [<?php echo $this->_tpl_vars['shipping']; ?>
];
var status = [<?php echo $this->_tpl_vars['order_status']; ?>
];
var payment = [<?php echo $this->_tpl_vars['payment']; ?>
];
var shippingstatus = [<?php echo $this->_tpl_vars['shippingstatus']; ?>
];
var orderinfo = eval(<?php echo $this->_tpl_vars['order']; ?>
);
var use_sn_prefix = <?php echo $this->_tpl_vars['use_sn_prefix']; ?>
;

	Ext.QuickTips.init();
	var orderform = Ext.create('Ext.ux.EditorderForm',{
		title:'<center><b>'+'编辑订单--订单号:'+orderinfo.torder_sn+'</b></center>',
		border:true,
		labelAlign: 'right',
        labelWidth: 75,
		delURL:'index.php?model=order&action=delgoods',
		listURL:'index.php?model=order&action=getOrdergoods',
		goodsgirdURL:'index.php?model=goods&action=getgoodslist',
		catTreeURL:'index.php?model=goods&action=getcattree',
        autoWidth: true,
		autoHeight: true,
		order:orderinfo,
		use_sn_prefix:use_sn_prefix,
		arrdata:[account,salechannel,shipping,status,payment,shippingstatus],
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