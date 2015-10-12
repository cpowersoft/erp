<?php /* Smarty version 2.6.14, created on 2015-08-10 10:48:04
         compiled from system/order_print.tpl */ ?>
<style>
#listpart{ background:#000;}
#listpart tr td{ background:#fff;}
</style>
  <div id="center">
  <center><h1><?php echo $this->_tpl_vars['order_sn']; ?>
<img src="index.php?model=login&action=Barcode&number=<?php echo $this->_tpl_vars['order_sn']; ?>
&height=48"></h1></center>
  <?php echo $this->_tpl_vars['infopart']; ?>

  <table width="100%"  border="1" cellspacing="1" cellpadding="0" id="listpart">
  <?php echo $this->_tpl_vars['listheader']; ?>

  <?php $_from = $this->_tpl_vars['listpart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['orderitem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['orderitem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['order']):
        $this->_foreach['orderitem']['iteration']++;
?>
  <tr>
  	<?php if ($this->_tpl_vars['showimg'] == 1): ?>
    <td><img src="<?php echo $this->_tpl_vars['order']['goods_img']; ?>
" width= 100 /></td><?php endif; ?>
    <td><?php if ($this->_tpl_vars['order']['url']):  echo $this->_tpl_vars['order']['goods_sn'];  endif; ?>
    
  </td>
    
    <td><?php echo $this->_tpl_vars['order']['supplier_goods_sn']; ?>
</td>
    
    <td><?php echo $this->_tpl_vars['order']['goods_name']; ?>
</td>
    
    <td><?php echo $this->_tpl_vars['order']['goods_qty']; ?>
</td>
    <?php if ($this->_tpl_vars['view_cost'] == 1): ?><td><?php echo $this->_tpl_vars['order']['goods_price']; ?>
</td><?php endif; ?>
    <td><?php echo $this->_tpl_vars['order']['remark']; ?>
</td></tr>
  	<?php endforeach; endif; unset($_from); ?>
  </table>
  </div>
<a href="" target="_blank"></a>