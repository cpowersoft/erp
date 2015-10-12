<?php /* Smarty version 2.6.14, created on 2015-08-13 15:20:40
         compiled from goods/editgoods.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/goods/editgoodsform.js"></script>
<script type="text/javascript" src="common/lib/ckeditor/ckeditor.js"></script>
<script src="common/lib/ckeditor/_samples/sample.js" type="text/javascript"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
	var goods_status = [<?php echo $this->_tpl_vars['goods_status']; ?>
];
	var goods_brand = [<?php echo $this->_tpl_vars['goods_brand']; ?>
];
	var goodsinfo = eval(<?php echo $this->_tpl_vars['good']; ?>
);
	var sizedata = [<?php echo $this->_tpl_vars['goods_size']; ?>
];
	var colordata = [<?php echo $this->_tpl_vars['goods_color']; ?>
];
	var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
	var sizecombo = newcombo(sizedata);
	var colorbombo = newcombo(colordata);
	function sizing(v){
		return object_Array(sizedata)[v];
		}
	function coloring(v){
		return object_Array(colordata)[v];
		}
	function newcombo(sdata){
		return Ext.create('Ext.form.field.ComboBox',{
						typeAhead: true,
						triggerAction: 'all',
						mode: 'local',
						store:  Ext.create('Ext.data.ArrayStore',{
							id: 0,
							fields: [
								'myId',
								'displayText'
							],
							data: sdata
						}),
						editable:false,
						valueField: 'myId',
						displayField: 'displayText',
						lazyRender: true,
						listClass: 'x-combo-list-small'
					});
	}
		var orderform = Ext.create('Ext.ux.editgoodsForm',{
		border:true,
		id:'goodform',
		region:'center',
		labelAlign: 'right',
        labelWidth: 75,
		delchildURL:'index.php?model=goods&action=delChildgoods',
		catURL:'index.php?model=goods&action=catList',
		brandURL:'index.php?model=goods&action=brandList',
		childlistURL:'index.php?model=goods&action=getchildgoods',
		goodsURL:'index.php?model=goods&action=getgoodslist',
		savechildURL:'index.php?model=goods&action=savechild',
		updatesurl:'index.php?model=goods&action=Uploadgoodsimg',
		goods_data:[goods_status,goods_brand],
		combolist:[sizecombo,colorbombo,account],
		action:user_action,
		rendererlist:[sizing,coloring],
		good:goodsinfo,
        autoWidth: true,
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