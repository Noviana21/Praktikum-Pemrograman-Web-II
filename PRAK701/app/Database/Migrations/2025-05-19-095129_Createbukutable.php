<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createbukutable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul'       => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'penulis'   => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'penerbit'    => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'tahun_terbit'=> [
                'type'       => 'YEAR',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku', true);
    }

    public function down()
    {
        $this->forge->dropTable('buku');
    }
}
