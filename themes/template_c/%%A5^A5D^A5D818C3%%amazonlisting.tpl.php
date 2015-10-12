<?php /* Smarty version 2.6.14, created on 2015-09-08 15:31:03
         compiled from goods/amazonlisting.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/goods/amzlisting.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	var account = object_Array([<?php echo $this->_tpl_vars['account']; ?>
]);
    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';
	var ListingGrid = Ext.create('Ext.ux.ListingGrid',{
		region:'center',
		loadMask: true,
		height:600,
		autoScroll: true,
		accountarr:[<?php echo $this->_tpl_vars['account']; ?>
,['0','所有账号']],
		//el:'center',
        title: 'Listing产品列表',
        fields: ['id','image_url','item_name','seller_sku','price','quantity','product_id','open_date','fulfillment_channel','account_id'],
		frame:true,
		listURL:'index.php?model=goods&action=amzlistinglist',
        renderTo: document.body
	});
	var viewport = Ext.create('Ext.Viewport',{
        layout:'fit',
        items:[
			ListingGrid
		]}
	);
    loadend();
});
</script>
<div id="center"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>