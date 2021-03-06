<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_CreateForms extends CI_Migration
{
	/**
	 * up
	 *
	 * formsテーブル作成
	 */
	public function up()
	{
		$fields = array(
			'form_id' => array(
				'type'           => 'bigint',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
				'comment'        => 'フォームID'
			),
			'env_id' => array(
				'type'           => 'bigint',
				'unsigned'       => TRUE,
				'comment'        => '環境ID'
			),
			'type' => array(
				'type'           => 'tinyint',
				'unsigned'       => TRUE,
				'null'           => FALSE,
				'comment'        => '種別'
			),
			'name' => array(
				'type'           => 'varchar',
				'constraint'     => '255',
				'null'           => FALSE,
				'comment'        => '名称'
			),
			'value' => array(
				'type'           => 'text',
				'null'           => FALSE,
				'comment'        => '値'
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_field('created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "登録日時"');
		$this->dbforge->add_field('modified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "更新日時"');

		$this->dbforge->add_key('form_id', TRUE);
		$this->dbforge->create_table('forms');
	}

	/**
	 * down
	 *
	 * formsテーブル削除
	 */
	public function down()
	{
		$this->dbforge->drop_table('forms', TRUE);
	}
}