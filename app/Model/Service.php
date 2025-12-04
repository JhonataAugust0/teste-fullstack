<?php
App::uses('AppModel', 'Model');

/**
 * Service Model
 *
 * Modelo responsável pela entidade Serviço.
 * Representa os serviços oferecidos por cada prestador.
 *
 * @property Provider $Provider
 */
class Service extends AppModel {

/**
 * Nome da tabela no banco de dados
 *
 * @var string
 */
    public $useTable = 'services';

/**
 * Nome de exibição do registro
 *
 * @var string
 */
    public $displayField = 'name';

/**
 * Comportamentos do Model
 *
 * @var array
 */
    public $actsAs = array('Containable');

/**
 * Regras de validação
 *
 * Define as validações para cada campo do formulário,
 * com mensagens em português para melhor UX.
 *
 * @var array
 */
    public $validate = array(
        'provider_id' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Selecione um prestador.',
                'required' => true,
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Prestador inválido.',
            ),
            'providerExists' => array(
                'rule' => array('validateProviderExists'),
                'message' => 'O prestador selecionado não existe.',
            ),
        ),
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'O nome do serviço é obrigatório.',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => 'O nome deve ter no máximo 255 caracteres.',
            ),
            'minLength' => array(
                'rule' => array('minLength', 2),
                'message' => 'O nome deve ter pelo menos 2 caracteres.',
            ),
        ),
        'description' => array(
            'maxLength' => array(
                'rule' => array('maxLength', 5000),
                'message' => 'A descrição deve ter no máximo 5000 caracteres.',
                'allowEmpty' => true,
            ),
        ),
		'value' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'O valor é obrigatório.',
				'last' => true,
			),
			'validAmount' => array(
				// REGEX: Aceita números inteiros OU decimais com ponto ou vírgula
				// ^\d+        -> Começa com um ou mais dígitos
				// ([.,]\d{1,2})? -> Opcionalmente tem ponto/vírgula seguido de 1 ou 2 dígitos
				// $           -> Fim da string
				'rule' => array('custom', '/^\d+([.,]\d{1,2})?$/'),
				'message' => 'Informe um valor válido (ex: 100, 100.00 ou 100,50)',
			),
		),
    );

/**
 * Associação belongsTo com Provider
 *
 * Todo serviço pertence a um prestador.
 *
 * @var array
 */
    public $belongsTo = array(
        'Provider' => array(
            'className' => 'Provider',
            'foreignKey' => 'provider_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

/**
 * Validação customizada: verifica se o prestador existe
 *
 * @param array $check Valor a ser validado
 * @return bool
 */
    public function validateProviderExists($check) {
        $providerId = array_values($check)[0];
        $Provider = ClassRegistry::init('Provider');
        return $Provider->exists($providerId);
    }

/**
 * Callback beforeSave
 *
 * Sanitiza os dados antes de salvar.
 *
 * @param array $options Opções de salvamento
 * @return bool
 */
    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['value'])) {
            // Troca vírgula por ponto para compatibiidade com o MySQL (100,50 -> 100.50)
            $this->data[$this->alias]['value'] = str_replace(',', '.', $this->data[$this->alias]['value']);
        }
        return true;
    }

/**
 * Sanitiza valor monetário para formato decimal
 *
 * Converte formatos brasileiros (1.234,56) para formato padrão (1234.56)
 *
 * @param mixed $value Valor a ser sanitizado
 * @return float
 */
    protected function _sanitizeDecimalValue($value) {
        if (is_numeric($value)) {
            return (float) $value;
        }

        // Remove R$, espaços e caracteres não numéricos exceto vírgula e ponto
        $value = preg_replace('/[R$\s]/', '', $value);

        // Se tem vírgula como separador decimal (formato brasileiro)
        if (strpos($value, ',') !== false) {
            $value = str_replace('.', '', $value);  // Remove pontos de milhar
            $value = str_replace(',', '.', $value); // Troca vírgula por ponto
        }

        return (float) $value;
    }
}
