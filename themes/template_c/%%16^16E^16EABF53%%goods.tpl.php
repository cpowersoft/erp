<?php /* Smarty version 2.6.14, created on 2015-08-17 16:38:11
         compiled from goods/goods.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/goods/goodsform.js"></script>
<script type="text/javascript" src="js/celltooltip.js"></script>
<script type="text/javascript" src="common/lib/ckeditor/ckeditor.js"></script>
<script src="common/lib/ckeditor/_samples/sample.js" type="text/javascript"></script>
<script type="text/javascript">
var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
var all_account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
all_account.push(['0','请选择']);
Ext.onReady(function(){
	Ext.QuickTips.init();
	var goods_status = [<?php echo $this->_tpl_vars['goods_status']; ?>
];
	var goods_cat = [<?php echo $this->_tpl_vars['goods_cat']; ?>
];
	var goods_brand = [<?php echo $this->_tpl_vars['goods_brand']; ?>
];
	var sizedata = [<?php echo $this->_tpl_vars['goods_size']; ?>
];
	var colordata = [<?php echo $this->_tpl_vars['goods_color']; ?>
];
	var languages = [<?php echo $this->_tpl_vars['languages']; ?>
];
	var sizecombo = newcombo(sizedata);
	var colorbombo = newcombo(colordata);
	function sizing(v){
		return object_Array(sizedata)[v];
		}
	function coloring(v){
		return object_Array(colordata)[v];
		}
	function newcombo(sdata){
		return new Ext.form.ComboBox({
			typeAhead: true,
			triggerAction: 'all',
			mode: 'local',
			store: new Ext.data.SimpleStore({
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
	var orderform = Ext.create('Ext.ux.goodsForm',{
		border:false,
		id:'goodsForm',
		region:'center',
		labelAlign: 'right',
        labelWidth: 75,
		catURL:'index.php?model=goods&action=catList',
		brandURL:'index.php?model=goods&action=brandList',
		goodsURL:'index.php?model=goods&action=getgoodslist',
		goods_data:[goods_status,goods_cat,goods_brand,languages],
		combolist:[sizecombo,colorbombo],
		rendererlist:[sizing,coloring],
        autoWidth: true,
		autoHeight:true,
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