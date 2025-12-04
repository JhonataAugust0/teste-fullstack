<div class="services index">
	<h2><?php echo __('Catálogo de Serviços'); ?></h2>
	<div class="search-box" style="margin-bottom: 20px; padding: 15px; background: #f9f9f9; border: 1px solid #e1e1e1; border-radius: 4px;">
		<?php
		echo $this->Form->create('Service', array('type' => 'get', 'url' => array('action' => 'index')));
		echo $this->Form->input('search', array(
			'label' => false,
			'placeholder' => 'Buscar serviço...',
			'style' => 'width: 300px; display: inline-block;',
			'value' => $this->request->query('search')
		));
		echo $this->Form->submit(__('Buscar'), array('div' => false, 'style' => 'display: inline-block; margin-left: 10px;'));
		echo $this->Form->end();
		?>
	</div>
	<hr>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descrição'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Criado em'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Atualizado em'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($services as $service): ?>
	<tr>
		<td><?php echo h($service['Service']['id']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['name']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['description']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['created']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $service['Service']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $service['Service']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $service['Service']['id']), array('confirm' => __('Tem certeza que deseja excluir o serviço #%s?', $service['Service']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} total')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo Serviço'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Prestadores'), array('controller' => 'providers', 'action' => 'index')); ?></li>
	</ul>
</div>
