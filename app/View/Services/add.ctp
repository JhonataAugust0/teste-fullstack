<div class="services form">
<?php echo $this->Form->create('Service'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Serviço ao Catálogo'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Serviços'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Prestadores'), array('controller' => 'providers', 'action' => 'index')); ?></li>
	</ul>
</div>
