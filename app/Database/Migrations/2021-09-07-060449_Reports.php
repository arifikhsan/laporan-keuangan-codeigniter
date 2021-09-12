<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reports extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cash'       => [
                'type'       => 'INT',
            ],
            'datetime'       => [
                'type'       => 'timestamp',
            ],
            'detail'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'debit'       => [
                'type'       => 'INT',
                'null' => true,
            ],
            'credit'       => [
                'type'       => 'INT',
                'null' => true,
            ],
            'balance'       => [
                'type'       => 'INT',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reports');
    }

    public function down()
    {
        $this->forge->dropTable('reports');
    }
}
