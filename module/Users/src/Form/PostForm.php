<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;

class PostForm extends Form {
	public function __construct($name = null) {
		parent::__construct('post');
		$this->setAttribute('method', 'post');
		$this->setAttribute('class', 'form-horizontal');

		$this->add([
			'name' => 'id', 
			'type' => 'hidden' 
		]);

		$this->add([
			'name' => 'nome',
			'type' => 'text',
			'options' => [
				'label' =>'nome'
			]
		]);

		$this->add([
			'name' => 'rank',
			'type' => 'text',
			'options' => [
				'label' =>'rank'
			]
		]);

		$this->add([
			'name' => 'pontos',
			'type' => 'text',
			'options' => [
				'label' =>'pontos'
			]
		]);

		$this->add([
			'name' => 'submit',
			'type' => 'submit',
			'attributes' => [
				'value' => 'go',
				'id' => 'submitbutton'
			]
		]);
	}
}