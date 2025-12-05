<div class="row justify-content-center">
    <div class="col-12">

        <div class="card-doity">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h2 class="fw-bold mb-1 fs-3">Catálogo de Serviços</h2>
                    <p class="text-muted mb-0">Gerencie os tipos de serviços disponíveis para os prestadores</p>
                </div>
                <div>
                    <a href="<?php echo $this->Html->url(array('action' => 'add')); ?>" class="btn btn-danger text-white d-flex align-items-center gap-2 px-3">
                        <i class="bi bi-plus-lg"></i>
                        <span>Add novo serviço</span>
                    </a>
                </div>
            </div>

            <div class="mb-4">
                <?php echo $this->Form->create('Service', array('type' => 'get', 'url' => array('action' => 'index'))); ?>
                <div class="input-group" style="max-width: 100%;">
                    <span class="input-group-text bg-white border-end-0 ps-3">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <?php echo $this->Form->input('search', array(
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control border-start-0 ps-2',
                        'placeholder' => 'Buscar serviço...',
                        'value' => $this->request->query('search')
                    )); ?>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="py-3 ps-3 text-secondary small fw-bold" style="width: 30%;">Nome</th>
                            <th scope="col" class="py-3 text-secondary small fw-bold" style="width: 50%;">Descrição</th>
                            <th scope="col" class="py-3 pe-3 text-end" style="width: 20%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($services)): ?>
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    Nenhum tipo de serviço cadastrado no catálogo.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($services as $service): ?>
                            <tr style="border-bottom: 1px solid #EAECF0;">
                                <td class="ps-3 py-4 fw-bold text-dark">
                                    <?php echo h($service['Service']['name']); ?>
                                </td>
                                <td class="text-muted py-4">
                                    <?php echo h($service['Service']['description']); ?>
                                </td>
                                <td class="text-end pe-3 py-4">
                                    <div class="d-flex gap-3 justify-content-end">
                                        <a href="<?php echo $this->Html->url(array('action' => 'edit', $service['Service']['id'])); ?>" class="text-secondary" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <?php echo $this->Form->postLink(
                                            '<i class="bi bi-trash"></i>',
                                            array('action' => 'delete', $service['Service']['id']),
                                            array('escape' => false, 'class' => 'text-secondary', 'title' => 'Excluir'),
                                            __('Tem certeza que deseja remover o serviço "%s"?', $service['Service']['name'])
                                        ); ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-2">
                <div class="text-muted small">
                    <?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}'))); ?>
                </div>
                <div class="d-flex gap-2">
                    <?php
                    if ($this->Paginator->hasPrev()) {
                        echo $this->Paginator->prev('Anterior', array('class' => 'btn btn-light border btn-sm px-3'), null, array('class' => 'btn btn-light border btn-sm px-3 disabled'));
                    } else {
                        echo '<button class="btn btn-light border btn-sm px-3" disabled>Anterior</button>';
                    }
                    if ($this->Paginator->hasNext()) {
                        echo $this->Paginator->next('Próximo', array('class' => 'btn btn-light border btn-sm px-3'), null, array('class' => 'btn btn-light border btn-sm px-3 disabled'));
                    } else {
                        echo '<button class="btn btn-light border btn-sm px-3" disabled>Próximo</button>';
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
