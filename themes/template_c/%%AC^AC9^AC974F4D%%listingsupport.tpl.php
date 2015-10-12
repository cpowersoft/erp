<?php /* Smarty version 2.6.14, created on 2015-09-07 15:41:16
         compiled from goods/listingsupport.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/goods/EnditemGrid.js"></script>
    <script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
	var account = [<?php echo $this->_tpl_vars['account']; ?>
];
	account.push(['0','所有账户']);
	var EnditemGrid = Ext.create('Ext.ux.EnditemGrid',{
		id:'BrandGrid',
        fields: ['rec_id','GalleryURL','ItemID', 'Title','SKU','StartPrice','Quantity','ViewItemURL','ListingType','account_id','is_need'],
		autoWidth:true,
		frame:true,
		accountdata:account,
		saveURL:'index.php?model=goods&action=updateListing',
		editURL:'index.php?model=goods&action=editListing',
		listURL:'index.php?model=goods&action=listinglist',
        renderTo: document.body
	});
	var viewport =Ext.create('Ext.Viewport',{
        layout:'fit',
        items:[
			EnditemGrid
		]
		});
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>