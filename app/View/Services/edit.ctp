<div class="services form">
<?php echo $this->Form->create('Service'); ?>
	<fieldset>
		<legend><?php echo __('Editar Serviço do Catálogo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Service.id')), array('confirm' => __('Tem certeza que deseja excluir o serviço #%s?', $this->Form->value('Service.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Serviços'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Prestadores'), array('controller' => 'providers', 'action' => 'index')); ?></li>
	</ul>
</div>
