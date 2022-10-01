<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProducts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('products');

        $table->addColumn('name', 'string', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('cost', 'integer', [
            'limit' => 5,
            'null' => false,
        ]);
     

        $table->create();
    }
}